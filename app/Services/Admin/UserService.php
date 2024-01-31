<?php

namespace App\Services\Admin;

use App\Helpers\Helper;
use App\Models\User;
use App\Models\UserInstance;
use App\Traits\FileTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UserService
{
    use FileTrait;

    public function list()
    {
        $users = User::where(['rule' => '0'])
            ->with('user_instances')
            ->orderBy('id', 'DESC')
            ->get();

        return DataTables::of($users)
            ->addIndexColumn()
            ->editColumn('id', '{{$id}}')
            ->editColumn('phone', function($users) {
                return Helper::phoneFormat($users->phone);
            })
            ->editColumn('status', function($users) {
                return ($users->status == 1) ? trans('Admin.Active') : trans('Admin.No active');
            })
            ->addColumn('photo', function($users) {
                Log::info("photo: ". $users->photo);
                Log::info("path: ".json_encode(asset("upload/photos/".$users->photo)));
                return '<div class="avatar avatar-xl">
                            <img src="'.asset("upload/photos/".$users->photo).'" alt="Photo"/>
                        </div>';
            })
            ->addColumn('instance', function($users) {
                $instance = "";
                foreach($users->user_instances as $ui) {
                    $instance .= '<div>'.$ui->instance->name_ru.'</div>';
                }
                return $instance;
            })
            ->addColumn('action', function ($users) {
                $btn = '<div class="text-right">
                            <a href="javascript:void(0);" class="text-primary js_edit_btn mr-3"
                                data-update_url="'.route('user.update', $users->id).'"
                                data-one_data_url="'.route('user.getOne', $users->id).'"
                                title="Редактирование">
                                <i class="fas fa-pen mr-50"></i> Edit
                            </a>
                            <a class="text-danger js_delete_btn" href="javascript:void(0);"
                                data-toggle="modal"
                                data-target="#deleteModal"
                                data-name="'.$users->name.'"
                                data-url="'.route('user.destroy', $users->id).'" title="Выключать">
                                <i class="far fa-trash-alt mr-50"></i> Delete
                            </a>
                        </div>';
                return $btn;
            })
            ->setRowClass('js_this_tr')
            ->rawColumns(['photo', 'instance', 'action'])
            ->setRowAttr(['data-id' => '{{ $id }}'])
            ->make();
    }

    public function one(int $id)
    {
        return User::with('user_instances')->findOrFail($id);
    }

    public function create(array $data)
    {
        DB::beginTransaction();
            $photo = $this->fileUpload($data['photo'], 'upload/photos');

            $userId = User::insertGetId([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'photo' => $photo,
                'username' => strtolower($data['username']),
                'password' => Hash::make($data['password'])
            ]);

            $this->user_instance($data['instances'], $userId);
        DB::commit();
        return $userId;
    }

    public function update(array $data, int $id)
    {
        DB::beginTransaction();
            $user = User::findOrfail($id);
            if (isset($data['photo'])) {
                $this->fileDelete('upload/photos/'.$data['photo']);
                $user->fill(['photo' => $this->fileUpload($data['photo'], 'upload/photos')]);
            }
            if (isset($data['password'])) {
                $user->fill(['password' => Hash::make($data['password'])]);
            }
            $user->fill([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'status' => $data['status'],
                'username' => strtolower($data['username'])
            ]);
            $user->save();

            $this->user_instance($data['instances'], $id);
        DB::commit();
        return $id;
    }

    public function delete(int $id)
    {
        $user = User::findOrFail($id);
        $this->$this->fileDelete('upload/photos/'.$user->photo);
        return $user->delete();
    }


    public function profile(array $data)
    {
        $id = Auth::id();
        $user = User::findOrfail($id);
        if (isset($data['photo'])) {
            $user->fill(['photo' => $this->fileUpload($data['photo'], 'upload/photos')]);
        }
        if (isset($data['password'])) {
            $user->fill(['password' => Hash::make($data['password'])]);
        }
        $user->fill([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'username' => $data['username']
        ]);
        $user->save();
        return $id;
    }


    protected function user_instance(array $instances, int $userId): void
    {
        DB::transaction(function () use ($userId, $instances) {
            UserInstance::where('user_id', $userId)->delete();
            $data = [];
            foreach ($instances as $instanceId) {
                $data[] = [
                    'user_id' => $userId,
                    'instance_id' => $instanceId,
                ];
            }
            UserInstance::insert($data);
        });
    }


}

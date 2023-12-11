<?php

namespace App\Services;

use App\Helpers\Helper;
use App\Models\User;
use App\Models\UserInstance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use function PHPUnit\Framework\isFalse;

class UserService
{
    public function list()
    {
        $users = User::where(['rule' => '0'])
            ->with('user_instances')
            ->whereNull('deleted_at')
            ->orderBy('id', 'DESC')
            ->get();

        return DataTables::of($users)
            ->addIndexColumn()
            ->editColumn('id', '{{$id}}')
            ->editColumn('phone', function($users) {
                return Helper::phoneFormat($users->phone);
            })
            ->editColumn('status', function($users) {
                return ($users->status == 1) ? 'Active' : 'No active';
            })
            ->addColumn('photo', function($users) {
                return '<div class="avatar avatar-xl">
                            <img src="'.asset("assets/images/".$users->photo).'" alt="Photo"/>
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
            $photo = $this->file_upload($data['photo']);

            $userId = User::insertGetId([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'photo' => $photo,
                'username' => strtolower($data['username']),
                'password' => $data['password']
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
                if (file_exists(public_path().'/assets/images/'.$user->photo)) {
                    unlink(public_path().'/assets/images/'.$user->photo);
                }
                $user->fill(['photo' => $this->file_upload($data['photo'])]);
            }
            if (isset($data['password'])) {
                $user->fill(['password' => $data['password']]);
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
        return User::findOrFail($id)->update(['deleted_at' => now()]);
    }


    public function profile(array $data)
    {
        $id = auth()->id();
        $user = User::findOrfail($id);
        if (isset($data['photo'])) {
            $user->fill(['photo' => $this->file_upload($data['photo'])]);
        }
        if (isset($data['password'])) {
            $user->fill(['password' => $data['password']]);
        }
        $user->fill([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'username' => $data['username']
        ]);
        $user->save();
    }

    protected function user_instance(array $instances, int $userId) : void
    {
        UserInstance::where(['user_id' => $userId])->delete();

        foreach ($instances as $instanceId) {
            UserInstance::create([
                'user_id' => $userId,
                'instance_id' => $instanceId,
            ]);
        }
    }


    public function file_upload(object $photo): string
    {
        $photo_name = '';
        if($photo) {
            $photo_name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/assets/images/', $photo_name);
        }
        return $photo_name;
    }
}

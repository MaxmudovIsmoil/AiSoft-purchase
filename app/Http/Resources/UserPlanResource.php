<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "instance" => $this->instance->name_ru,
            "stage" => $this->stage,
            "users" => UserInstanceResource::collection($this->userInstance),
        ];
    }
}

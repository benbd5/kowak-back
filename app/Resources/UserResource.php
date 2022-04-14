<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'userId' => $this->userId,

            'firstName' => $this->firstName,

            'lastName' => $this->lastName,

            'phone' => $this->phone,

            'email' => $this->email,

            'password' => $this->password,

        ];
    }
}

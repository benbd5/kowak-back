<?php

namespace App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkSpaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'workSpaceId' => $this->workSpaceId,

            'name' => $this->name,

            'addressId' => $this->addressId,

            'featuresId' => $this->featuresId,

        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ListingsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return data as a resource
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'surname' => $this->surname,
            'email' => $this->email,
            'position' => $this->position
        ];
    }
}

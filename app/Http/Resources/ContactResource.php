<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'comments' => $this->comments,
            'location' => [
                'lat' => $this->location->getLat(),
                'lng' => $this->location->getLng()
            ],
            'in_area' => ($this->is_area) ? true : false
        ];
    }
}

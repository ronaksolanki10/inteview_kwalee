<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrentAvtar extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'message' => '',
            'data' => [
                'current_avtar' => $this->resource['current_avtar'],
                'unlocked_items' => $this->resource['unlocked_items']
            ]
        ];
    }
}

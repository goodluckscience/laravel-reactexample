<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PropertyjobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //Filter data
        return [
            'id' => $this->id,
            'summary' => $this->summary,
            'status' => $this->status,
            'property' => [
                'name' => $this->property->name,
            ],
            //'name' => $this->property->name,
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i'),
        ];
    }
}

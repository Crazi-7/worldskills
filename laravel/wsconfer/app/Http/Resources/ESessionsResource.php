<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ESessionsResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'speaker' => $this->speaker,
            'start' => $this->start,
            'end' => $this->end,
            'type' => $this->type,
            'cost' => $this->cost
            
        ];
    }
}

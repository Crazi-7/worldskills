<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LogsResource extends JsonResource
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
 
            'access' => $this->id == 1,
            'staff' => 
            [
                'id' => $this->staff->id,
                'full_name' => $this->staff->full_name,
                'photo' => $this->staff->photo,
                'camera' => $this->camera
            ],
            'point' => 
            [
                'id' => $this->points->id,
                'name' => $this->points->name
            ],
            'timestamp' => $this->created_at,
        ];
    }
}

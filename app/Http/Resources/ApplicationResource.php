<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
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
            'name' => $this->title,
            'description' => $this->description,
            'image' => $this->image_url,
            'target_amount' => $this->target_amount,
            'amount_gained' => $this->amount_gained,
            'progress' => round(($this->amount_gained / $this->target_amount), 3)
        ];
    }
}

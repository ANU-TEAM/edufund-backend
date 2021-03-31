<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Application;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Storage;

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
            'title' => $this->title,
            'description' => $this->description,
            'image_url' => Storage::disk('public')->url($this->image_url),
            'target_amount' => $this->target_amount,
            'amount_gained' => $this->amount_gained,
            'progress' => round(($this->amount_gained / $this->target_amount), 3),
            'approved' => $this->approved,
            'category' => [
                'id' => Application::find($this->id)->category->id,
                'name' => Application::find($this->id)->category->name,
            ],
            'user' => [
                'name' => Application::find($this->id)->user->name,
                'email' => Application::find($this->id)->user->email
            ]
        ];
    }
}

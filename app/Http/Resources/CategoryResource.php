<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $arrayData = [
            'id' => $this->id,
            'name' => $this->name,
            'order' => $this->id,
            'title' => $this->name
        ];

        if ($this->images != null) {
            // $arrayData['photo'] = new CategoryImageResource($this->images);
            $arrayData['photo'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] . Storage::url($this->images->image);
        } else {
            $arrayData['photo'] = null;
        }

        return $arrayData;
    }
}

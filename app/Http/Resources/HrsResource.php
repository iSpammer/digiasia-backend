<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HrsResource extends JsonResource
{
    /**php artisan make:controller API/AuthController
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

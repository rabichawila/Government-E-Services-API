<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"                    => $this->id,
            "reg_no"                => $this->reg_no,
            "condition"             => $this->condition,
            "make"                  => $this->make,
            "model"                 => $this->model,
            "body_type"             => $this->body_type,
            "chassis_no"            => $this->chassis_no,
            "year"                  => $this->year,
            "local_manufactured"    => $this->local_manufactured,
            "unladen_weight"        => $this->unladen_weight,
            "gross_weight"          => $this->gross_weight,
            "axels"                 => $this->axels,
            "seating_capacity"      => $this->seating_capacity,
            "standing_capacity"     => $this->standing_capacity,
            "engine_no"             => $this->engine_no,
            "engine_capacity"       => $this->engine_capacity,
            "color"                 => $this->color,
            "fuel"                  => $this->fuel,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShiftResource extends JsonResource
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
            'shift_start_details' => $this->shift_start_details,
            'shift_end_details' => $this->shift_end_details,
            'shift_type' => [$this->shift_type => $this->translateShiftType($this->shift_type)],
            'in_office' => [$this->in_office => $this->translateInOfficeType($this->in_office)],
            'shift_type_translatables' => $this->shiftTypeTranslatables,
            'in_office_translatables' => $this->inOfficeTranslatables,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

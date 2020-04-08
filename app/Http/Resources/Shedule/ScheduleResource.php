<?php

namespace App\Http\Resources\Schedule;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\AppointmentSchedule;

class ScheduleResource extends JsonResource
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

            'attributes'    => [
                'title' => $this->title,
                'date'=>$this->date,
                'end'=>$this->end,

            ],
        ];
    }
}

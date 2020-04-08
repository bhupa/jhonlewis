<?php
namespace App\Repositories;



use App\Models\Appointment;
use App\Models\AppointmentSchedule;

Class AppointmentScheduleRepository extends BaseRepository {

    public function __construct(AppointmentSchedule $appointment){

        $this->model = $appointment;

    }

}

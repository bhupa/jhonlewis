<?php
namespace App\Repositories;



use App\Models\Appointment;

Class AppointmentRepository extends BaseRepository {

    public function __construct(Appointment $appointment){

        $this->model = $appointment;

    }

}

<?php
namespace App\Repositories;



use App\Models\Doctor;

Class DoctorRepository extends BaseRepository {

    public function __construct(Doctor $doctor){

        $this->model = $doctor;

    }

}

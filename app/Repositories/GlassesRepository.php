<?php
namespace App\Repositories;



use App\Models\Glasses;

Class GlassesRepository extends BaseRepository {

    public function __construct(Glasses $glasses){

        $this->model = $glasses;

    }

}

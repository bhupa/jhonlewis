<?php
namespace App\Repositories;


use App\Models\Service;

Class ServiceRespository extends BaseRepository {

    public function __construct(Service $service){

        $this->model = $service;

    }

}

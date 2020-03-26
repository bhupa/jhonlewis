<?php
namespace App\Repositories;



use App\Models\Package;

Class PackageRepository extends BaseRepository {

    public function __construct(Package $package){

        $this->model = $package;

    }

}

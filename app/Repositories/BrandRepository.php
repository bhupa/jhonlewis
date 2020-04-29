<?php
namespace App\Repositories;


use App\Models\Brand;

Class BrandRepository extends BaseRepository {

    public function __construct(Brand $brand){

        $this->model = $brand;

    }

}

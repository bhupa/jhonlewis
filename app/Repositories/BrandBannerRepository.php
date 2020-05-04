<?php
namespace App\Repositories;




use App\Models\BrandBanner;

Class BrandBannerRepository extends BaseRepository {

    public function __construct(BrandBanner $brand){

        $this->model = $brand;

    }

}

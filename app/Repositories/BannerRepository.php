<?php
namespace App\Repositories;

use App\Models\Banner;
use App\Models\Blog;

Class BannerRepository extends BaseRepository {

    public function __construct(Banner $banner){

        $this->model = $banner;

    }

}

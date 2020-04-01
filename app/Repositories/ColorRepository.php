<?php
namespace App\Repositories;

use App\Models\Blog;
use App\Models\Color;

Class ColorRepository extends BaseRepository {

    public function __construct(Color $color){

        $this->model = $color;

    }

}

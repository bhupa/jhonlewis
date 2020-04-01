<?php
namespace App\Repositories;


use App\Models\Frame;
use App\Models\FrameCategory;

Class FrameCategoryRepository extends BaseRepository {

    public function __construct(FrameCategory $frameCategory){

        $this->model = $frameCategory;

    }

}

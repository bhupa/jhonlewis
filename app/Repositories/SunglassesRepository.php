<?php
namespace App\Repositories;

use App\Models\Sunglasses;

Class SunglassesRepository extends BaseRepository {

    public function __construct(Sunglasses $sunglasses){

        $this->model = $sunglasses;

    }

}

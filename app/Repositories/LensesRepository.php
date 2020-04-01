<?php
namespace App\Repositories;


use App\Models\Lenses;

Class LensesRepository extends BaseRepository {

    public function __construct(Lenses $lenses){

        $this->model = $lenses;

    }

}

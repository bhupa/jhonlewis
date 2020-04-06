<?php
namespace App\Repositories;


use App\Models\SalesReport;

Class SalesResportRepository extends BaseRepository {

    public function __construct(SalesReport $sales){

        $this->model = $sales;

    }

}

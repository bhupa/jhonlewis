<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\Stock;

Class StockRepository extends BaseRepository {

    public function __construct(Stock $stock){

        $this->model = $stock;

    }

}

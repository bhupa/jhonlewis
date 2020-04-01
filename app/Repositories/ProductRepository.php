<?php
namespace App\Repositories;

use App\Models\Product;

Class ProductRepository extends BaseRepository {

    public function __construct(Product $product){

        $this->model = $product;

    }

}

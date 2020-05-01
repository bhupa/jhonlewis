<?php
namespace App\Repositories;


use App\Models\ProductLists;

Class ProductListRepository extends BaseRepository {

    public function __construct(ProductLists $product){

        $this->model = $product;
    }

}

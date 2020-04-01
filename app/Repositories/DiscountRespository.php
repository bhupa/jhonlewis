<?php
namespace App\Repositories;



use App\Models\Discount;

Class DiscountRespository extends BaseRepository {

    public function __construct(Discount $discount){

        $this->model = $discount;

    }

}

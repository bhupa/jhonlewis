<?php
namespace App\Repositories;




use App\Models\Order;

Class OrderRepository extends BaseRepository {

    public function __construct(Order $order){

        $this->model = $order;

    }

}

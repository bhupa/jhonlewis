<?php
namespace App\Repositories;

use App\Models\Shipping;

Class ShippingRepository extends BaseRepository {

    public function __construct(Shipping $shipping){

        $this->model = $shipping;

    }

}

<?php
namespace App\Repositories;



use App\Models\Whishlist;

Class WishListRepository extends BaseRepository {

    public function __construct(Whishlist $wishlist){

        $this->model = $wishlist;

    }

}

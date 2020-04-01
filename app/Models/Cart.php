<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Cart extends Model
{
    public $items;
    public $totalItem = 0;
    public $totalPrice = 0;

    public function __construct($oldcart)
    {
        if($oldcart){
            $this->items = $oldcart->items;
            $this->totalItem = $oldcart->totalItem;
            $this->totalPrice = $oldcart->totalPrice;
        }
    }

    public function add($stock, $product,$piece){

        if(!empty($product->discount_id)){
            $discount = $product->discount->percentage;
            $discountPrice = $piece *($product->price * ($product->discount->percentage / 100));
        }else{
            $discount =null;
            $discountPrice =null;
        }
        Cache::put( 'cart',  ['total_quantity'=>$stock->piece,'slug'=>$product->slug,'image'=>$stock->image,'discount_price'=>$discountPrice,'unit_price'=>$product->price,'discount'=>$discount,'title'=>$product->title,'piece'=>$piece,'price'=>$product->price ,'color_id'=>$stock->color_id,'color'=>$stock->color->name,'productId'=>$product->id,'stockId'=>$stock->id]);
        $storedItem = ['total_quantity'=>$stock->piece,'slug'=>$product->slug,'image'=>$stock->image,'discount_price'=>$discountPrice,'unit_price'=>$product->price,'discount'=>$discount,'title'=>$product->title,'piece'=>$piece,'price'=>$product->price,'color_id'=>$stock->color_id,'color'=>$stock->color->name,'productId'=>$product->id,'stockId'=>$stock->id];
        if($this->items){
            if(array_key_exists($stock->id, $this->items)){

                $storedItem  = $this->items[$stock->id];
                $storedItem['title']= $product->title;
                $storedItem['piece']= $piece;
                $storedItem['color']=$stock->color->name;
                $storedItem['color_id']=$stock->color_id;
                $storedItem['productId']= $product->id;
                $storedItem['total_quantity']=$stock->piece;
                $storedItem['stockId']= $stock->id;
                $storedItem['slug']= $product->slug;
                $storedItem['unit_price']= $product->price;
                $storedItem['discount']=  $discount;
                $storedItem['discount_price']=  $discountPrice;
                $storedItem['price']= $piece * $product->price - $storedItem['discount_price'];
                $storedItem['image']= $stock->image;
                $this->totalItem--;

            }
        }

//        $storedItem  = $this->items[$stock->id];
        $storedItem['piece']= $piece;
        $storedItem['slug']= $product->slug;
        $storedItem['productId']= $product->id;
        $storedItem['total_quantity']=$stock->piece;
        $storedItem['stockId']= $stock->id;
        $storedItem['price']= $piece * $product->price - $storedItem['discount_price'];
        $storedItem['discount']= $discount;
        $storedItem['unit_price']= $product->price;
        $storedItem['discount_price']=  $discountPrice;
        $storedItem['image']= $stock->image;
        $this->items[$stock->id] =$storedItem ;
        $storedItem['color']=$stock->color->name;
        $storedItem['color_id']=$stock->color_id;

        $this->totalItem  = count($this->items);
//        $this->totalPrice += $storedItem['price'];
        $this->location = 'this is test';
    }
}

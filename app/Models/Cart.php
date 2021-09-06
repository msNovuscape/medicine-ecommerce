<?php

namespace App\Models;



class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item,$id,$qtyToIncreaseBy){
            $storedItem = ['qty' => 0,'price' => $item->sp_per_piece, 'item' => $item];
             if ($this->items){

                 if(array_key_exists($id, $this->items)){
                     $storedItem = $this->items[$id];
                 }
             }
             $storedItem['qty'] += $qtyToIncreaseBy;
             $storedItem['price'] = $item->sp_per_piece * $storedItem['qty'];
             $this->items[$id] = $storedItem;
             $this->totalQty++;
             $this->totalPrice += $qtyToIncreaseBy * $item->sp_per_piece;
    }

    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['sp_per_piece'];
        $this->totalPrice -= $this->items[$id]['item']['sp_per_piece'];
        $this->totalQty--;

        if ($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }

    public function addByOne($id){
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['sp_per_piece'];
        $this->totalPrice += $this->items[$id]['item']['sp_per_piece'];
        $this->totalQty++;
    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}

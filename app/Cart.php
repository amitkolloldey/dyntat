<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
    public $items       = null;
    
    public $totalQty    = 0;
    
    public $totalPrice  = 0;
    
    
    public function __construct($OldCart) {
        if($OldCart){
            $this->items        = $OldCart->items;
            $this->totalQty     = $OldCart->totalQty;
            $this->totalPrice   = $OldCart->totalPrice;
        }
    }
    
    public function add($items){ 
    }
    
    
}
    
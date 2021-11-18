<?php

namespace App;



class Cart
{
        public $items=null;
        public $totalQty=0;
        public $totalPrice=0;
        public function __construct($oldcart)
        {

            if(isset($oldcart) && $oldcart != null && $oldcart ){

                $this->items =$oldcart->items;
                $this->totalQty =$oldcart->totalQty;
                $this->totalPrice =$oldcart->totalPrice;
            }
        }
        public function add($item,$id,$newprice,$newqte){
            $storeItems =['qty'=> 0,'onePrice'=>$newprice,'price'=>$newprice,'item'=>$item];
            if($this->items){
                if(array_key_exists($id,$this->items)){
                    $storeItems = $this->items[$id];
                }
            }
            $storeItems['onePrice'] =$newprice;
            /* is-close is-closed*/
            $storeItems['qty']+=$newqte;
            $storeItems['price'] = $newprice*$storeItems['qty'];
            $this->items[$id]=$storeItems;
            $this->totalQty+=$newqte;
            $this->totalPrice+=$newqte*$newprice;

        }

        public function change($item,$id,$newqte){

            $storeItems = $this->items[$id];
            $this->totalQty-=$storeItems['qty'];
            $this->totalPrice-= ($storeItems['qty']*$storeItems['onePrice']);
            $storeItems['qty']=$newqte;
            $storeItems['price'] = $storeItems['onePrice']*$storeItems['qty'];
            $this->items[$id]=$storeItems;
            $this->totalQty+=$storeItems['qty'];
            $this->totalPrice+=($storeItems['qty']*$storeItems['onePrice']);

        }
        public function delete($item,$id){

            $storeItems = $this->items[$id];
            $this->totalQty-=$storeItems['qty'];
            $this->totalPrice-= ($storeItems['qty']*$storeItems['onePrice']);
            unset($this->items[$id]);
            if(empty($this->items)){
                session()->flash('cart');

            }

        }
}

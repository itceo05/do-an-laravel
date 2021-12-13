<?php
namespace App\Helper;

use session;
use App\Models\MovieChair;
use App\Models\Food;

class CartAjax
{
    private $cart;
    private $food;

    public function __construct(){
        $this->cart = session('cart') ? session('cart') : [];
        $this->food = session('food') ? session('food') : [];
    }

    public function film($time_detail, $seat){
        $count_regular = 0;
        $count_vip = 0;
        $vip = MovieChair::where('id', 1)->first()->price;
        $regular = MovieChair::where('id', 2)->first()->price;
        $couple = MovieChair::where('id', 3)->first()->price;
        $this->cart[$time_detail->id]['detail'] = $time_detail;
        $this->cart[$time_detail->id]['seat'] = $seat;
        foreach($seat as $value){
            if(str_contains($value, 'e') || str_contains($value, 'f') || str_contains($value, 'g') || str_contains($value, 'h')){
                $count_vip++;
            }
            if(str_contains($value, 'a') || str_contains($value, 'b') || str_contains($value, 'c') || str_contains($value, 'd')){
                $count_regular++;
            }
        }
        $this->cart[$time_detail->id]['price'] = $vip*$count_vip + $regular*$count_regular + $couple*(count($seat)-$count_regular-$count_vip);
        $this->cart[$time_detail->id]['qty'] = count($seat);
        session(['cart'=>$this->cart]);
    }
    
    public function food($pro, $qty){
        if(is_numeric($qty)){
            if($qty<=0){
                $qty = 1;
            }else{
                $qty = ceil($qty);
            }
        }else{
            $qty = 1;
        }
        if(isset($this->food[$pro->id])){
            $this->food[$pro->id]['qty'] += $qty;
            $this->food[$pro->id]['price'] = $qty*$pro->price;
        }else{
            $this->food[$pro->id]['pro'] = $pro;
            $this->food[$pro->id]['qty'] = $qty;
            $this->food[$pro->id]['price'] = $qty*$pro->price;
        }
        session(['food'=>$this->food]);
    }

    public function update_food($id, $qty){
        if(is_numeric($qty)){
            if($qty<=0){
                $qty = 1;
            }else{
                $qty = ceil($qty);
            }
        }else{
            $qty = 1;
        }
        $this->food[$id]['qty']= $qty;
        $this->food[$id]['price'] = $qty*$this->food[$id]['pro']->price;
        session(['food'=>$this->food]);
    }

    public function content_food(){
        return $this->food;
    }

    public function content(){
        return $this->cart;
    }

    public function get_total_price(){
        $price = 0;
        foreach($this->cart as $item){
            $price += $item['price'];
        }
        foreach($this->food as $item){
            $price += $item['price'];
        }
        return $price;
    }

    public function get_total_amount(){
        $amount = 0;
        foreach($this->cart as $item){
            $amount += $item['qty'];
        }
        foreach($this->food as $item){
            $amount += $item['qty'];
        }
        return $amount;
    }

    public function remove_film($id){
        unset($this->cart[$id]);
        session(['cart'=>$this->cart]);
    }
    
    public function remove_food($id){
        unset($this->food[$id]);
        session(['food'=>$this->food]);
    }

    public function clear(){
        session(['cart'=>'']);
        session(['food'=>'']);
    }
}
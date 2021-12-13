<?php
namespace App\Helper;

use session;

class MovieAjax
{
    private $film;

    public function __construct(){
        $this->film = session('film') ? session('film') : [];
    }

    public function film($category, $limit){
        $this->film['category'] = $category;
        $this->film['limit'] = $limit;

        session(['film'=>$this->film]);
    }

    public function content(){
        return $this->film;
    }

    public function clear(){
        session(['film'=>'']);
    }
}
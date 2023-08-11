<?php
namespace App\Http;

use Illuminate\Support\Facades\Http;

class BallerAPIRequest{
    public $url;

    public function __construct($slug){
        $this->url="https://balldontlie.io/api/v1/{$slug}";
    }

    public function getResponse(){
        $response = Http::get($this->url);
        return $response->json();
    }


}

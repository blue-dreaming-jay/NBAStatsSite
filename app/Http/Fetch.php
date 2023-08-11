<?php
namespace App\Http;


use App\Http\BallerAPIRequest;

class Fetch{
    public static function getData($page, $params){
        $request=new BallerAPIRequest($params);
        $stats_request=$request->getResponse();
        $datas=$stats_request['data'];
        return $datas;
    }

    public static function pages($season){
        $params="games?seasons[]={$season}";
        $request=new BallerAPIRequest($params);
        $arr=$request->getResponse();
        $metadata=$arr['meta'];
        return $metadata['total_pages'];
    }

}
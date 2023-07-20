<?php
//require("router.php");
namespace App\Http\Controllers;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// require_once("./models/Database.php");
// require_once("./Http/retrieval.php");
// require_once("params.php");
// require_once("queries.php");

use App\Models\PlayerIDs;

use App\Models\Bullshit;

use App\Http\BallerAPIRequest;

// $config=require("config.php");


function fetch_data($slug, $attribute){
    $file=new BallerAPIRequest($slug);
    
    $data=$file->getResponse();
    
    $fetched_data=$data[$attribute];

    return $fetched_data;
}

function store_data($config, $database, $datas, $query){
    $db=new Bullshit($config[$database], 'root', '');
    
    foreach ($datas as $data){
        $params=make_param(['id', 'first_name', 'last_name'], $data);
        $db->query($query, $params);
    };
    return;
}


function retrieve_data($config, $database, $table, $columns){
    $db=new Bullshit($config[$database], 'root', '');
    $db->query(select_query($table, $columns));
}
   
?>
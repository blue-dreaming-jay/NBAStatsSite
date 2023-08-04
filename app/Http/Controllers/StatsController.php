<?php

namespace App\Http\Controllers;
use App\Models\PlayerRawStats;
use App\Models\PlayerIDs;
use Schema;
use App\Http\BallerAPIRequest;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    //

    public static function average_stats($name, $year){
        $names=explode('-', $name);
        $firstname=$names[0];
        $lastname=$names[1];
        $row=PlayerIDs::where('firstname', $firstname)->where('lastname', $lastname)->get()->toArray();

        $id=$row[0]['PlayerID'];

        $request=new BallerAPIRequest("season_averages?season={$year}&player_ids[]={$id}");

        $data=$request->getResponse();

        return $data;
     }



     public function show($name, $year){
        $average_stats=StatsController::average_stats($name, $year);
        return view('stats', $average_stats);
     }

 }


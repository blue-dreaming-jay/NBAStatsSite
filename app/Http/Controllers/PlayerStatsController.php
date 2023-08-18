<?php

namespace App\Http\Controllers;
use App\Models\PlayerRawStats;
use App\Models\PlayerIDs;
use Schema;
use App\Http\BallerAPIRequest;

use Illuminate\Http\Request;

class PlayerStatsController extends Controller
{
    //

    public static function get_id($name){
        $names=explode('-', $name);
        $firstname=$names[0];
        $lastname=$names[1];
        $row=PlayerIDs::where('firstname', $firstname)->where('lastname', $lastname)->get()->toArray();

        $id=$row[0]['PlayerID'];
        return $id;
    }

    public static function average_stats($name, $year){

        $id=PlayerStatsController::get_id($name);

        $request=new BallerAPIRequest("season_averages?season={$year}&player_ids[]={$id}");

        $data=$request->getResponse();

        return $data;
     }



     public function show($name, $year){
        $average_stats=PlayerStatsController::average_stats($name, $year)['data'][0];
        $player_raw_stats=PlayerRawStats::where('PlayerID', PlayerStatsController::get_id($name))->where('year', $year)->get()->toArray();
        $data=[
            'average'=>$average_stats,
            'raw'=>$player_raw_stats
        ];
        return view('stats', $data);
     }

 }


<?php

namespace App\Http\Controllers;
use App\Models\TeamIDs;
Use App\Models\TeamStats;

use Illuminate\Http\Request;

class TeamStatsController extends Controller
{
    public static function get_id($name){
        $row=TeamIDs::where('TeamName', $name)->get()->toArray();

        $id=$row[0]['TeamID'];

        return $id;
    }

    public static function avg_stats($name, $year){
        $raw_stats=TeamStats::where('TeamID', TeamStatsController::get_id($name))->where('Year', $year)->get()->toArray();

        $total=0;
        foreach ($raw_stats as $raw_stat){
            $total+=$raw_stat['Points'];
        }

        $avg=$total/sizeOf($raw_stats);

        return $avg;
    }

    public static function show($name, $year){
        $raw_stats=TeamStats::where('TeamID', TeamStatsController::get_id($name))->where('Year', $year)->get()->toArray();
        $data=[
            "average"=>TeamStatsController::avg_stats($name, $year),
            "raw"=>$raw_stats
        ];

        return view('teamstats', $data);
    }
}

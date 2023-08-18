<?php

namespace App\Http\Controllers;

use App\Models\TeamWinsLossesTies;
use Illuminate\Http\Request;
use App\Models\TeamIds;

class TeamController extends Controller
{
    public static function get_id($name){
        $row=TeamIDs::where('TeamName', $name)->get()->toArray();

        $id=$row[0]['TeamID'];

        return $id;
    }
    public static function get_years($slug){
        $years=TeamWinsLossesTies::where('TeamID', TeamController::get_id($slug))->get()->toArray();
        $years_played=[];
        foreach ($years as $year){
            $years_played[]=$year['year'];
        }

        return $years_played;
    }
    public function show($slug){
        $team_data=TeamIDs::where('TeamName', $slug)->get()->toArray();

        $data=[
            "team_data"=>$team_data[0],
            'years'=>TeamController::get_years($slug)
        ];

        return view('team', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamIDs;

class TeamsController extends Controller
{
    public function fetch_teams(){
        $team_names=TeamIDs::select('TeamName')->get()->toArray();
        $teams=['data'=>$team_names];
        return view('teams', $teams);
    }
}

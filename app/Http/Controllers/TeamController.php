<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamIds;

class TeamController extends Controller
{
    public function show($slug){
        $team_data=TeamIDs::where('TeamName', $slug)->get()->toArray();
        return view('team', $team_data[0]);
    }
}

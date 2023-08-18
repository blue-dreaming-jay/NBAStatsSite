<?php

namespace App\Http\Controllers;
use App\Models\PlayerIDs;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function fetch_players(){
        $names=PlayerIDs::select('firstname', 'lastname')->orderBy('lastname')->get()->toArray();
        $names_list=['names'=>$names];
        return view('players', $names_list);
    }
}

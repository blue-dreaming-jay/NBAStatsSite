<?php

namespace App\Http\Controllers;
use App\Models\PlayerIDs;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function fetch_players(){
        $firstnames=PlayerIDs::select('firstname')->get()->toArray();
        $lastnames=PlayerIDs::select('lastname')->get()->toArray();
        $names=['firstname'=>$firstnames, 'lastname'=>$lastnames];
        return view('players', $names);
    }
}

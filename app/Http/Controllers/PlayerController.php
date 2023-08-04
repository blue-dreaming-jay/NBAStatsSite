<?php
namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Models\PlayerIDs;
class PlayerController extends Controller
{
public function show($slug)
{
    $player_data=PlayerIDs::where('firstname', explode('-', $slug)[0])->get()->toArray();

    return view('player', $player_data[0]);
    //dd($player_data[0]);
    //return $player_data;
}
}
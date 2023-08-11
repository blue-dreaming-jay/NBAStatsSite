<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\BallerAPIRequest;

class TeamIDs extends Model
{
    protected $table="teamids";
    protected $fillable=[
        "TeamID",
        "TeamName",
        "City",
        "Division"
    ];

    public $timestamps=false;

    public static function add($page){

        $player_request=new BallerAPIRequest("teams?page={$page}");
        $request=$player_request->getResponse();
        $datas=$request['data'];
        var_dump($datas);
        foreach ($datas as $data){
            $input=[
                'TeamID'=>$data['id'], 
                'TeamName'=>$data['full_name'], 
                'City'=>$data['city'],
                'Division'=>$data['division']
            ];
            
            TeamIDs::updateOrCreate($input);
        };
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\BallerAPIRequest;
use App\Models\PlayerIDs;

class updatePlayers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update player table';

    public static $page=1;
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mod=updatePlayers::$page % 206;
        var_dump($mod);
        $player_request=new BallerAPIRequest("players?page={$mod}");
        $request=$player_request->getResponse();
        $datas=$request['data'];
        var_dump($datas);
        foreach ($datas as $data){
            $input=[
                'PlayerID'=>$data['id'], 
                'firstname'=>$data['first_name'], 
                'lastname'=>$data['last_name'], 
                'team'=>$data['team']['full_name'],
                'position'=>$data['position']
            ];
            
            PlayerIDs::updateOrCreate($input);
        };
        updatePlayers::$page+=1;
    }
}

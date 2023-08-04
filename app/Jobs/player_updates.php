<?php

namespace App\Jobs;

use App\Models\PlayerIDs;
use App\Http\BallerAPIRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class player_updates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    

    /**
     * Execute the job.
     */
    public static function update($page){

        $player_request=new BallerAPIRequest("players?page={$page}");
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
    }

    public function handle()
    {
        for ($i=1; $i<=206; $i++){
            player_updates::update($i);
            sleep(5);
        }
    }
}

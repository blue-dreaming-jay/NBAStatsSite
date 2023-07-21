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
    public function __construct(public PlayerIDs $playerids)
    {

    }

    /**
     * Execute the job.
     */
    public function handle()
    {

        $player_request=new BallerAPIRequest('players');
        $request=$player_request->getResponse();
        $datas=$request['data'];
        foreach ($datas as $data){
            $input=[
                'PlayerID'=>$data['id'], 
                'firstname'=>$data['first_name'], 
                'lastname'=>$data['last_name'], 
                'team'=>$data['team']['full_name'],
                'position'=>$data['position']
            ];
            var_dump($input);
            PlayerIDs::create($input);
        };
    }
}

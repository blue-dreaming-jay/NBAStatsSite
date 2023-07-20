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
    public function handle(): void
    {
        $player_request=new BallerAPIRequest('players');
        $request=$player_request->getResponse();
        $datas=$request['data'];
        $input=[];
        foreach ($datas as $data){
            $input[]=['ID'=>$data['id']];
        };
    }
}

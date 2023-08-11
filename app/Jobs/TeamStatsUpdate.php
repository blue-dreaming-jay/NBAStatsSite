<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\BallerAPIRequest;
use App\Http\Fetch;
use App\Models\TeamStats;

class TeamStatsUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $years;
    public function __construct($years)
    {
        $this->years=$years;
    }


    public static function update($page, $season){
        $params="games?seasons[]={$season}&page={$page}";

        $datas=Fetch::getData($page, $params);

        foreach ($datas as $data){
            $home=[
                'TeamID'=>$data['home_team']['id'],
                'Points'=>$data['home_team_score'],
                'Year'=>$data['season']
            ];
            var_dump($home);
            TeamStats::updateOrCreate($home);

            $visitor=[
                'TeamID'=>$data['visitor_team']['id'],
                'Points'=>$data['visitor_team_score'],
                'Year'=>$data['season']
            ];

            TeamStats::updateOrCreate($visitor);


        }

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->years as $year){

            $pages=Fetch::pages($year);
            for ($i=1; $i<=$pages; $i++){
                TeamStatsUpdate::update($i, $year);
                sleep(10);
            };
        };
    }
}

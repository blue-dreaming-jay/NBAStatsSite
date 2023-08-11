<?php

namespace App\Jobs;

use App\Models\PlayerIDs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\BallerAPIRequest;
use App\Http\Fetch;

use App\Models\PlayerRawStats;

class PlayerStatsUpdate implements ShouldQueue
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

    /**
     * Execute the job.
     */
    public static function update($page, $season){

        $params="stats?seasons[]={$season}&page={$page}";

        $datas=Fetch::getData($page, $params);

        foreach ($datas as $data){
            $input=[
                'PlayerID'=>$data['player']['id'],
                'points_scored'=>$data['pts'], 
                'minutes_played'=>"{$data['min']}", 
                'blocks'=>$data['blk'], 
                'assists'=>$data['ast'],
                'turnovers'=>$data['turnover'],
                'steals'=>$data['stl'],
                'field_goals_attempted'=>$data['fga'],
                'field_goals_made'=>$data['fgm'],
                'defensiverebound'=>$data['dreb'],
                'offensive_rebound'=>$data['oreb'],
                'fouls'=>$data['pf'],
                'free_throws_attempted'=>$data['fta'],
                'free_throws_made'=>$data['ftm'],
                'field_goal_percentage'=>$data['fg_pct'],
                'free_throw_percentage'=>$data['ft_pct'],
                'three_pointer_attempted'=>$data['fg3a'],
                'three_pointer_made'=>$data['fg3m'],
                'three_pointer_percentage'=>$data['fg3_pct'],
                'year'=>$season
            ];
            PlayerRawStats::updateOrCreate($input);
        };
    }
    public function handle()
    {
        foreach ($this->years as $year){

            $pages=Fetch::pages($year);
            for ($i=1; $i<=$pages; $i++){
                PlayerStatsUpdate::update($i, $year);
                sleep(10);
            }
        }    

    }
}

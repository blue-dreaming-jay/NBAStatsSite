<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PlayerIDs;
use App\Http\BallerAPIRequest;
use App\Models\PlayerRawStats;

class updateStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public static $counter=0;
    public static $years=[2016, 2017, 2018];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $player_id=PlayerIDs::pluck('PlayerID')[updateStats::$counter % 5130];

        foreach (updateStats::$years as $year) {
            $params="stats?seasons[]={$year}&player_ids[]={$player_id}";
            $request=new BallerAPIRequest($params);
            $stats_request=$request->getResponse();
            $datas=$stats_request['data'];
            var_dump($datas);
            foreach ($datas as $data){
                $input=[
                    'PlayerID'=>$player_id,
                    'points_scored'=>$data['pts'], 
                    'minutes_played'=>$data['min'], 
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
                    'year'=>$year
                ];
                PlayerRawStats::updateOrCreate($input);
            };
            var_dump($year);
        };
        updateStats::$counter+=1;
    }
}

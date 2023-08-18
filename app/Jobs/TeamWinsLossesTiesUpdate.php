<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\TeamIDs;
use App\Models\TeamWinsLossesTies;
use App\Http\Fetch;

class TeamWinsLossesTiesUpdate implements ShouldQueue
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
    public static function default($year){
        $ids=TeamIDs::pluck('TeamID')->toArray();

        foreach ($ids as $id){
            $input=[
                'TeamID'=>$id,
                "wins"=>0,
                "losses"=>0,
                "ties"=>0,
                "year"=>$year
            ];
            TeamWinsLossesTies::updateOrCreate($input);
        }

    }

    public static function update_win_loss($page, $year){
        $params="games?seasons[]={$year}&page={$page}";
        $datas=Fetch::getData($params);
        foreach ($datas as $data){
            $home_team_points=$data['home_team_score'];
            $visiting_team_points=$data['visitor_team_score'];
            dump([$home_team_points, $visiting_team_points]);
            dump(TeamWinsLossesTies::where('TeamID', $data['visitor_team']['id'])->where('year', $year)->get()->toArray());
            dump(TeamWinsLossesTies::where('TeamID', $data['home_team']['id'])->where('year', $year)->get()->toArray());
            
            if ($visiting_team_points > $home_team_points){
                TeamWinsLossesTies::where('TeamID', $data['visitor_team']['id'])->where('year', $year)->increment('wins');
                TeamWinsLossesTies::where('TeamID', $data['home_team']['id'])->where('year', $year)->increment('losses');
            }
            else if ($visiting_team_points<$home_team_points){
                TeamWinsLossesTies::where('TeamID', $data['home_team']['id'])->where('year', $year)->increment('wins');
                TeamWinsLossesTies::where('TeamID', $data['visitor_team']['id'])->where('year', $year)->increment('losses');
            }
            else {
                TeamWinsLossesTies::where('TeamID', $data['visitor_team']['id'])->where('year', $year)->increment('ties');
                TeamWinsLossesTies::where('TeamID', $data['home_team']['id'])->where('year', $year)->increment('ties');

            }
            dump(TeamWinsLossesTies::where('TeamID', $data['visitor_team']['id'])->where('year', $year)->get()->toArray());
            dump(TeamWinsLossesTies::where('TeamID', $data['home_team']['id'])->where('year', $year)->get()->toArray());
        }

    }

    public function handle(): void
    {
        foreach ($this->years as $year){
            $pages=Fetch::pages("games?seasons[]={$year}");

            TeamWinsLossesTiesUpdate::default($year);

            for ($i=1; $i<=$pages; $i++){
                TeamWinsLossesTiesUpdate::update_win_loss($i, $year);
            }
        }
    }
}

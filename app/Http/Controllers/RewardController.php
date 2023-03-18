<?php

namespace App\Http\Controllers;
use App\Models\Reward;
use App\Models\RewardLog;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    //
    public static function getRewardLog(){
        $rewardLog = RewardLog::all();
        return  $rewardLog;
    }

    public function getReward(Request $request){

        $reward = Reward::all();
        $reward_log = self::getRewardLog();

        return response()->json([
            'status' => 'success',
            'reward' => ($reward) ? $reward : [],
            'reward_log' => ($reward_log) ? $reward_log : [],
        ], 201);
    }
    public function randomReward(Request $request){

        $sum_percent = 0;
        $max = 1;
        $reward = [];

        try {

            $get_log = RewardLog::count();

            if($get_log > 100){
                return response()->json([
                    'status' => 'exceed_limit',
                ], 200);
            }

            $data = Reward::where("stock",">",0)->get();
            $random_percent = mt_rand() / mt_getrandmax();
            if(count($data) > 0){
                foreach ($data as $prize => $percent) {
                    $sum_percent += floatval($percent->chance);
                    if ($random_percent <= $sum_percent && intval($percent->stock) > 0) {
                        // echo $max.' : คุณได้รับ '.$data[$prize].' แล้ว! <br>';
                        Reward::find($percent->id)->decrement('stock',1);
                        RewardLog::insert([
                                'name'          => $percent->name,
                                "game_item_id"  => $percent->game_item_id,
                                "chance"        => $percent->chance,
                                "qty"           => 1
                            ]);
                        unset($percent["id"]);
                        $reward = $percent;
                        $max++;
                        break;
                    }
                }
            }

            $get_log = self::getRewardLog();

            return response()->json([
                'status' => 'success',
                'reward' => $reward,
                'reward_log' =>  $get_log
            ], 200);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error' , 'message' => $e->getMessage()], 500);
        }

    }
}

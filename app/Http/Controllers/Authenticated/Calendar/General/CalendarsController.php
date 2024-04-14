<?php

namespace App\Http\Controllers\Authenticated\Calendar\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendars\General\CalendarView;
use App\Models\Calendars\ReserveSettings;
use App\Models\Calendars\Calendar;
use App\Models\USers\User;
use Auth;
use DB;

class CalendarsController extends Controller
{
    public function show(){
        $calendar = new CalendarView(time());
        return view('authenticated.calendar.general.calendar', compact('calendar'));
    }

    public function reserve(Request $request){
        DB::beginTransaction();
        try{
            $getPart = $request->getPart;
            $getDate = $request->getDate;
            $reserveDays = array_filter(array_combine($getDate, $getPart));//いらない
            foreach($reserveDays as $key => $value){//いらない
                $reserve_settings = ReserveSettings::where('setting_reserve', $key)->where('setting_part', $value)->first();
                $reserve_settings->decrement('limit_users');//decrementの逆　増やす
                $reserve_settings->users()->attach(Auth::id());//attachの逆　削除
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback(); //現行のトランザクションで実行した作業を取り消します
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

    //スクール予約の削除
    public function delete(Request $request){
        DB::beginTransaction();
        try{
            $deleteDate = $request->deleteDate;
             // リクエストからデータを取得
            $deletePart = $request->input('deletePart');
            // 変数の初期化
            $number = null;
             // 条件分岐
             if($deletePart == "リモ1部"){
                $number = 1;
            }else if($deletePart == "リモ2部"){
                $number = 2;
            }else if($deletePart == "リモ3部"){
                $number = 3;
            }
            $reserve_settings = ReserveSettings::where('setting_reserve', $deleteDate)->where('setting_part', $number)->first();

            // $reserve_settingsがnullでない場合にのみ処理を行う
            if($reserve_settings !== null) {
            $reserve_settings->increment('limit_users');//decrementの逆　増やす
            $reserve_settings->users()->detach(Auth::id());//attachの逆　削除
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }

        return redirect()->route('calendar.general.show',['user_id' => Auth::id()]);
    }
}

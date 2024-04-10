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
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

    //スクール予約の削除
    public function delete(Request $request){
        DB::beginTransaction();
        try{
            $getDate = $request->getDate;
            $getPart = $request->getPart;
            $reserve_settings = ReserveSettings::where('date', $date)->where('part', $part)->first();
            $reserve_settings->increment('limit_users');//decrementの逆　増やす
            $reserve_settings->users()->detach(Auth::id());//attachの逆　削除
        DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }

        return redirect()->route('calendar.general.show',['user_id' => Auth::id()]);
    }
}

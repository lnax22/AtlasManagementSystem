<?php
namespace App\Calendars\General;

use Carbon\Carbon;
use Auth;

class CalendarView{

  private $carbon;
  function __construct($date){
    $this->carbon = new Carbon($date);
  }

  public function getTitle(){
    return $this->carbon->format('Y年n月');
  }

  function render(){
    $html = [];
    $html[] = '<div class="calendar text-center">';
    $html[] = '<table class="table">';
    $html[] = '<thead>';
    $html[] = '<tr>';
    $html[] = '<th>月</th>';
    $html[] = '<th>火</th>';
    $html[] = '<th>水</th>';
    $html[] = '<th>木</th>';
    $html[] = '<th>金</th>';
    $html[] = '<th>土</th>';
    $html[] = '<th>日</th>';
    $html[] = '</tr>';
    $html[] = '</thead>';
    $html[] = '<tbody>';
    $weeks = $this->getWeeks();
    foreach($weeks as $week){
      $html[] = '<tr class="'.$week->getClassName().'">';

      $days = $week->getDays();
      foreach($days as $day){
        $startDay = $this->carbon->copy()->format("Y-m-01");
        $toDay = $this->carbon->copy()->format("Y-m-d");


        //一個一個の日付を表示
        if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){
          //過ぎた日にち
          $html[] = '<td class="calendar-td past">';
          }else{

          //明日以降の日にち
          $html[] = '<td class="calendar-td '.$day->getClassName().'">';
        }
        $html[] = $day->render();

        //in_array()は、指定した値が配列に含まれているかどうかを確認するPHP関数です。
        //$day->everyDay()は、$dayオブジェクトのeveryDayメソッドの戻り値を表します。「everyDay」という何らかの情報を取得しています。
        //$day->authReserveDay()は、$dayオブジェクトのauthReserveDayメソッドの戻り値を表します。このメソッドは「authReserveDay」という何らかの情報を取得しています。
        //もし$day->everyDay()の戻り値が$day->authReserveDay()で返される配列に含まれていれば、条件は真となります。

        //スクール参加している日
        if(in_array($day->everyDay(), $day->authReserveDay())){
          $reservePart = $day->authReserveDate($day->everyDay())->first()->setting_part;
          //$day->everyDay() ⇨ 毎日 かつ $day->authReserveDay() ⇨ 〇〇している日
          if ($toDay <= $day->everyDay()) {
          if($reservePart == 1){
            $reservePart = "リモ1部";
          }else if($reservePart == 2){
            $reservePart = "リモ2部";
          }else if($reservePart == 3){
            $reservePart = "リモ3部";
          }
          }

          if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){
          //月初から毎日 かつ 今日よりも前の以前の日 ⇨つまり〇〇〜〇〇までの間の日
            $html[] = '<p class="m-auto p-0 w-75" style="font-size:12px"></p>';
            $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';

          //そうじゃない日　⇨つまり〇〇〜〇〇までの間の日
          }else{
            //スクール何部かを表示させるボタン
            $html[] = '<button type="submit" class="btn btn-danger p-0 w-75" data-toggle="modal" data-target="#exampleModal" name="delete_date" style="font-size:12px" value="'. $day->authReserveDate($day->everyDay())->first()->setting_reserve .'">'. $reservePart .'</button>';
            $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';

          }
        }else{
          //$day->everyDay() ⇨ 毎日 かつ $day->authReserveDay() ⇨ 〇〇していない日
          echo "受付終了";
          $html[] = $day->selectPart($day->everyDay());


        }
        $html[] = $day->getDate();
        $html[] = '</td>';
      }
      $html[] = '</tr>';
    }
    $html[] = '</tbody>';
    $html[] = '</table>';
    $html[] = '</div>';
    $html[] = '<form action="/reserve/calendar" method="post" id="reserveParts">'.csrf_field().'</form>';
    $html[] = '<form action="/delete/calendar" method="post" id="deleteParts">'.csrf_field().'</form>';

    return implode('', $html);
  }

  protected function getWeeks(){
    $weeks = [];
    $firstDay = $this->carbon->copy()->firstOfMonth();
    $lastDay = $this->carbon->copy()->lastOfMonth();
    $week = new CalendarWeek($firstDay->copy());
    $weeks[] = $week;
    $tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();
    while($tmpDay->lte($lastDay)){
      $week = new CalendarWeek($tmpDay, count($weeks));
      $weeks[] = $week;
      $tmpDay->addDay(7);
    }
    return $weeks;
  }




}

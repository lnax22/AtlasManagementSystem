@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto border" style="border-radius:5px;">
    <!-- $calendar = new CalendarView(time());
  つまり、App > Calendarsフォルダにカレンダーの表示部分に関する記述がされているのです。今回でいえば、App > Calendars > General > CalendarViewファイルとなります。-->
      <p class="text-center">{{ $calendar->getTitle() }}</p>

      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>

<!-- スクール予約キャンセル用のモーダル -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <form action="/delete/calendar" method="post">
      <div class="w-100">
        <div class="modal-inner-body w-50 m-auto pt-3 pb-3">
           <p class="schoolDate" name="reserveDate"></p>
        </div>
        <div class="modal-inner-title w-50 m-auto">
          <p class="schoolTime" name="reservePart"></p>
          上記の予約をキャンセルしてもよろしいですか？
        </div>
        <div class="w-50 m-auto edit-modal-btn d-flex">
          <a class="js-modal-close btn btn-danger d-inline-block" href="">閉じる</a>
          <input type="hidden" class="edit-modal-part" name="deletePart[]" value="">
          <input type="hidden" class="edit-modal-date" name="deleteDate[]" value="">

          <input type="submit" class="btn btn-primary d-block" value="キャンセル">
        </div>
      </div>
      {{ csrf_field() }}
    </form>
   </div>
</div>

 </div>
</div>
@endsection

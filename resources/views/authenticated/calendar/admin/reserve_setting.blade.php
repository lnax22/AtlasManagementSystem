@extends('layouts.sidebar')
@section('content')
<div class="m-auto">
 <div class="border m-5" style="align-items:center; justify-content:center; border-radius:10px; background:#FFF; box-shadow:0 6px 11px 0 rgba(0, 0, 0, .5);
">
    <p class="text-center">{{ $calendar->getTitle() }}</p>
    {!! $calendar->render() !!}
     <div class="adjust-table-btn m-auto text-right">
      <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
     </div>
   </div>
</div>
@endsection

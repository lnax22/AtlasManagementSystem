@extends('layouts.sidebar')
@section('content')
<div class="w-75 m-auto">
 <div class="border m-auto" style="align-items:center; justify-content:center; border-radius:5px; background:#FFF;">
   <div class="border">
    <p class="text-center">{{ $calendar->getTitle() }}</p>
    {!! $calendar->render() !!}
     <div class="adjust-table-btn m-auto text-right">
      <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
     </div>
   </div>
 </div>
</div>
@endsection

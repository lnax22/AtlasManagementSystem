@extends('layouts.sidebar')

@section('content')
<div class="w-75 m-auto">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
   <div class="w-100">
    <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
   </div>
 </div>
</div>
@endsection

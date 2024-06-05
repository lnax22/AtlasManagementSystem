@extends('layouts.sidebar')

@section('content')
<div class="w-75 m-auto">
  <div class="border m-auto" style="align-items:center; justify-content:center; border-radius:5px; background:#FFF;">
   <div class="border">
    <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
   </div>
 </div>
</div>
@endsection

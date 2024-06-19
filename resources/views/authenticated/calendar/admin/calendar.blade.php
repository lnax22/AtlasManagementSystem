@extends('layouts.sidebar')

@section('content')
<div class="w-75 m-auto">
  <div class="border m-5" style="align-items:center; justify-content:center; border-radius:10px; background:#FFF; box-shadow:0 6px 11px 0 rgba(0, 0, 0, .5);
">
   <div class="border">
    <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="school_reserve">
        {!! $calendar->render() !!}
      </div>
   </div>
 </div>
</div>
@endsection

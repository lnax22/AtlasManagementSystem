@extends('layouts.sidebar')

@section('content')
<!-- 予約詳細画面 -->
<div class="w-75 m-auto">
 <div class="border m-5" style="align-items:center; justify-content:center; border-radius:5px; background:#FFF;">
   <div class="border">

  <!-- <div class="w-50 m-auto h-75"> -->

    <p class="date_pate"><span>{{ $date }}日</span><span class="ml-3">{{ $part }}部</span></p>

    <div class="border_reserve">
        <div class="text-bar">
          <p class="text-bar-list">ID</p>
          <p class="text-bar-list">名前</p>
          <p class="text-bar-list">場所</p>
        </div>
      <table class="reserve-detail-table">
         @foreach($reservePersons as $reservePerson)
           @if($reservePerson->users)
              @foreach($reservePerson->users as $user)
                <tr class="text-reserve-detail">
                   <td>{{ $user->id }}</td>
                   <td>{{ $user->over_name }} {{ $user->under_name }}</td>
                   <td>リモート</td>
                </tr>
              @endforeach
           @endif
        @endforeach
      </table>
  </div>
</div>

@endsection

@extends('layouts.sidebar')

@section('content')
<!-- 予約詳細画面 -->
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-50 m-auto h-75">

    <p><span>{{ $date }}日</span><span class="ml-3">{{ $part }}部</span></p>

    <div class="h-75 border">
        <div class="text-bar">
          <p class="text-bar-list">ID</p>
          <p class="text-bar-list">名前</p>
          <p class="text-bar-list">場所</p>
        </div>
    <table class="reserve-detail-table">
    @foreach($reservePersons as $reservePerson)
     @if($reservePerson->users)
      @foreach($reservePerson->users as $user)
        <tr class="text-center">
          <td class="">{{ $user->id }}</td>
          <td class="">{{ $user->over_name }}{{ $user->under_name}}</td>
          <td class="">リモート</td>
        </tr>
      @endforeach
     @endif
    @endforeach
    </table>
    </div>
  </div>
</div>

@endsection

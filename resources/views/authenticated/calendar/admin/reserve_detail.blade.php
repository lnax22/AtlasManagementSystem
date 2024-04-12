@extends('layouts.sidebar')

@section('content')
<!-- 予約詳細画面 -->
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-50 m-auto h-75">

    <p><span>{{ $date }}日</span><span class="ml-3">{{ $part }}部</span></p>

   @foreach($reservePersons as $reservePerson)
    <div class="h-75 border">
      <table class="">
        <tr class="text-center">
          <th class="w-25">ID<br>{{ $reservePerson->id }}</th>
          <th class="w-25">名前<br>{{ $reservePerson->over_name }}{{ $reservePerson->under_name}}</th>
          <th class="w-25">場所<br></th>
        </tr>
     <div class="adjust-table-btn m-auto text-right">
   @endforeach
     </div>
        <tr class="text-center">
          <td class="w-25"></td>
          <td class="w-25"></td>
        </tr>
      </table>
    </div>
  </div>
</div>

@endsection

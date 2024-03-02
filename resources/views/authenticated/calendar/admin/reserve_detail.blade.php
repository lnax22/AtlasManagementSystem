@extends('layouts.sidebar')

@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-50 m-auto h-75">
    <p><span>日</span><span class="ml-3">部</span></p>
    <div class="h-75 border">
      <table class="">
        <tr class="text-center">
          <th class="w-25">ID</th>
          <th class="w-25">名前</th>
        </tr>
     <div class="adjust-table-btn m-auto text-right">
      <input type="submit" class="btn btn-danger" value="削除" form="reserveSetting" onclick="return confirm('上記の予約をキャンセルしてもよろしいですか？')">
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

@extends('layouts.sidebar')

@section('content')
<div class="search_content w-100 border d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border one_person">
      <div>
        <span class="info">ID : </span><span>{{ $user->id }}</span>
      </div>
      <div><span class="info">名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span class="info">カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span class="info">性別 : </span><span>男</span>
        @else
        <span class="info">性別 : </span><span>女</span>
        @endif
      </div>
      <div>
        <span class="info">生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span class="info">権限 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span class="info">権限 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span class="info">権限 : </span><span>講師(英語)</span>
        @else
        <span class="info">権限 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        <!-- ユーザー情報一覧の表示項目に選択科目を追加する -->
        @if($user->role == 4)
         @foreach($user->subjects as $subject)
         <span class="info">選択科目 :</span><span>{{ $subject->subject }}</span>
         @endforeach
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25">
    <div class="reserve_users_area_side">
      <span class="reserve_users_area_search">検索</span>
      <div>
        <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div>
        <span class="reserve_users_area_item">カテゴリ</span><br>
        <select form="userSearchRequest" name="category" class="userSearch-category">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div>
        <span class="reserve_users_area_item">並び替え</span><br>
        <select name="updown" form="userSearchRequest" class="userSearch-updown">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="add-search_conditions">
        <p class="m-0 search_conditions"><span class="reserve_users_area_item">検索条件の追加</span><span class="dli-chevron-down arrow2"></span></p>
        <div class="search_conditions_inner">
          <div>
            <span class="reserve_users_area_item">性別</span><br>
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
            <span>その他</span><input type="radio" name="sex" value="3" form="userSearchRequest">
          </div>
          <div>
            <span class="reserve_users_area_item">権限</span><br>
            <select name="role" form="userSearchRequest" class="engineer">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>

           <div class="selected_engineer">
            <span class="reserve_users_area_item">選択科目</span> <br>
            <!-- 同じname属性で複数のvalueを扱いたい場合にはname属性の後ろに配列を表す[]を付ける -->
           @foreach($subjects as $subject)
            <span>{{ $subject->subject }}</span> <input type="checkbox" name="subject[]" value="{{ $subject->id }}" form="userSearchRequest"/>
           @endforeach
           </div>
        </div>
      </div>
      <div>
        <input type="submit" class="search_btn" value="検索" form="userSearchRequest">
      </div>
      <div>
        <input type="reset" class="reset" value="リセット" form="userSearchRequest">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
<script src="user_search.js"></script>
@endsection

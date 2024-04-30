@extends('layouts.sidebar')

@section('content')
<div class="post_create_container d-flex">
  <div class="post_create_area border w-50 m-5 p-5">
    <!-- バリデーション エラーメッセージ-->
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="">
      <p class="mb-0">カテゴリー</p>
      <!-- カテゴリーの文字色は下記表示にする
        ・メインカテゴリー：グレー
        ・サブカテゴリー：黒
          ※サブカテゴリーのみ選択可能 -->
      <select class="w-100 category_select" form="postCreate" name="post_category_id">
      @foreach($main_categories as $main_category)
        <optgroup label="{{ $main_category->main_category }}">
            @foreach($sub_categories->where('main_category_id', $main_category->id) as $sub_category)
                <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category }}</option>
            @endforeach
        </optgroup>
    @endforeach
</select>

    </div>
    <div class="mt-3">
      @if($errors->first('post_title'))
      <span class="error_message">{{ $errors->first('post_title') }}</span>
      @endif
      <p class="mb-0">タイトル</p>
      <input type="text" class="w-100" form="postCreate" name="post_title" value="{{ old('post_title') }}">
    </div>
    <div class="mt-3">
      @if($errors->first('post_body'))
      <span class="error_message">{{ $errors->first('post_body') }}</span>
      @endif
      <p class="mb-0">投稿内容</p>
      <textarea class="w-100" form="postCreate" name="post_body">{{ old('post_body') }}</textarea>
    </div>
    <div class="mt-3 text-right">
      <input type="submit" class="btn btn-primary" value="投稿" form="postCreate">
    </div>
    <form action="{{ route('post.create') }}" method="post" id="postCreate">{{ csrf_field() }}</form>
  </div>
  @can('admin')
  <div class="w-25 ml-auto mr-auto">
    <div class="category_area mt-5 p-5">
      <div class="">
        <p class="m-0">メインカテゴリー</p>
        <input type="text" class="w-100" name="main_category_name" form="mainCategoryRequest">
        <input type="submit" value="追加" class="w-100 btn btn-primary p-0" form="mainCategoryRequest">
      </div>
      <form action="{{ route('main.category.create') }}" method="post" id="mainCategoryRequest">{{ csrf_field() }}</form>
      <!-- サブカテゴリー追加 -->
      <div class="">
        <p class="m-1">サブカテゴリー</p>
        <!-- 上段＝登録されているメインカテゴリーを選択 -->
         <select class="w-100" name="main_category_id" form="subCategoryRequest">
          <option value=""></option>
        @foreach($main_categories as $main_category)
          <option value="{{ $main_category->id }}">{{ $main_category->main_category }}</option>
        @endforeach
         </select>
         <!-- 下段＝サブカテゴリーの入力 -->
        <input type="text" class="w-100" name="sub_category" form="subCategoryRequest">
        <input type="submit" value="追加" class="w-100 btn btn-primary p-0" form="subCategoryRequest">
      </div>
      <form action="{{ route('sub.category.create') }}" method="post" id="subCategoryRequest">{{ csrf_field() }}</form>
    </div>
  </div>
  @endcan
</div>
@endsection

@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto"></p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p class="post_fullName"><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}" class="post_title">{{ $post->post_title }}</a></p>

    @foreach($post->sub_categories as $sub_category)
     <input type="submit" class = "category_btn_sub" value = "{{ $sub_category->sub_category}}">
    @endforeach


      <div class="post_bottom_area d-flex">
        <div class="d-flex post_status">
          <div class="mr-5">
    <!-- コメント数 -->
    <!-- public function commentCounts($post_id){
        return Post::with('postComments')->find($post_id)->postComments();
    } -->
           <i class="fa fa-comment"></i><span class="comment_Counts{{ $post->id }}">{{ $post_comment->commentCounts($post->id)->count() }}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fa fa-heart-o like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}"> {{ $like->likeCounts($post->id) }} </span></p>
            @else
            <p class="m-0"><i class="far fa-heart" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}"> {{ $like->likeCounts($post->id) }} </span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area w-25">
    <div class="m-4">
      <button class="bulletin_board_posts_btn"><a href="{{ route('post.input') }}" class="bulletin_board_posts_btn">投稿</a></button>
      <div class="searchKeyword">
        <input type="text" class="search-bar-left" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input type="submit" class="search-bar-right" value="検索" form="postSearchRequest">
      </div>
      <div class="myLikePosts">
        <input type="submit" name="like_posts" class="category_btn_like" value="いいねした投稿" form="postSearchRequest"></input>
        <input type="submit" name="my_posts" class="category_btn_myPosts" value="自分の投稿" form="postSearchRequest"></input>
      </div>
      <p class="accordion-category_title">カテゴリー検索</p>
         @foreach($main_categories as $main_category)
        <div id="accordion" class="accordion-category">
         <ul>
          <li>
           <div class="main_categories" name="category_word">
            <div class="main_category_header">
              <p class="main_category_title">{{ $main_category->main_category}}</p>
              <span class="dli-chevron-down arrow3"></span>
            </div>
            <div class="sub_categories_inner">
              @foreach($sub_categories->where('main_category_id', $main_category->id) as $sub_category)
               <input type="submit" name="sub_category_word" class="sub_category_accordion" value="{{ $sub_category->sub_category }}" form="postSearchRequest">
              @endforeach
            </div>
           </div>
           </li>
          </ul>
        </div>
         @endforeach
    </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
<script src="bulletin.js"></script>
@endsection

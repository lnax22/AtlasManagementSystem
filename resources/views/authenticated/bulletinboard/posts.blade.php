@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
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
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}"> {{ $like->likeCounts($post->id) }} </span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}"> {{ $like->likeCounts($post->id) }} </span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area border w-25">
    <div class="border m-4">
      <button class="bulletin_board_posts_btn"><a href="{{ route('post.input') }}" class="bulletin_board_posts_btn">投稿</a></button>
      <div class="">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input type="submit" value="検索" form="postSearchRequest">
      </div>
      <input type="submit" name="like_posts" class="category_btn_like" value="いいねした投稿" form="postSearchRequest">
      <input type="submit" name="my_posts" class="category_btn_myPosts" value="自分の投稿" form="postSearchRequest">
      <ul>
      @foreach($main_categories as $main_category)
        <li class="main_categories" name="category_word">{{ $main_category->main_category}}
        </li>
       @foreach($sub_categories->where('main_category_id', $main_category->id) as $sub_category)
       <input type="submit" name="category_word" class="category_btn_sub" value="{{ $sub_category->sub_category }}" form="postSearchRequest">
       @endforeach
      </ul>
      @endforeach
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection

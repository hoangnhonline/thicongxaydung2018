@extends('frontend.layout') 

@include('frontend.partials.meta') 

@section('content')
<div class="block2 block-breadcrumb">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>            
      <li class="active">{!! $cateDetail->name !!}</li>
    </ul>
  </div>
</div><!-- /block-breadcrumb -->
<div class="block block-two-col container">
  <div class="row">
    <div class="col-sm-9 col-xs-12 block-col-left">
      <div class="block-title-commom block-ct-news">
        <div class="block block-title">
          <h1>
            <i class="fa fa-home"></i>
            {!! $cateDetail->name !!}
          </h1>
        </div>
        <div class="block-content">            
          @foreach( $articlesArr as $articles )
          <div class="item">
            <div class="thumb">
              <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}"><img title="{!! $articles->title !!}" src="{{ $articles->image_url ? Helper::showImage($articles->image_url) : URL::asset('public/assets/images/no-img.png') }}" alt="{!! $articles->title !!}"></a>
            </div>
            <div class="des">
              <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a>
              <p class="date-post"><i class="fa fa-calendar"></i> {{ date('d/m/Y', strtotime($articles->created_at)) }}</p>
              <p class="description">{!! $articles->description!!}</p>
            </div>
          </div><!-- /item -->
          @endforeach
        </div>
      </div><!-- /block-ct-news -->
      <nav class="block-pagination">
        {{ $articlesArr->links() }}
      </nav><!-- /block-pagination -->
    </div><!-- /block-col-left -->
    @include('frontend.news.sidebar')
  </div>
</div><!-- /block_big-title -->
  
@stop
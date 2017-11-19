@extends('layouts.main')

@section('head')
<link href="<?= asset('/css/news-detail.css') ?>" rel="stylesheet">
@stop

@section('content')
<div class="content container">
		<div ng-controller="NewsDetailController" >
      @verbatim
      <div class="news-title">
        <p>{{ newsDate() }}</p>
        <h1>{{ news.title }}</h1>
        <p>
          <span class="tag-gray">กิจกรรม</span>
        </p>
      </div>
      <hr />
      <div class="news-content">
        <img alt="{{ news.title}}"  src="{{partImgActivity +'/' + news.pictureHD }}" err-SRC="{{partImgProduct}}/Noimage.jpg" />
        <div class="news-detail">
          {{ news.descriptionHD}}
        </div>
      </div>
      @endverbatim
				<input type="hidden" name="newsKey" ng-model="newsKey" value="{{ $id }}" />
			</div>
</div>
@stop
@section('footer')
	<script src="<?= asset('app/controllers/newsController.js') ?>"></script>
@endsection

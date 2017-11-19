@extends('layouts.main')

@section('head')
<style>
	.panel-body{
		overflow:auto;
	}
	.thumbnail-news {
	    display: block;
	    padding: 4px;
	    margin-bottom: 20px;
	    line-height: 1.42857143;
	    background-color: #fff;
	    border: 1px solid #ddd;
	    border-radius: 4px;
	    -webkit-transition: border .2s ease-in-out;
	    -o-transition: border .2s ease-in-out;
	    transition: border .2s ease-in-out;
	}
	.news-list > a,
	.news-list > a:hover{
		color:#000;
	}

</style>
@stop

@section('content')
<div class="content">
		<div ng-controller="NewsController" >
				<div class="row ">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-info">
			          <!-- <div class="panel-heading text-center">E-ordering</div> -->
			          <div class="panel-body">
										@verbatim
										<div class="row">
												<div class="col-sm-6 col-md-4 news-list" ng-repeat="(i , new) in news | orderBy:'-newsDate'">
														<a href="<?php echo url('news-detail'); ?>/{{ i+1 }}" title="{{ new.title }}">
														<div class="thumbnail-news">
																<img alt="{{ new.title}}" style="height: 200px; width: 100%; display: block;" src="{{partImgActivity +'/' + new.picture }}" err-SRC="{{partImgProduct}}/Noimage.jpg">
																<div class="caption"> <p>{{ newsDate(new.newsDate) }}<br/><strong>{{ new.title}}</strong></p></div>
														</div>
														</a>
												</div>
										</div>
										@endverbatim
			          </div>
			      </div>
			    </div>
			  </div>
			</div>
</div>
@stop
@section('footer')
	<script src="<?= asset('app/controllers/newsController.js') ?>"></script>
@endsection

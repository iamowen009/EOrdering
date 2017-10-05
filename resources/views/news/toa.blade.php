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
</style>
@stop

@section('content')
<div class="content">
		
	<div class="row ">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-info">
              <div class="panel-heading text-center">TOA Group</div>
              <div class="panel-body">
              	<br>
				
				<div class="col-sm-12 text-center"><label>ข่าวสารและกิจกรรม</label></div>
				<div class="row"> 
					<div class="col-sm-12 text-center"> <div > <img alt="100%x200" data-src="holder.js/100%x200"  src="http://placehold.it/800x400" data-holder-rendered="true"> 
					</div> </div> 
				</div>

              </div>
            </div>
        </div>
    </div>
@stop
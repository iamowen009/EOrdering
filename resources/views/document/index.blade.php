@extends('layouts.main')

@section('content')
<div class="content">
		
	<div class="row " ng-controller="DocumentController">
	@verbatim
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel">
				<div class="panel-heading text-center" style="background-color:#BFEBEE">เอกสารทั่วไป </div>
              <!--<div class="panel-heading text-center">เอกสารทั่วไป</div>-->
              <div class="panel-body">
              	<br>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="media" ng-repeat="document in documents"> 
							
							<div class="media-left" ng-show="{{$index+1%3 == 1}}"> 
								<a href="#"> <i class="fa fa-file-text-o fa-5x" ></i> </a> 
							</div> 
							<div class="media-left" ng-show="{{$index+1%3 == 2}}"> 
								<a href="#"> <i class="fa fa-list-alt fa-5x" style="color:green;"></i> </a> 
							</div> 
							<div class="media-left" ng-show="{{$index+1%3 == 0}}"> 
								<a href="#"> <i class="fa fa-clipboard fa-5x" style="color:orange;"></i> </a> 
							</div> 
							<div class="media-body" ng-click="openDoc(partFileDocument,document.fileName)"> <a style="cursor: pointer;"><small>หมวดหมู่ : {{document.categoryDesc}}</small><h4 class="media-heading">{{document.documentName}}</h4> {{document.description}} </a></div> 
							<div class="media-right"> {{document.documentDate| date :  "dd/MM/y"}}<br/><br/><!--<a href="{{partFileDocument}}/{{document.fileName}}" tabget="_blank">  <i class="fa fa-file-pdf-o fa-2x" style="color:red;" ></i></a>--><a href="{{partFileDocument}}/{{document.fileName}}">  &nbsp;&nbsp;<i class="fa fa-download fa-2x" style="color:green;"></i></a> </div> </div>

						<!--<div class="media"> 
							<div class="media-left"> 
								<a href="#"> <i class="fa fa-list-alt fa-5x" style="color:green;"></i> </a> 
							</div> 
							<div class="media-body"> <small>หมวดหมู่ : สีทาอาคาร</small><h4 class="media-heading">ทีโอเอ</h4> คุณสมบัติของทีโอเอ </div> 
							<div class="media-right"> 29/05/2560<br/><br/><a href="#">  <i class="fa fa-file-pdf-o fa-2x" style="color:red;"></i></a><a href="#">  &nbsp;&nbsp;<i class="fa fa-download fa-2x" style="color:green;"></i></a> </div> </div>

						<div class="media"> 
							<div class="media-left"> 
								<a href="#"> <i class="fa fa-clipboard fa-5x" style="color:orange;"></i> </a> 
							</div> 
							<div class="media-body"> <small>หมวดหมู่ : สีงานไม้</small><h4 class="media-heading">ท็อปการ์ด</h4> ลักษณะการใช้งานของของท็อปการ์ด </div> 
							<div class="media-right"> 29/05/2560<br/><br/><a href="#">  <i class="fa fa-file-pdf-o fa-2x" style="color:red;"></i></a><a href="#">  &nbsp;&nbsp;<i class="fa fa-download fa-2x" style="color:green;"></i></a> </div> </div>-->

					</div>
				</div>
				

              </div>
            </div>
        </div>
        @endverbatim
    </div>
@stop


@section('footer')
	
    <script src="<?= asset('app/controllers/documentController.js') ?>"></script>
@stop
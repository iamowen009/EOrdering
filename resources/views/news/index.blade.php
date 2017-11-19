@extends('layouts.main')

@section('content')
<div class="content">

	<div class="row ">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel">
			  <!-- style="background-color:#000e85;color:#fff" -->
			  <div class="panel-heading text-center style-title">ข่าวสารและกิจกรรม </div>
              <!--<div class="panel-heading text-center">ข่าวสารและกิจกรรม</div>-->
              <div class="panel-body">
					        <br>
									<div class="row">
										<div class="col-md-6">
											<div class="media">
												<div class="media-left">
													<a href="https://toagroup.com/news-and-events/list">
														<img src="<?php echo asset('images/icon-news-toa.jpg'); ?>">
													</a>
												</div>
												<div class="media-right text-center" style="vertical-align: middle"> <p><a href="https://toagroup.com/news-and-events/list">ข่าวสารและกิจกรรม <br>(www.toagroup.com)</a></p> </div>
											</div>
										</div>
										<div class="col-md-6">
											<a href="{{ url('news/eordering')}}" >
											<div class="media">
												<div class="media-left">
													<img src="<?php echo asset('images/icon-news-eor.jpg'); ?>">
												</div>
												<div class="media-right text-center" style="vertical-align: middle"> <p>ข่าวสารและกิจกรรม <br>(E-ordering)</p> </div>
											</div>
											</a>
										</div>
									</div>
					      </div>
            </div>
        </div>
    </div>
@stop

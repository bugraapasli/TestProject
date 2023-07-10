@extends('base')
@push('content')

        <!-- Start Bottom Header -->
        <div class="page-area" style = "@if($page -> thumbnails)
			@foreach(json_decode($page->thumbnails, true) as $img)
			background: url('uploads/{{$img['fileName']}}') no-repeat center center / 100% 100%;
			@endforeach
			@endif">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcrumb text-center">
                            <div class="section-headline white-headline text-center">
                                <h3>Hizmetlerimiz</h3>
                            </div>
                            <ul>
                                <li class="home-bread">{{ __('translates.ana-sayfa')}}</li>
                                <li>Hizmetlerimiz</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Header -->
               <!-- Start service area -->
        <div class="service-area bg-color area-padding-2">
            <div class="container">
                <div class="row">
                    <div class="all-services">
                    	<!-- single dervices -->
						@foreach($hizmet as $value)
						<div class="col-md-4 col-sm-6 col-xs-12">

							@php
               				 $hizmetSlug = DB::table('p_slug')->where(['id' => $value->slug_id])->first();
           				 	@endphp

							<div class="single-service wow fadeInUp" data-wow-delay="0.3s">
								<div class="service-icon">
									<a class="image-scale">
										@if($value -> thumbnails)
										 @foreach(json_decode($value->thumbnails, true) as $img)
										 @if($img['type'] == 'photo')
										<img src="uploads/{{$img['fileName']}}" alt="">
										@endif
										@endforeach
										@endif
									</a>
								</div>
								<div class="service-inner">
									<div class="service-content">
										<h4>{{$value->name}}</h4>
										<p>{!! $value -> short_description  !!}</p>
                                        <a class="service-btn" href="{{$hizmetSlug -> name}}"><i class="ti-arrow-right"></i></a>
									</div>
								</div>
							</div>

						</div>
						@endforeach
						<!-- single dervices -->

						<!-- single dervices -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End service area -->
       
@endpush
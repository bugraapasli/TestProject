@extends('base')
@push('content')


    <!-- header end -->
    <!-- Start Intro Area -->
    <div class="intro-area">
        <div class="bg-wrapper">

            @foreach($banners as $banner)
            @if($banner -> thumbnails)
            @foreach(json_decode($banner->thumbnails, true) as $img)
            @if($img['type'] == 'photo')
			<img src="uploads/{{$img['fileName']}}" alt="">
			@endif
            @endforeach
            @endif
            @endforeach

        </div>
        <div class="intro-content">
            <div class="slider-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- layer 1 -->
                            <div class="layer-1 wow fadeInUp" data-wow-delay="0.3s">
                                @foreach($banners as $banner)
                                 @if($banner -> thumbnails)
                                @foreach(json_decode($banner->thumbnails, true) as $header)
                                 <h2 class="title2">{{$header['header']}}</h2>

                            </div>
                            <!-- layer 2 -->
                            <div class="layer-2 wow fadeInUp" data-wow-delay="0.5s">
                                <p>{{$header['shortDescription']}}</p>
                            </div>
                            <!-- layer 3 -->
                            <div class="layer-3 wow fadeInUp" data-wow-delay="0.7s">
                                <a href="{{$header['buttonURL']}}" class="ready-btn right-btn">{{$header['buttonText']}}</a>
                            </div>
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Intro Area -->
    <!-- Welcome service area start -->
    <div class="welcome-area fix area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="all-wel-services">
                        <!-- single-well end-->
                        <div class="well-services wow fadeInUp" data-wow-delay="0.3s">
                            <div class="services-img">
                                <a class="big-icon" href="#"><i class="flaticon-052-project-plan"></i></a>
                            </div>
                            <div class="main-wel">
                                <div class="wel-content">
                                    <h4>Innovation idea</h4>
                                    <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet
                                        consectetu.</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                        <!-- single-well end-->
                        <div class="well-services wow fadeInUp" data-wow-delay="0.7s">
                            <div class="services-img">
                                <a class="big-icon" href="#"><i class="flaticon-002-analysis"></i></a>
                            </div>
                            <div class="main-wel">
                                <div class="wel-content">
                                    <h4>Market research</h4>
                                    <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet
                                        consectetu.</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                        <!-- single-well end-->
                        <div class="well-services wow fadeInUp" data-wow-delay="0.5s">
                            <div class="services-img">
                                <a class="big-icon" href="#"><i class="flaticon-060-team-work"></i></a>
                            </div>
                            <div class="main-wel">
                                <div class="wel-content">
                                    <h4>Creative team</h4>
                                    <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet
                                        consectetu.</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                        <!-- single-well end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Welcome service area End -->
    <!-- about-area start -->
    <div class="about-area about-2 fix" style="background: url({{asset('uploads/abtimg.jpg')}})">
        <div class="container-full">
            <div class="row">
                <div class="col-md-5 col-sm-4 col-xs-12">
                    <div class="about-image">

                    </div>
                </div>
                <!-- column end -->
                <div class="col-md-7 col-sm-8 col-xs-12">
                    <div class="support-all about-content">
                        <div class="section-headline right-headline white-headline">
                            <h3> {{__('translates.Technology')}} <span class="color">{{__('translates.more experts')}}</span> {{__('translates.that provides security')}}</h3>
                            <p>The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that
                                many DTP programmes can generate dummy text using the starting sequence "Lorem ipsum".
                                Fortunately, the phrase 'Lorem Ipsum' is now recognized by electronic pre-press systems
                                and, when found, an alarm can be raised.</p>
                        </div>
                        <div class="about-company">
                            <div class="single-about">
                                <span class="about-text">Professional team</span>
                                <span class="about-text">Server secure payments</span>
                                <span class="about-text">Live hat upport</span>
                            </div>
                            <div class="single-about">
                                <span class="about-text">Goal achivment</span>
                                <span class="about-text">Worldwide services company</span>
                                <span class="about-text">Marketing expert policy</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column end -->
            </div>
        </div>
    </div>
    <!-- about-area end -->
    <!-- Start service area -->
    <div class="service-area bg-color area-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>{{__('translates.services')}}</h3>
                        <p>{{__('translates.paragraphForServices')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="all-services">
                    <!-- single dervices -->
                    @foreach($hizmet->take(6) as $value)
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
                                    <h4>{{$value-> name}}</h4>
                                    <p>{!! $value -> short_description  !!}</p>
                                    <a class="service-btn" href="{{$hizmetSlug -> name}}"><i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- End service area -->

    <!-- Start Blog Area-->
    <div class="blog-area area-padding-2" >
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>Blog</h3>
                        <p>Sektörümüz, ürünlerimiz, hizmetlerimiz ve yaptığımız projelerimiz hakkındaki haberlerimizi sizlerle paylaşıyoruz.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-grid home-blog">

                    @foreach($blogs->take(6) as $value)
                   @php
                       $blogSlug = DB::table('p_slug')->where(['id' => $value->slug_id])->first();
                   @endphp
                       <div class="col-md-4 col-sm-6 col-xs-12">
                           <div class="single-blog">
                               <div class="blog-image">
                                   <a class="image-scale" href="{{$blogSlug->name}}">
                                       @if($value -> thumbnails)
                                        @foreach(json_decode($value->thumbnails, true) as $img)
                                        @if($img['type'] == 'photo')
                                       <img src="uploads/{{$img['fileName']}}" alt="">
                                       @endif
                                       @endforeach
                                       @endif
                                   </a>
                               </div>
                               <div class="blog-content">
                                   <a href="{{$blogSlug -> name}}">
                                       <h4>{{$value -> name}}</h4>
                                   </a>
                               </div>
                           </div>
                       </div>
                       @endforeach
                   </div>
            </div>
            <!-- End row -->
        </div>
    </div>
    <!-- End Blog Area-->
    @endpush


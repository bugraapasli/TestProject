@extends('base')
@push('content')


<!-- Start Bottom Header -->
<div class="page-area" style = "@if($blog -> thumbnails)
    @foreach(json_decode($blog->thumbnails, true) as $img)
    @if($img['type'] == 'featured')
    background: url('uploads/{{$img['fileName']}}') no-repeat center center / 100% 100%;
    @endif
    @endforeach
    @endif">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                        <h3>Haber Detayları</h3>
                    </div>
                    <ul>
                        <li>Haber Detayları</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
        <!--Blog Area Start-->
<div class="blog-area fix area-padding">
    <div class="container">
        <div class="row">
            <div class="blog-details">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <!-- single-blog start -->
                    <article class="blog-post-wrapper">
                        <div class="blog-banner">
                            <a href="#" class="blog-images">
                                @if($blog -> thumbnails)
                                @foreach(json_decode($blog->thumbnails, true) as $img)
                                @if($img['type'] == 'photo')
                               <img src="uploads/{{$img['fileName']}}" alt="">
                               @endif
                               @endforeach
                               @endif
                            </a>
                            <div class="blog-content">
                                {{-- <div class="blog-meta">
                                    <span class="admin-type">
                                        <i class="fa fa-user"></i>
                                        {{$blog -> author}}
                                    </span>
                                    <span class="date-type">
                                       <i class="fa fa-calendar"></i>
                                       @php
                                       $month=substr($blog->create_date,5,2);
                                           if ($month==1) {
                                           $smonth="Oca";
                                           }elseif ($month==2) {
                                           $smonth="Şub";
                                           }elseif ($month==3) {
                                           $smonth="Mar";
                                           }elseif ($month==4) {
                                           $smonth="Nis";
                                           }elseif ($month==5) {
                                           $smonth="May";
                                           }elseif ($month==6) {
                                           $smonth="Haz";
                                           }elseif ($month==7) {
                                           $smonth="Tem";
                                           }elseif ($month==8) {
                                           $smonth="Ağu";
                                           }elseif ($month==9) {
                                           $smonth="Eyl";
                                           }elseif ($month==10) {
                                           $smonth="Eki";
                                           }elseif ($month==11) {
                                           $smonth="Kas";
                                           }else{ $smonth="Ara";}

                                     @endphp
                                    {{substr($blog->create_date,8,2)}} {{$smonth}}, {{substr($blog->create_date,0,4)}}
                                    </span>
                                    <span class="comments-type">
                                        <i class="fa fa-comment-o"></i>
                                        07
                                    </span>
                                </div> --}}
                                <h4>{{$blog->name}}</h4>
                                <p> {!! $blog -> content !!} </p>
                                <p>The universal acceptance of Consultation has given a tremendous opportunity for merchants to do crossborder transactions instantly and at reduced cost.Consultations are slowly gaining immense recognition and are growing phenomenally with more..</p>
                            </div>
                        </div>
                    </article>
                    <div class="clear"></div>

                    <div class="clear"></div>
                </div>
                <!-- Start Right Sidebar blog -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="left-head-blog right-side">
                        <div class="left-blog-page">
                            <!-- search option start -->

                            <!-- search option end -->
                        </div>
                        {{-- <div class="left-blog-page">
                            <div class="left-blog blog-category">
                                <h4>Categories</h4>
                                <ul>
                                    @foreach($categories as $category)
                                       <li><a href="#">{{ $category->name }}</a><span>{{ $category->blog_count }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> --}}
                        <div class="left-blog-page">
                            <!-- recent start -->
                            <div class="left-blog">
                                <h4>Son Blog Yazılarımız</h4>
                                <div class="recent-post">
                                    <!-- start single post -->
                                    @foreach($recent as $value)
                                    <div class="recent-single-post">
                                        @php
                                        $blogS = DB::table('p_slug')->where(['id' => $value->slug_id])->first();
                                        @endphp
                                        {{-- <div class="post-img">
                                            <a href="{{$blogS->name}}">
                                            @if($value -> thumbnails)
                                            @foreach(json_decode($value->thumbnails, true) as $imge)
                                               <img src="uploads/{{$imge['fileName']}}" alt="">
                                            @endforeach
                                             @endif
                                            </a>
                                        </div> --}}
                                        <div class="pst-content">
                                            <p><a href="{{$blogS -> name}}">{{$value -> name}}</a></p>
                                            <span class="date-type">
                                                @php
                                       $month=substr($blog->create_date,5,2);
                                           if ($month==1) {
                                           $smonth="Oca";
                                           }elseif ($month==2) {
                                           $smonth="Şub";
                                           }elseif ($month==3) {
                                           $smonth="Mar";
                                           }elseif ($month==4) {
                                           $smonth="Nis";
                                           }elseif ($month==5) {
                                           $smonth="May";
                                           }elseif ($month==6) {
                                           $smonth="Haz";
                                           }elseif ($month==7) {
                                           $smonth="Tem";
                                           }elseif ($month==8) {
                                           $smonth="Ağu";
                                           }elseif ($month==9) {
                                           $smonth="Eyl";
                                           }elseif ($month==10) {
                                           $smonth="Eki";
                                           }elseif ($month==11) {
                                           $smonth="Kas";
                                           }else{ $smonth="Ara";}

                                     @endphp
                                    {{substr($blog->create_date,8,2)}} {{$smonth}}, {{substr($blog->create_date,0,4)}}
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- End single post -->
                                </div>
                            </div>
                            <!-- recent end -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Right Sidebar -->
        </div>
        <!-- End row -->
    </div>
</div>
<!--End of Blog Area-->

@endpush
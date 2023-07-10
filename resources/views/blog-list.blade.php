@extends('base')
@push('content')
<!-- Start Bottom Header -->
 <div class="page-area" style = "@if($page -> thumbnails)
    @foreach(json_decode($page->thumbnails, true) as $img)
    background: url('uploads/{{$img['fileName']}}') no-repeat center center / 100% 100%;
    @endforeach
    @endif" >
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                        <h3>{{$page->name}}</h3>
                    </div>
                    <ul>
                        <li class="home-bread">{{ __('translates.ana-sayfa')}}</li>
                        <li>{{$page->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END Header -->
       <!--Blog Area Start-->
<div class="blog-area fix area-padding-2">
    <div class="container">

        <div class="row">
            <div class="blog-grid home-blog">
             @foreach($blogs as $value)
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
                            <div class="blog-meta">
                                {{-- <span class="admin-type">
                                    <i class="fa fa-user"></i>
                                    {{$value-> author}}
                                </span>
                                <span class="date-type">
                                   <i class="fa fa-calendar"></i>
                                  @php
                                    $month=substr($value->create_date,5,2);
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
                                 {{substr($value->create_date,8,2)}} {{$smonth}}, {{substr($value->create_date,0,4)}}
                                </span>
                                <span class="comments-type">
                                    <i class="fa fa-comment-o"></i>
                                    32
                                </span> --}}
                            </div>
                            <a href="{{$blogSlug -> name}}">
                                <h4>{{$value -> name}}</h4>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- End single blog -->
                {{-- <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-pagination">
                        <ul class="pagination">
                           <li><a href="#">Prev</a></li>
                           <li class="active"><a href="#">1</a></li>
                           <li><a href="#">2</a></li>
                           <li><a href="#">3</a></li>
                           <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- End row -->
    </div>
</div>
<!--End of Blog Area-->
@endpush
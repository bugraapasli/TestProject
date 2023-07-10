@extends('base')
@push('content')

<!-- Start Bottom Header -->
<div class="page-area" style="@if($hizmet -> thumbnails)
    @foreach(json_decode($hizmet->thumbnails, true) as $img)
    @if($img['type'] == 'arkaplan')
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
                        <h3>Hizmet Detayları</h3>
                    </div>
                    <ul>
                        <li class="home-bread">{{ __('translates.ana-sayfa')}}</li>
                        <li>Hizmet Detayları</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<!-- End services Area -->
<div class="single-services-page area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="page-head-left">
                   <!-- strat single area -->
                    <div class="single-page-head">
                        <div class="left-menu">
                            <ul>
                                <li class="active"><a href="#">It Consultancy</a></li>
                                <li><a href="#">It Management</a></li>
                                <li><a href="#">Product Design</a></li>
                                <li><a href="#">Data Security</a></li>
                                <li><a href="#">Cloude Services</a></li>
                                <li><a href="#">It Support Helpdesk</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- strat single area -->
                    <div class="single-page-head">
                        <div class="download-btn">
                            <div class="about-btn">
                                <a href="#" class="down-btn">Download Brochure <i class="fa fa-file-pdf-o"></i></a>
                                <a href="#" class="down-btn apli">Download Application <i class="fa fa-file-word-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- strat single area -->
                    <div class="single-page-head">
                        <div class="clients-testi">
                            <div class="single-review text-center">
                                <div class="review-img ">
                                    <img src="img/services/r1.jpg" alt="">
                                </div>
                                <div class="review-text">
                                    <p>selection consists fully of lower-cased or capital letters text maintains the amount of lines. When replacing a selection.</p>
                                    <h4>Daniyel kreg</h4>
                                    <span class="guest-rev">Clients - <a href="#">Software</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single area -->
                </div>
            </div>
            <!-- End left sidebar -->
            <!-- Start service page -->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                    <!-- single-well start-->
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="single-well mar-well">
                            <a href="#">
                                <h3>{{$hizmet -> name}}</h3>
                            </a>
                            <p>{!! $hizmet -> content !!}</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="single-page mar-well">
                            <div class="page-img elec-page">
                                @if($hizmet -> thumbnails)
                                @foreach(json_decode($hizmet->thumbnails, true) as $img)
                                 @if($img['type'] == 'featured')
                                 <img src="uploads/{{$img['fileName']}}" alt="">
                               @endif
                               @endforeach
                               @endif
                            </div>
                        </div>
                    </div>
                    <!-- End single page -->
                </div>
                <!-- end Row -->

            </div>
        </div>
    </div>
</div>






























@endpush
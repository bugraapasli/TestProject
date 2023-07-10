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
                                <h3>{{__('translates.Contact')}}</h3>
                            </div>
                            <ul>
                                <li class="home-bread">{{__('translates.Home')}}</li>
                                <li>{{__('translates.Contact')}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Header -->
              <!-- Start contact Area -->
        <div class="contact-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="contact-inner">
                        <!-- Start contact icon column -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="contact-icon text-center">
                                <div class="single-icon">
                                    <i class="ti-mobile"></i>
                                    <p>
                                        Telefon: +90 262 644 68 98<br>
                                        <span>Pazartesi-Cuma (08.00-17.00)</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Start contact icon column -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="contact-icon text-center">
                                <div class="single-icon">
                                    <i class="ti-email"></i>
                                    <p>
                                        Email : info@argenova.com.tr<br>
                                        <span>Web: www.argenova.com.tr</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Start contact icon column -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="contact-icon text-center">
                                <div class="single-icon">
                                    <i class="ti-location-pin"></i>
                                    <p>
                                        Location : Dumankaya Horizon, Kordonboyu Mah. Kartal/İstanbul<br>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-6 col-sm-6 col-xs-12">
                         <!-- Start Map -->
                        <div class="map-area" >
                            <div  id="googleMap" > <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193032.01860964525!2d28.870825767517072!3d40.89106645690189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cac344569214e1%3A0x8a4c0486f2dcfbf7!2sArgenova%20Teknoloji%20Kartal%20Ofis!5e0!3m2!1str!2str!4v1687252886996!5m2!1str!2str" width="500" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <!-- End Map -->
                    </div>
                    <!-- Start Left contact -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="contact-form">
                            <div class="row">
                                <form method="POST" action="{{route('mesaj')}}" class="contact-form">
                                    @csrf
                                    <input type="hidden" name="type" value="contact" id="">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name= "name" type="text" id="name" class="form-control" placeholder="Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name = "email" type="email" class="email form-control" id="email" placeholder="Email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input name="subject" type="text" id="msg_subject" class="form-control" placeholder="Subject" required data-error="Please enter your message subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea name= "messages" id="message" rows="7" placeholder="Massage" class="form-control" required data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                        <button type="submit" id="submit" class="add-btn contact-btn">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Left contact -->
                </div>
            </div>
        </div>
        <!-- End Contact Area -->
@endpush
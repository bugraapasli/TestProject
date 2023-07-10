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
                        <h3>Hakkımızda</h3>
                    </div>
                    <ul>
                        <li>Hakkımızda</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->

<!-- Start Service area -->
<div class="overview-area bg-color area-padding">
    <div class="container">
        <div class="row">
            <!-- Start Column -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="overview-wrapper">
                    <h3> ARGENOVA </h3>
                    <p>
                        Hayal ettiğiniz web uygulamalarını detaylı şekilde analiz ediyor, geliştirmek için en güncel
                        teknolojileri kullanıyor, sürdürülebilir ve genişletilebilir yazılım geliştirme hizmetleri
                        sunuyoruz. Agile proje yönetimi ilkeleri ile çalışıyoruz.
                        Mobil cihazların yaşantımızdaki etkisi her geçen gün artıyor. Mobil uygulamalarda geçirilen
                        zaman günde 3 saati bulmuş durumda. Fikirlerinizi IOS yada Android gibi popüler platformlarda
                        sunmak istiyorsanız yardımcı olmaktan keyif alırız.
                    </p>
                </div>
            </div>
            <!-- Start Column -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="overview-image">
                    <img src="{{asset('assets/app/img/about/vd.jpg')}}" alt="overview">
                </div>
            </div>
            <!-- End Column -->
        </div>
    </div>
</div>
<!-- End Service area -->

@endpush
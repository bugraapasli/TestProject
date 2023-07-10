@extends('panel.base')
@section('title') {{__('common.main-page')}} | Panel @endsection
@php $dashboardActive = 'menu-item-open' @endphp
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{__('common.main-page')}}</h5>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xxl-4">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="font-weight-bolder text-dark">{{__('panel.home.recent-activities')}}</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">{{__('panel.home.activities-of-today')}}</span>
                                </h3>
                            </div>
                            <div class="card-body pt-4">
                                <div class="timeline timeline-6 mt-3">
                                    @foreach($logs as $log)
                                        @php $log->user_id != -1 ? $username = DB::table('p_users')->where('id', $log->user_id)->first()->name : $username = "Argenova Teknoloji" @endphp
                                        @if (session('panelUserName') == $username)
                                        <div class="timeline-item align-items-start">
                                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{date("H:i", strtotime($log->create_date))}}</div>
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-@if(strpos(__($log->text), __('common.added')) !== false)success
                                                                                @elseif(strpos(__($log->text), __('common.edited')) !== false)primary
                                                                                @elseif(strpos(__($log->text), __('common.deleted')) !== false)danger
                                                                                @else{{'info'}}
                                                                                @endif icon-xl">
                                                </i>
                                            </div>
                                            <div class="timeline-content d-flex">
                                                <span class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">{{$username.", ".__($log->text,['value' => $log->value])}}</span>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session('permissions')->{7}->{'read'} == "true")
                    <div class="col-xxl-8 order-2 order-xxl-1">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">{{__('panel.home.recent-messages')}}</span>
                                </h3>
                            </div>
                            <div class="card-body pt-2 pb-0 mt-n3">
                                <div class="tab-content mt-5" id="myTabTables11">
                                    <div class="tab-pane fade show active" id="kt_tab_pane_11_3" role="tabpanel" aria-labelledby="kt_tab_pane_11_3">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <thead>
                                                    <tr>
                                                        <th class="p-0 w-40px"></th>
                                                        <th class="p-0 min-w-200px"></th>
                                                        <th class="p-0 min-w-100px"></th>
                                                        <th class="p-0 min-w-125px"></th>
                                                        <th class="p-0 min-w-110px"></th>
                                                        <th class="p-0 min-w-150px"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($messages as $message)
                                                        @if($message->type != "newsletter")
                                                            @php $m = json_decode($message->content, true) @endphp
                                                            <tr>
                                                                <td class="pl-0 py-4">
                                                                    <div class="symbol symbol-50 symbol-light">
                                                                        <span class="symbol-label">
                                                                            <img src="{{ asset('assets/media/svg/misc/015-telegram.svg') }}" class="h-50 align-self-center" alt="" />
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td class="pl-0">
                                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$m['name']}}</a>
                                                                    <div>
                                                                        <a class="text-muted font-weight-bold text-hover-primary" href="#">{{$message->email}}</a>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right">
                                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">@if($m) {{$m['phone'] ?? '' }} @endif</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <span class="text-muted font-weight-500"></span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <span class="label label-lg label-light-@if($message->type == "contact")success @elseif($message->type == "human-resources")primary @endif label-inline">
                                                                        @if($message->type == "contact")İletişim
                                                                        @elseif($message->type == "human-resources"){{__('panel.home.human-resource')}}
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td class="text-right pr-0">
                                                                    <a href="{{ route('panel.message.browse', ['id' => $message->id]) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                                    <path d="M12.8434797,16 L11.1565203,16 L10.9852159,16.6393167 C10.3352654,19.064965 7.84199997,20.5044524 5.41635172,19.8545019 C2.99070348,19.2045514 1.55121603,16.711286 2.20116652,14.2856378 L3.92086709,7.86762789 C4.57081758,5.44197964 7.06408298,4.00249219 9.48973122,4.65244268 C10.5421727,4.93444352 11.4089671,5.56345262 12,6.38338695 C12.5910329,5.56345262 13.4578273,4.93444352 14.5102688,4.65244268 C16.935917,4.00249219 19.4291824,5.44197964 20.0791329,7.86762789 L21.7988335,14.2856378 C22.448784,16.711286 21.0092965,19.2045514 18.5836483,19.8545019 C16.158,20.5044524 13.6647346,19.064965 13.0147841,16.6393167 L12.8434797,16 Z M17.4563502,18.1051865 C18.9630797,18.1051865 20.1845253,16.8377967 20.1845253,15.2743923 C20.1845253,13.7109878 18.9630797,12.4435981 17.4563502,12.4435981 C15.9496207,12.4435981 14.7281751,13.7109878 14.7281751,15.2743923 C14.7281751,16.8377967 15.9496207,18.1051865 17.4563502,18.1051865 Z M6.54364977,18.1051865 C8.05037928,18.1051865 9.27182488,16.8377967 9.27182488,15.2743923 C9.27182488,13.7109878 8.05037928,12.4435981 6.54364977,12.4435981 C5.03692026,12.4435981 3.81547465,13.7109878 3.81547465,15.2743923 C3.81547465,16.8377967 5.03692026,18.1051865 6.54364977,18.1051865 Z" fill="#000000"/>
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>
        @if(session()->has('icon'))
            Swal.fire({
                position: "center",
                icon: "{{ session('icon') }}",
                title: "{{ session('title') }}",
                showConfirmButton: false,
                timer: 2500
            });
        @endif
    </script>
@endpush

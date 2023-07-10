@extends('panel.base')
@section('title') {{__('panel.message.messages')}} | Panel @endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{__('panel.message.message')}}</h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('panel.root') }}" class="text-muted">{{__('common.main-page')}}</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted">{{__('panel.message.message')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap py-3">
                        <div class="card-title">
                            <h3 class="card-label">{{__('panel.message.messages')}}
                            <span class="d-block text-muted pt-2 font-size-sm">{{__('panel.message.information')}}</span></h3>
                        </div>
                        <div class="card-toolbar">
                        @if(count($allMessages) > 0)
                            <div class="dropdown dropdown-inline mr-2">
                                <a id="exportBut" href="javascript:void(0);" class="btn btn-light-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                        </g>
                                    </svg>
                                </span>{{__('common.form.export')}}</a>
                            </div>
                        @endif
                        </div>
                    </div>
                    <div class="card-body">
                        @if(count($allMessages) > 0)
                            <table class="table table-bordered table-checkable">
                                <thead>
                                    <tr>
                                        <th>{{__('panel.message.email')}}</th>
                                        <th>{{__('panel.message.type')}}</th>
                                        <th>{{__('panel.message.ip')}}</th>
                                        <th>{{__('panel.message.date')}}</th>
                                        <th>{{__('panel.common.operations')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $message)
                                        <tr>
                                            <td data-label="Email">{{ $message->email }}</td>
                                            <td data-label="Tür">
                                                @if($message->type == "newsletter")
                                                {{__('panel.message.bulletin')}}
                                                @elseif($message->type == "contact")
                                                {{__('panel.message.contact-message')}}
                                                @elseif($message->type == "human-resources")
                                                {{__('panel.message.human-resources')}}
                                                @else
                                                {{__('panel.message.other-message')}}
                                                @endif
                                            </td>
                                            <td data-label="IP Adresi">{{ $message->ip_address }}</td>
                                            <td data-label="Tarih">{{ date("d.m.Y H:i", strtotime($message->create_date)) }}</td>
                                            <td data-label="{{__('panel.common.operations')}}">
                                                @if($message->type != "newsletter")
                                                    <a href="{{ route('panel.message.browse', ['id' => $message->id]) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M12.8434797,16 L11.1565203,16 L10.9852159,16.6393167 C10.3352654,19.064965 7.84199997,20.5044524 5.41635172,19.8545019 C2.99070348,19.2045514 1.55121603,16.711286 2.20116652,14.2856378 L3.92086709,7.86762789 C4.57081758,5.44197964 7.06408298,4.00249219 9.48973122,4.65244268 C10.5421727,4.93444352 11.4089671,5.56345262 12,6.38338695 C12.5910329,5.56345262 13.4578273,4.93444352 14.5102688,4.65244268 C16.935917,4.00249219 19.4291824,5.44197964 20.0791329,7.86762789 L21.7988335,14.2856378 C22.448784,16.711286 21.0092965,19.2045514 18.5836483,19.8545019 C16.158,20.5044524 13.6647346,19.064965 13.0147841,16.6393167 L12.8434797,16 Z M17.4563502,18.1051865 C18.9630797,18.1051865 20.1845253,16.8377967 20.1845253,15.2743923 C20.1845253,13.7109878 18.9630797,12.4435981 17.4563502,12.4435981 C15.9496207,12.4435981 14.7281751,13.7109878 14.7281751,15.2743923 C14.7281751,16.8377967 15.9496207,18.1051865 17.4563502,18.1051865 Z M6.54364977,18.1051865 C8.05037928,18.1051865 9.27182488,16.8377967 9.27182488,15.2743923 C9.27182488,13.7109878 8.05037928,12.4435981 6.54364977,12.4435981 C5.03692026,12.4435981 3.81547465,13.7109878 3.81547465,15.2743923 C3.81547465,16.8377967 5.03692026,18.1051865 6.54364977,18.1051865 Z" fill="#000000"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div style="margin-bottom: 0; text-align: center;">
                                <h6 class="top-title">{{__('common.form.record')}}.</h6>
                            </div>
                        @endif
                        @include('panel.pagination', ['items' => $allMessages, 'page' => $_GET['pg'] ?? 1, 'size' => 12])
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

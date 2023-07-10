@extends('panel.base')
@section('title') {{__('panel.team.team')}} | Panel @endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{__('panel.team.team')}}</h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('panel.root') }}" class="text-muted">{{__('common.main-page')}}</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted">{{__('panel.team.team')}}</a>
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
                            <h3 class="card-label">{{__('panel.team.team')}}
                            <span class="d-block text-muted pt-2 font-size-sm">{{__('panel.team.information')}}</span></h3>
                        </div>
                        <div class="card-toolbar">
                            @if(count($allTeam) > 0)
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
                            @if (session('permissions')->{12}->{'write'} == "true")
                            <a href="{{ route('panel.team.add') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>{{__('common.form.new-record')}}</a>
                            @endif
                        </div>
                    </div>
                    <form id="filterForm" method="get" enctype="multipart/form-data" class="card-header form-filter flex-wrap py-3" style="margin-bottom: 0;">
                        <input type="hidden" name="sort">
                        <input type="hidden" name="order">
                        <div class="card-title">
                            <div class="dropdown dropdown-inline mr-2">
                                <input type="text" name="name" class="form-control" placeholder="{{__('panel.team.placeholder.enter-team-name')}}" value="{{ $_GET['name'] ?? '' }}"/>
                            </div>
                            <div class="dropdown dropdown-inline mr-2">
                                <input type="text" name="profession" class="form-control" placeholder="{{__('panel.team.placeholder.enter-team-profession')}}" value="{{ $_GET['profession'] ?? '' }}"/>
                            </div>
                            <div class="dropdown dropdown-inline mr-2">
                                <input type="text" name="date" class="form-control" autocomplete="off" placeholder="{{__('panel.team.placeholder.enter-date')}}" value="{{ $_GET['date'] ?? '' }}"/>
                            </div>
                            <div class="dropdown dropdown-inline mr-2">
                                <button type="submit" class="btn btn-light-primary font-weight-bolder">{{__('common.search')}}</button>
                                @if($_GET)
                                    <button type="button" onclick="location.href = '{{route('panel.team')}}'" class="btn btn-light-warning font-weight-bolder">{{__('common.clean')}}</button>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        @if(count($allTeam) > 0)
                            <table class="table table-bordered table-checkable">
                                <thead>
                                    <tr>
                                        <th><a class="sortButton" href="javascript:void(0);" data-order="{{isset($_GET['order']) && $_GET['order'] ? ($_GET['order'] == 'asc' ? 'desc' : 'asc') : 'asc'}}" style="color:black" data-name="name">{{__('panel.team.name')}}<span class="fas fa-{{isset($_GET['order']) && $_GET['order'] && isset($_GET['sort']) && ($_GET['sort'] == 'name') ? ($_GET['order'] == 'asc' ? 'sort-alpha-down' : 'sort-alpha-up-alt') : 'arrows-alt-v'}}" style="float: right;font-size:20px;"></span></a></th>
                                        <th>{{__('panel.team.profession')}}</th>
                                        <th><a class="sortButton" href="javascript:void(0);" data-order="{{isset($_GET['order']) && $_GET['order'] ? ($_GET['order'] == 'asc' ? 'desc' : 'asc') : 'asc'}}" style="color:black" data-name="create_date">{{__('panel.common.date')}}<span class="fas fa-{{isset($_GET['order']) && $_GET['order'] && isset($_GET['sort']) && ($_GET['sort'] == 'create_date') ? ($_GET['order'] == 'asc' ? 'arrow-down' : 'arrow-up') : 'arrows-alt-v'}}" style="float: right;font-size:20px;"></span></th>
                                        <th>{{__('panel.common.operations')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($team as $person)
                                        <tr id="item{{$person->id}}">
                                            <td data-label="İsim">
                                                <a href="{{ route('panel.team.edit', ['id' => $person->id]) }}" style="color: #3F4254;">
                                                    {!! $person->name !!}
                                                </a>
                                            </td>
                                            <td data-label="Görev">{{$person->profession}}</td>
                                            <td data-label="{{__('panel.common.date')}}">{{date('d.m.Y', strtotime($person->create_date))}}</td>
                                            <td data-label="{{__('panel.common.operations')}}">
                                                <a href="{{ route('panel.team.edit', ['id' => $person->id]) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                                                    <span class="svg-icon svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <a  @if (session('permissions')->{12}->{'write'} == "true") href="javascript:;" onclick="deleteRecord('{{ route('panel.team.action') }}', '{{$person->id}}')"
                                                    class="btn btn-sm btn-clean btn-icon"
                                                    title="Delete"
                                                    @else href="javascript:;" class="mr-2" style="cursor: not-allowed"
                                                    @endif>
                                                    <span class="svg-icon svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <a  @if (session('permissions')->{12}->{'write'} == "true") href="{{ route('panel.thumbnail', ['uid' => $person->id, 'module' => basename(request()->path()), 'lang' => 1]) }}"
                                                    class="btn btn-sm btn-clean btn-icon mr-2"
                                                    title="Fotoğraflar"
                                                    @else href="javascript:;" class="mr-2" style="cursor: not-allowed"
                                                    @endif>
                                                    <span class="svg-icon svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                <path d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z" fill="#000000"/>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
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
                        @include('panel.pagination', ['items' => $allTeam, 'page' => $_GET['pg'] ?? 1, 'size' => 12])
                    </div>
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

        $('.sortButton').on('click', function () {
            $('input[name=sort]').val($(this).data('name'));
            $('input[name=order]').val($(this).data('order'));
            $('#filterForm').submit();
        });
    </script>
@endpush

<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="utf-8" />
        <title>@section('title') @show</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta name="description" content="Panel" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="{{ url()->current() }}"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/global/plugins2.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css?v=').time() }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style2.bundle.css?v=').time() }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favico.png') }}" type="image/x-icon" />
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

        @stack('styles')
        <style>
            select {
                -webkit-appearance: none;
                -moz-appearance: none;
                text-indent: 1px;
                text-overflow: '';
            }
        </style>
	</head>
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<a href="{{ route('panel.root') }}">
				<img alt="Logo" width="150" src="{{ asset('assets/media/logos/argenova-logo.svg') }}" />
			</a>
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_mobile_custom_header">
					<span class="svg-icon svg-icon-xl">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
					</span>
				</button>
			</div>
		</div>
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
					<div class="brand flex-column-auto" id="kt_brand">
						<a href="{{ route('panel.root') }}" class="brand-logo">
							<img alt="Logo" width="150" src="{{ asset('assets/media/logos/argenova-logo.svg') }}" />
						</a>
						<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
							</span>
						</button>
					</div>
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                            <ul class="menu-nav">
								<li class="menu-item {{ $dashboardActive ?? '' }}" aria-haspopup="true">
									<a href="{{ route('panel.root') }}" class="menu-link">
										<span class="svg-icon menu-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"/>
												</g>
											</svg>
										</span>
										<span class="menu-text">{{__('common.main-page')}}</span>
									</a>
								</li>
								@php $modules = DB::table('p_modules')->where('active', true)->orderBy('order_id', 'asc')->get(); @endphp
								@foreach ($modules as $module)
                                    @php $module_id = $module->id @endphp
									@if (session('permissions')->$module_id->{'read'} == "true")
										 @if($module_id == 10)	{{-- Ceviriler --}}
											@if(session('panelUserId') == -1) 	{{-- Cevirileri sadece info@argenova.com.tr hesabı görebilir.--}}
												<li class="menu-item {{ strpos(url()->full(), route('panel.root').$module->url) !== false ? 'menu-item-active' : '' }}" aria-haspopup="true">
													<a href="{{ route('panel.root').$module->url }}" class="menu-link">
														<span class="svg-icon menu-icon">
															{!! $module->svg !!}
														</span>
														<span class="menu-text"> @if(App::isLocale('tr')) {!!$module->name_tr!!} @else {!!$module->name_en!!} @endif</span>
													</a>
												</li>
											@endif
										@else
											<li class="menu-item {{ strpos(url()->full(), route('panel.root').$module->url) !== false ? 'menu-item-active' : '' }}" aria-haspopup="true">
												<a href="{{ route('panel.root').$module->url }}" class="menu-link">
													<span class="svg-icon menu-icon">
														{!! $module->svg !!}
													</span>
													<span class="menu-text"> @if(App::isLocale('tr')) {!!$module->name_tr!!} @else {!!$module->name_en!!} @endif</span>
												</a>
											</li>
										@endif
                                    @endif
								@endforeach
                                @if (session('permissions')->{-1}->{'read'} == "true")
								<li class="menu-item menu-item-submenu {{ $settingsToggle ?? '' }}" aria-haspopup="true">
									<a href="#" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
												</g>
											</svg>
                                        </span>
										<span class="menu-text">{{__('panel.base.management')}}</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">{{__('panel.base.management')}}</span>
												</span>
											</li>
											<li class="menu-item {{ $userToggle ?? '' }}" aria-haspopup="true">
												<a href="{{ route('panel.users') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">{{__('panel.base.users')}}</span>
												</a>
											</li>
                                            <li class="menu-item {{ $permsToggle ?? '' }}" aria-haspopup="true">
												<a href="{{ route('panel.permission') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">{{__('panel.base.permissions')}}</span>
												</a>
											</li>
											<li class="menu-item {{ $logToggle ?? '' }}" aria-haspopup="true">
												<a href="{{ route('panel.log') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">{{__('panel.base.activities')}}</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
                                @endif
                            </ul>
						</div>
					</div>
				</div>
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<div id="kt_header" class="header header-fixed">
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper"></div>
							<div class="topbar">
								<div class="topbar-item">
									<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
										<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">{{__('panel.base.hi')}},</span>
										<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ session('panelUserName') }}</span>
										<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
											@php
												$user = DB::table('p_users')->where(['id' => session('panelUserId'),'deleted' => 0])->first();
											@endphp
                                            @if($user)
                                                @if($user->thumbnails)
                                                    <img src="{{asset('uploads/'.$user->thumbnails)}}" alt="" style="width: 35px; height: 35px; object-fit: cover; border-radius: 0.42rem">
                                                @else
                                                    <span class="symbol-label font-size-h5 font-weight-bold">{{ session('panelUserName')[0] }}</span>
                                                @endif
                                            @else
                                                <span class="symbol-label font-size-h5 font-weight-bold">{{ session('panelUserName')[0] }}</span>
                                            @endif
                                        </span>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @section('content') @show
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">{{date('Y')}}©</span>
								<a href="https://www.argenova.com.tr" target="_blank" class="text-dark-75 text-hover-primary">Argenova - Version 5.3</a>
							</div>
							<div class="nav nav-dark">
								<a href="https://www.argenova.com.tr/" target="_blank" class="nav-link pl-0 pr-5">{{__('panel.base.about')}}</a>
								<a href="https://www.argenova.com.tr/ekibimiz" target="_blank" class="nav-link pl-0 pr-5">{{__('panel.base.our-team')}}</a>
								<a href="https://www.argenova.com.tr/iletisim" target="_blank" class="nav-link pl-0 pr-0">{{__('panel.base.contact')}}</a>
							</div>
                            <div>
                                <select class="text-foot" name="selectedId" id="language" style="color:white;background-color: #3699FF;border-color: #3699FF;border-radius: 5px;padding: 10px;font-size:1rem;">
                                    <option id="selectedId" value="tr" @if(App::getLocale() == 'tr') selected @endif>
                                        {{__('panel.base.turkish')}}
                                    </option>
                                    <option id="selectedId" value="en" @if(App::getLocale() == 'en') selected @endif>
                                        {{__('panel.base.english')}}
                                    </option>
                                </select>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
				<h3 class="font-weight-bold m-0">{{__('panel.base.profile')}}
				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div>
			<div class="offcanvas-content pr-5 mr-n5">
				<div class="d-flex align-items-center mt-5">
					<div class="symbol symbol-100 mr-5">
                    @if($user)
                        @if($user->thumbnails)
                            <img src="{{asset('uploads/'.$user->thumbnails)}}" alt="" style="width: 100px; height: 100px; object-fit: cover;">
                            {{-- <div class="symbol-label" style="background-image:url({{asset('uploads/'.$user->thumbnails)}}"></div> --}}
                        @else
                            <div class="symbol-label" style="background-image:url({{ asset('assets/media/users/user-logo.png') }}"></div>
                        @endif
                    @else
                        <div class="symbol-label" style="background-image:url({{ asset('assets/media/users/user-logo.png') }}"></div>
                    @endif
                        <i class="symbol-badge bg-success"></i>
					</div>
					<div class="d-flex flex-column">
						<a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ session('panelUserName') }}</a>
						<div class="navi mt-2">
							<a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
										</span>
									</span>
									<span class="navi-text text-muted text-hover-primary">{{ session('panelUserEmail')}}</span>
								</span>
							</a>
							<a href="{{ route('panel.logout') }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">{{__('panel.base.exit')}}</a>
						</div>
					</div>
				</div>
				<div class="separator separator-dashed mt-8 mb-5"></div>
				<div class="navi navi-spacer-x-0 p-0">
					<a href="{{ route('panel.users') }}" class="navi-item">
						<div class="navi-link">
							<div class="symbol symbol-40 bg-light mr-3">
								<div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-success">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
												<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
											</g>
										</svg>
									</span>
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold">{{__('panel.base.my-profile')}}</div>
								<div class="text-muted">{{__('panel.base.profile-settings')}}</div>
							</div>
						</div>
					</a>
					<a href="{{route('panel.log')}}" class="navi-item">
						<div class="navi-link">
							<div class="symbol symbol-40 bg-light mr-3">
								<div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-danger">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg>
									</span>
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold">{{__('panel.base.activities')}}</div>
								<div class="text-muted">{{__('panel.base.activities-notification')}}</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
			</span>
		</div>
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/custom.js?v=' . time()) }}"></script>
		<script>
			$('#kt_mobile_custom_header').on('click', function(e){
				$('#kt_quick_user_toggle').trigger('click');
			});
            $('#language').on('change', function (e) {
                var lang = $('select[name=selectedId] option').filter(':selected').val();
                if(lang == 'tr'){
                    location.href = '{{route('panel.change.lang',['lang' =>'tr'])}}';
                } else {
                    location.href = '{{route('panel.change.lang',['lang' =>'en'])}}';
                }
            });
		</script>
        <script src="https://unpkg.com/imask"></script>
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
		@stack('scripts')
	</body>
</html>

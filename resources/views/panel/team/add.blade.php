@extends('panel.base')
@section('title') {{__('panel.team.add-team')}} | Panel @endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">{{__('panel.team.add-team')}}</h5>
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('panel.root') }}" class="text-muted">{{__('common.main-page')}}</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('panel.team') }}" class="text-muted">{{__('panel.team.team')}}</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted">{{__('panel.team.add-team')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b example example-compact">
                <form class="form" action="{{ route('panel.team.action') }}" method="post">
                    @csrf
                    <input type="hidden" name="type" value="add">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">{{__('panel.team.name-surname')}}:</label>
                            <div class="col-lg-5">
                                <input type="text" name="name" class="form-control" placeholder="{{__('panel.team.placeholder.enter-name-surname')}}"
                                    value="{{ old('name') }}" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">{{__('panel.team.profession')}}:</label>
                            <div class="col-lg-5">
                                <input type="text" name="profession" class="form-control" placeholder="{{__('panel.team.placeholder.enter-profession')}}"
                                    value="{{ old('profession') }}" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">{{__('panel.common.order-no')}}:</label>
                            <div class="col-lg-5">
                                <input type="number" name="orderId" class="form-control" placeholder="{{__('panel.common.placeholder.enter-order-no')}}" value="{{ old('orderId') }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">{{__('panel.common.content')}}:</label>
                            <div class="col-lg-5">
                                <textarea type="text" class="form-control" name="content">{{ old('content') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">SEO Title:</label>
                            <div class="col-lg-5">
                                <input type="text" name="seoTitle" class="form-control" placeholder="{{__('panel.common.placeholder.enter-seo-title')}}"
                                    value="{{ old('seoTitle') }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">SEO Description:</label>
                            <div class="col-lg-5">
                                <input type="text" name="seoDescription" class="form-control" placeholder="{{__('panel.common.placeholder.enter-seo-description')}}"
                                    value="{{ old('seoDescription') }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">SEO Keywords:</label>
                            <div class="col-lg-5">
                                <input type="text" name="keywords" class="form-control keywords" placeholder="{{__('panel.common.placeholder.enter-seo-keywords')}}">
                                <div class="mt-3 text-muted">
                                    {{__('panel.common.seo-keywords-information')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-5">
                                <button type="submit" class="btn btn-success mr-2">{{__('common.form.submit')}}</button>
                                <a href="{{route('panel.team')}}" class="btn btn-secondary">{{__('common.form.back')}}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
    <script>
        jQuery(document).ready(function() {
            new Tagify(document.querySelector('.keywords'));
        });
    </script>
@endpush

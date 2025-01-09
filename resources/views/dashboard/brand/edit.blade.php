@extends('dashboard.master')
@section('title', __('dashboard.edit'))

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-9 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.brands') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.brands.index') }}">
                                        {{ __('dashboard.brands') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="">
                                        {{ __('dashboard.edit') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                @include('dashboard.includes.button-header')
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-md-11">
                    <div class="content-body">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-colored-form-control">
                                    {{ __('dashboard.brands') }}
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    {{-- alert --}}
                                    @include('dashboard.includes.validations-errors')

                                    {{-- <p class="card-text">{{ __('dashboard.form_edit') }}.</p> --}}

                                    <form class="form" action="{{ route('dashboard.brands.update',$brand->id)}}" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input name='id'type="hidden"  value="{{ $brand->id }}">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('dashboard.name_en') }}</label>
                                                <input type="text" value={{ $brand->getTranslation('name', 'en') }} class="form-control"
                                                    placeholder="{{ __('dashboard.name_en') }}" name="name[en]">
                                            </div>
                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('dashboard.name_ar') }}</label>
                                                <input type="text" value={{ $brand->getTranslation('name', 'ar') }} class="form-control"
                                                    placeholder="{{ __('dashboard.name_ar') }}" name="name[ar]">
                                            </div>
                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('dashboard.logo') }}</label>
                                                <div class="mb-2">
                                                    @if($brand->logo)
                                                        <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}"
                                                             class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                                    @else
                                                        <p>{{ __('dashboard.no_logo_uploaded') }}</p>
                                                    @endif
                                                </div>
                                                <input type="file" class="form-control " id="single-image-edit" name="logo" placeholder="{{ __('dashboard.logo') }}">
                                            </div>



                                            <div class="form-group">
                                                <label>{{ __('dashboard.status') }}</label>
                                                <div class="input-group">
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" value="1"  name="status" class="custom-control-input"
                                                            id="yes1" @checked($brand->status == 1)>
                                                        <label class="custom-control-label" for="yes1">{{ __('dashboard.active') }}</label>
                                                    </div>
                                                    <div class="d-inline-block custom-control custom-radio">
                                                        <input type="radio" value="0"  @checked($brand->status == 0) name="status" class="custom-control-input"
                                                            id="no1">
                                                        <label class="custom-control-label" for="no1">{{ __('dashboard.inactive') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions left">
                                            <a href="{{ url()->previous() }}" type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> {{ __('dashboard.cancel') }}
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> {{ __('dashboard.edit') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
<script>
    var lang = "{{ app()->getLocale() }}";
    $(function() {
         $('#single-image-edit').fileinput({
             theme: 'fa5',
             language:lang,
             allowedFileTypes: ['image'],
             maxFileCount: 1,
             enableResumableUpload: false,
             showUpload: false,
             initialPreviewAsData: true,
            initialPreview: [
                        "{{ asset($brand->logo) }}",
            ],


         });

     });
</script>

@endpush


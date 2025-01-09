{{-- @extends('dashboard.master')
@section('title', __('dashboard.create_category')) --}}

{{-- @section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-9 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.categories') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">
                                        {{ __('dashboard.categories') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="">
                                        {{ __('dashboard.create_category') }}</a>
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
                                    {{ __('dashboard.categories') }}
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

                                    @include('dashboard.includes.validations-errors')


                                    <form class="form" action="{{ route('dashboard.categories.store')}}" method="POST" >
                                        @csrf

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('dashboard.name_en') }}</label>
                                                <input type="text" value="{{ old('name[en]')}}" class="form-control"
                                                    placeholder="{{ __('dashboard.name_en') }}" name="name[en]">
                                            </div>
                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('dashboard.name_ar') }}</label>
                                                <input type="text" value="{{ old('name[ar]')}}" class="form-control"
                                                    placeholder="{{ __('dashboard.name_ar') }}" name="name[ar]">
                                            </div>
                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('dashboard.select_Parent') }}</label>
                                                <select name="parent" class="form-control">
                                                    <option value="">{{ __('dashboard.select_Parent') }}</option>
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->id }}" >{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label>{{ __('dashboard.status') }}</label>
                                                <div class="input-group">
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" value="1"  name="status" class="custom-control-input"
                                                            id="yes1">
                                                        <label class="custom-control-label" for="yes1">{{ __('dashboard.active') }}</label>
                                                    </div>
                                                    <div class="d-inline-block custom-control custom-radio">
                                                        <input type="radio" value="0"  name="status" class="custom-control-input"
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
                                                <i class="la la-check-square-o"></i> {{ __('dashboard.save') }}
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

@endsection --}}


<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="createBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard.create_brand') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @include('dashboard.includes.validations-errors')
            <form class="form" action="{{ route('dashboard.brands.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="form-body">
                    <div class="form-group">
                        <label for="eventRegInput1">{{ __('dashboard.name_en') }}</label>
                        <input type="text" value="{{ old('name[en]')}}" class="form-control"
                            placeholder="{{ __('dashboard.name_en') }}" name="name[en]">
                    </div>
                    <div class="form-group">
                        <label for="eventRegInput1">{{ __('dashboard.name_ar') }}</label>
                        <input type="text" value="{{ old('name[ar]')}}" class="form-control"
                            placeholder="{{ __('dashboard.name_ar') }}" name="name[ar]">
                    </div>
                    <div class="form-group">
                        <label for="eventRegInput1">{{ __('dashboard.logo') }}</label>
                       <input type="file" class="form-control single-image" name="logo" id="single-image"  placeholder="{{ __('dashboard.logo') }}">
                    </div>


                    <div class="form-group">
                        <label>{{ __('dashboard.status') }}</label>
                        <div class="input-group">
                            <div class="d-inline-block custom-control custom-radio mr-1">
                                <input type="radio" value="1"  name="status" class="custom-control-input"
                                    id="yes1">
                                <label class="custom-control-label" for="yes1">{{ __('dashboard.active') }}</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                                <input type="radio" value="0"  name="status" class="custom-control-input"
                                    id="no1">
                                <label class="custom-control-label" for="no1">{{ __('dashboard.inactive') }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
                  <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>




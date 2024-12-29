@extends('dashboard.master')
@section('title')
    {{ __('dashboard.shipping') }}
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Countries Table</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.countries.index') }}">{{ __('dashboard.countries') }} &
                                        {{ __('dashboard.shipping') }}</a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
                @include('dashboard.includes.button-header')
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">{{ __('dashboard.countries') }} </h4>
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
                            @include('dashboard.includes.tostar-success')
                            @include('dashboard.includes.tostar-error')

                            <form action="{{route('dashboard.countries.index') }}" method="GET">

                                <div class="row">
                                    <div class="col-md-3">
                                        <input name="keyword" type="text" class="form-control"
                                            placeholder="{{ __('dashboard.search') }}">
                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary"
                                            id="search">{{ __('dashboard.search') }}</button>
                                    </div>

                                </div><br>
                            </form>

                            <div id="table_live">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('dashboard.name') }}</th>
                                            <th scope="col">{{ __('dashboard.phone_code') }} </th>
                                            <th scope="col">{{ __('dashboard.num_of_governorates') }} </th>
                                            <th scope="col">{{ __('dashboard.num_of_users') }} </th>
                                            <th scope="col">{{ __('dashboard.status') }} </th>
                                            <th scope="col">{{ __('dashboard.status_management') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($countries as $country)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <a
                                                        href="{{ route('dashboard.countries.governorates.index', $country->id) }}">{{ $country->name }}</a>
                                                    <i class="flag-icon flag-icon-{{ $country->flag_code }}"></i>
                                                </td>
                                                <td>
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input disabled type="text" class="form-control" id="iconLeft"
                                                            value="{{ $country->phone_code }}">
                                                        <div class="form-control-position">
                                                            <i class="ft-phone-call primary"></i>
                                                        </div>
                                                    </fieldset>
                                                </td>
                                                <td>
                                                    <div class="badge badge-pill badge-border border-success success">
                                                        {{ $country->governorates->count() }}</div>
                                                </td>
                                                <td>
                                                    <div class="badge badge-pill badge-border border-primary success lg">
                                                        {{ $country->users->count() }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <div id="status_{{ $country->id }}"
                                                        class="badge badge-pill badge-border border-info success lg">
                                                        {{ $country->is_active }}</div>
                                                </td>

                                                <td>


                                                    {{-- <input type="checkbox" name="is_active" class="switch change_status"
                                                        country-id={{ $country->id }} id="switch5"
                                                        @if ($country->is_active == 'Active' || $country->is_active == 'مفعل') checked @endif
                                                        data-group-cls="btn-group-sm" /> --}}

                                                        <a href="{{ route('dashboard.countries.status',$country->id) }}"
                                                            class="btn btn-{{ $country->is_active == 'Active' || $country->is_active == 'مفعل'? 'dark' : 'warning' }}">
                                                            {{ $country->is_active == 'Active' || $country->is_active == 'مفعل' ?  __('dashboard.inactive')  :  __('dashboard.active') }}
                                                        </a>


                                                </td>
                                            </tr>

                                        @empty
                                            <td colspan="4"> No Data</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $countries->appends(request()->input())->links() }}
                                {{-- {{ $countries->links() }} --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/dashboard') }}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard') }}/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('assets/dashboard') }}/js/scripts/tables/components/table-components.js" type="text/javascript">
    </script>
    {{-- <script>
        $(document).on('change', '.change_status', function() {

            var id = $(this).attr('country-id');
            var url = "{{ route('dashboard.countries.status',':id') }}";
            url = url.replace(':id', id);
            console.log(url);
            $.ajax({
                url: url,
                type: 'GET',

                success: function(response) {
                    if (response.status == 'success') {

                        $('.tostar_success').text(response.message);
                        $('.tostar_success').show();

                        // change status
                        $('#status_' + response.data.id).empty();
                        $('#status_' + response.data.id).text(response.data.is_active);

                    } else {
                        $('#tostar_error').show();
                        $('#tostar_error').text(data.message);
                    }
                    setTimeout(function() {
                        $('.tostar_success').hide();
                    }, 5000);

                }

            });
        });
    </script> --}}
@endpush

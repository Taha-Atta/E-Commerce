@extends('dashboard.master')
@section('title')
   {{ __('dashboard.shipping') }}
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.governorates_table') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.countries.index') }}">
                                        {{ __('dashboard.countries') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="">{{ __('dashboard.governorates') }} &
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
                        <h4 class="card-title" id="basic-layout-colored-form-control">{{ __('dashboard.governorates') }}
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
                            @include('dashboard.includes.tostar-success')
                            @include('dashboard.includes.tostar-error')

                            <form action="{{ url()->current() }}" method="GET">

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
                                            <th scope="col">{{ __('dashboard.country') }} </th>
                                            <th scope="col">{{ __('dashboard.num_of_cities') }} </th>
                                            <th scope="col">{{ __('dashboard.num_of_users') }} </th>
                                            <th scope="col">{{ __('dashboard.status') }} </th>
                                            <th scope="col">{{ __('dashboard.status_management') }} </th>
                                            <th scope="col">{{ __('dashboard.shipping_price') }} </th>
                                            <th scope="col">{{ __('dashboard.change_price') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($governorates as $gov)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $gov->name }}</td>
                                                <td>{{ $gov->country->name }} <i
                                                         class="flag-icon flag-icon-{{ $gov->country->flag_code }}"></i>
                                                </td>

                                                <td>
                                                    <div class="badge badge-pill badge-border border-success success">
                                                        {{ $gov->cities->count() }}</div>
                                                </td>
                                                <td>
                                                    <div class="badge badge-pill badge-border border-primary success lg">
                                                        {{ $gov->users->count() }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <div id="status_{{ $gov->id }}"
                                                        class="badge badge-pill badge-border border-info success lg">
                                                        {{ $gov->is_active }}</div>
                                                </td>

                                                <td>
                                                    {{-- <input type="checkbox" class="switch change_status"
                                                        gov-id={{ $gov->id }} id="switch5"
                                                        @if ($gov->is_active == 'Active' || $gov->is_active == 'مفعل') checked @endif
                                                        data-group-cls="btn-group-sm" /> --}}
                                                        <a href="{{ route('dashboard.governorates.status',$gov->id) }}"
                                                            class="btn btn-{{ $gov->is_active == 'Active' || $gov->is_active == 'مفعل'? 'dark' : 'warning' }}">
                                                            {{ $gov->is_active == 'Active' || $gov->is_active == 'مفعل' ?  __('dashboard.inactive')  :  __('dashboard.active') }}
                                                        </a>
                                                </td>

                                                <td>
                                                    <div id="price_{{ $gov->id }}" class="">
                                                        {{ $gov->shippingPrice->price }} </div>
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#change_price_{{ $gov->id }}">
                                                        {{ __('dashboard.change_price') }}
                                                    </button>
                                                </td>


                                            </tr>


                                            {{--  change shipping price modal  --}}
                                            @include('dashboard.world.charge')

                                        @empty
                                            <td colspan="4"> No Data</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $governorates->links() }}

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

    {{-- change status --}}
    <script>
        $(document).on('change', '.change_status', function() {

            var id = $(this).attr('gov-id');
            var url = "{{ route('dashboard.governorates.status', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',

                success: function(response) {
                    if (response.status == 'success') {

                        $('.tostar_success').text(response.message).show();

                        // change status
                        $('#status_' + response.data.id).empty();
                        $('#status_' + response.data.id).text(response.data.is_active);

                    } else {
                        $('.tostar_error').show();
                        $('.tostar_error').text(response.data.message);
                    }
                    setTimeout(function() {
                        $('.tostar_success').hide();
                    }, 5000);

                }

            });
        });
    </script>

    {{-- update shipping price --}}
    {{-- <script>
        $(document).on('submit', '.update_shipping_price', function(e) {
            e.preventDefault();

            var data = new FormData($(this)[0]);
            var gov_id = $(this).attr('gov-id');

            $.ajax({
                url: "{{ route('dashboard.governorates.shipping-price') }}",
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 'success') {

                        $('.tostar_success').text(response.message).show();

                        // change price
                        $('#price_' + response.data.id).empty();
                        $('#price_' + response.data.id).text(response.data.shipping_price.price);

                    }

                },

                error: function(data) {
                    var response = $.parseJSON(data.responseText);
                    $('#errors_'+gov_id).text(response.errors.price).show();
                },


            });
        });
    </script> --}}
@endpush

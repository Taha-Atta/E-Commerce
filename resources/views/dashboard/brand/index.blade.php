@extends('dashboard.master')
@section('title')
    {{ __('dashboard.brands') }}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
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
                                    {{-- <a href="{{ route('dashboard.brands.create') }}"
                                        class="btn btn-outline-success ">{{ __('dashboard.create_brand') }}</a> --}}

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createBrandModal">
                                            {{ __('dashboard.create_brand') }}
                                          </button>
                                          {{-- model --}}
                                          @include('dashboard.brand.create')



                                    {{-- <p class="card-text">{{ __('dashboard.table_yajra_paragraph') }}.</p> --}}
                                    <table id="yajra_table" class="table table-striped table-bordered language-file">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('dashboard.name') }}</th>
                                                <th>{{ __('dashboard.logo') }}</th>
                                                <th>{{ __('dashboard.status') }}</th>
                                                <th>{{ __('dashboard.products_count') }}</th>
                                                <th>{{ __('dashboard.created_at') }}</th>
                                                <th>{{ __('dashboard.actions') }}</th>
                                            </tr>
                                        </thead>

                                        <body>
                                            {{-- empty --}}
                                        </body>

                                    </table>

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

@if ($errors->any())
<script>
    $('#createBrandModal').modal('show');
</script>

@endif
    <script>
        var lang = "{{ app()->getLocale() }}";
        $('#yajra_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('dashboard.brands.all') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,

                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'logo',
                    name: 'logo'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'products_count',
                    name: 'products_count'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    searchable: false,
                    orderable: false,
                },
            ],
            layout: {
                topStart: {
                    buttons: [
                        'print', 'colvis', 'pdf'
                    ]
                }
            },
            language: lang === 'ar' ? {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json' // Correct plugin version
            } : {}, // Default to English or no translation
        });
    </script>
@endpush

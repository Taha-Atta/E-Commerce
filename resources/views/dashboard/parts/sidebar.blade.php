<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


        @can('categories')
        <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.categories') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ $categories_count }}</span></a>
            <ul class="menu-content">
              <li class="active"><a class="menu-item" href="{{ route('dashboard.categories.index') }}" data-i18n="nav.dash.ecommerce">{{ __('dashboard.categories') }}</a>
              </li>
              <li><a class="menu-item" href="{{ route('dashboard.categories.create') }}" data-i18n="nav.dash.crypto">{{ __('dashboard.category_create') }}</a>
              </li>

            </ul>
          </li>
        @endcan

        @can('brands')
        <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.brands') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ $brands_count }}</span></a>
            <ul class="menu-content">
              <li class="active"><a class="menu-item" href="{{ route('dashboard.brands.index') }}" data-i18n="nav.dash.ecommerce">{{ __('dashboard.brands') }}</a>
              </li>
              <li><a class="menu-item" href="{{ route('dashboard.brands.create') }}" data-i18n="nav.dash.crypto">{{ __('dashboard.brand_create') }}</a>
              </li>

            </ul>
          </li>
        @endcan

        @can('roles')
        <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('dashboard.roles') }}</span></a>
            <ul class="menu-content">
              <li>
                  <a class="menu-item" href="{{route('dashboard.roles.create')}}" data-i18n=""> {{ __('dashboard.create_role') }} </a>
              </li>
              <li>
                  <a class="menu-item" href="{{route('dashboard.roles.index')}}" data-i18n="">{{ __('dashboard.roles') }} </a>
              </li>
            </ul>
          </li>
        @endcan

        @can('admins')
        <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('dashboard.admins') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ $admins_count }}</span></a>
            <ul class="menu-content">
              <li>
                  <a class="menu-item" href="{{route('dashboard.admins.create')}}" data-i18n="">{{ __('dashboard.create_admin') }} </a>
              </li>
              <li>
                  <a class="menu-item" href="{{route('dashboard.admins.index')}}" data-i18n="">{{ __('dashboa.admins') }}</a>
              </li>
            </ul>
          </li>
        @endcan
        {{-- @can('global_shipping')
        <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main"> {{ __('dashboard.shippping') }}  </span></a>
            <ul class="menu-content">
              <li>
                  <a class="menu-item" href="{{route('dashboard.countries.index')}}" data-i18n="">{{ __('dashboard.shippping') }}</a>
              </li>

            </ul>
          </li>
        @endcan --}}

        @can('coupons')
        <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.coupons') }}</span><span class="badge badge badge-info badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
              <li class="active"><a class="menu-item" href="{{ route('dashboard.coupons.index') }}" data-i18n="nav.dash.ecommerce">{{ __('dashboard.coupons') }}</a>
              </li>
              {{-- <li><a class="menu-item" href="{{ route('dashboard.brands.create') }}" data-i18n="nav.dash.crypto">{{ __('dashboard.brand_create') }}</a>
              </li> --}}

            </ul>
          </li>
        @endcan

        <li class=" navigation-header">
          <span data-i18n="nav.category.layouts">{{ __('dashboard.system') }}</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Layouts"></i>
        </li>
        {{-- @can('faqs')
        <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.faqs') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ $faqs_count }}</span></a>
            <ul class="menu-content">
              <li class="active"><a class="menu-item" href="{{ route('dashboard.faqs.index') }}" data-i18n="nav.dash.ecommerce">{{ __('dashboard.faqs') }}</a>
              </li>
            </ul>
          </li>
        @endcan --}}

        {{-- @can('settings')
        <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.settings') }}</span></a>
            <ul class="menu-content">
              <li class="active"><a class="menu-item" href="{{ route('dashboard.settings.index') }}" data-i18n="nav.dash.ecommerce">{{ __('dashboard.settings') }}</a>
              </li>
            </ul>
          </li>
        @endcan --}}



        <li class=" navigation-header">
          <span data-i18n="nav.category.ui">User Interface</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="User Interface"></i>
        </li>

      </ul>
    </div>
  </div>

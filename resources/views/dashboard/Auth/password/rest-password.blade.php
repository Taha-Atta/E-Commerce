@extends('dashboard.Auth.master_auth')

@section('title', 'Enter Email')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                            <div class="card-header border-0 pb-0">
                                <div class="card-title text-center">
                                    <img src="{{ asset('assets/dashboard') }}/images/logo/logo-dark.png"
                                        alt="branding logo">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>{{ __('auth.write-password') }}.</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal" action="{{ route('dashboard.new.password') }}"
                                        method="post">
                                        @csrf
                                        <input type="email" hidden name="email" value="{{ $email }}"> 
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password"
                                                class="form-control form-control-lg input-lg" id="password"
                                                placeholder="{{ __('auth.write-password') }}">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password_confirmation"
                                                class="form-control form-control-lg input-lg" id="password"
                                                placeholder="{{ __('auth.write-password-again') }}">
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i
                                                class="ft-unlock"></i> {{ __('auth.submit') }} </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection

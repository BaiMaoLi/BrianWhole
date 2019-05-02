@extends('layouts.auth')

@section('stylesheet')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="max-width:730px;">
            <div class="card">
                <div class="card-header" style="text-align:center;background-color:#64e4b0;height:55px;">
                    <a href="{{route('remittyllc')}}" style="color:blue;float:left;"> &#8592; </a>
                    {{ __('Verify Your Email Address') }}
                    <a href="{{route('login')}}" style="color:blue;float:right;"> &#8594; </a>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

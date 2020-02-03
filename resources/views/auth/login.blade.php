@extends('layouts.master')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop


@section('content')
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('logar') }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Entre com seus dados para acessar o sistema</p>

                @if (isset($msg))
                    <p class="text-danger " style="margin-left: 32%">
                        <strong>{{$msg}}</strong>
                    </p>
                @endif
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control input" value="{{ old('email') }}"
                               placeholder="E-mail" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text input">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control input " placeholder="Senha">
                        <div class="input-group-append">
                            <div class="input-group-text input">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="offset-4 col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                Entrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop

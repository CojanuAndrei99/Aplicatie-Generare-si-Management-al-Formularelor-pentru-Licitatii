@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                            <h1 class="text-white">{{ __('Hai sa incepem!') }}</h1>
                            <h2 class="text-white">{{ __('Mergi si adunati toate informatiile cerute si introdu-le in campurile de mai jos. ') }}</h2>
                            <h2 class="text-white">{{ __('') }}</h2>
                        </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        
                        <form role="form" method="POST" action="{{ route('profile.save_firma') }}">
                            @csrf
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <!--business name-->
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="text-body">
                                    Nume firma:
                                </div>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-briefcase-24"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nume firma') }}" type="text" name="nume_firma" value="{{ old('nume_firma') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--adress-->
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="text-body">
                                    Adresa firma:
                                </div>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-building"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Adresa firma') }}" type="text" name="adresa_firma" value="{{ old('adresa_firma') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--phone number-->
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="text-body">
                                    Telefon firma:
                                </div>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefon firma') }}" type="text" name="telefon" value="{{ old('telefon') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- business email-->
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="text-body">
                                    E-mail firma:
                                </div>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('E-mail firma') }}" type="text" name="email_firma" value="{{ old('email_firma') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--cod fiscal-->
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="text-body">
                                    Cod fiscal:
                                </div>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Cod fiscal') }}" type="number" name="cod_fiscal" value="{{ old('cod_fiscal') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--nr inreg-->
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="text-body">
                                    Numar de inregistrare:
                                </div>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-paper-diploma"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Numar de inregistrare') }}" type="number" name="numar_inregistrare" value="{{ old('numar_inregistrare') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--data inreg-->
                            <div class="form-group{{ $errors->has('data_inregistrare') ? ' has-danger' : '' }}">
                                <div class="text-body">
                                    Data de inregistrare:
                                </div>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="data_inregistrare" type="date" name="data_inregistrare" value="{{ old('data_inregistrare') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--incadrare legala-->
                            <div class="form-group{{ $errors->has('incadrare_legala') ? ' has-danger' : '' }}">
                                <div class="text-body">
                                    Incadrare legala:
                                </div>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-archive-2"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Incadrare legala') }}" type="text" name="incadrare_legala" value="{{ old('incadrare_legala') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--Nume Administrator firma-->
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="text-body">
                                    Nume administrator:
                                </div>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nume administrator') }}" type="text" name="nume_administrator" value="{{ old('nume_administrator') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--Cifra de afaceri in ultimii 3 ani-->
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="text-body">
                                    Cifrele de afaceri din ultimii 3 ani:
                                </div>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                                    
                                    <input class="border-right form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  placeholder="{{ __('An precedent') }}" type="number" name="cf_1" value="{{ old('cf_1') }}" required autofocus>
                                    <input class="pl-1 border-right form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Cu 2 ani in urma') }}" type="number" name="cf_2" value="{{ old('cf_2') }}" required autofocus>
                                    <input class="pl-1 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Cu 3 ani in urma') }}" type="number" name="cf_3" value="{{ old('cf_3') }}" required autofocus>
                                    </div>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row my-4">
                                <div class="col-12">
                                    <span class="text-muted">{{ __('*daca nu aveti firma deschisa de 3 ani introduceti cele mai recente cifre si 0 ptr ceilalti ani .') }}</span>
                                        
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="dublaVerificare" id="dublaVerificare" type="checkbox">
                                        <label class="custom-control-label" for="dublaVerificare">
                                            <span class="text-muted">{{ __('Am verificat, inca o data, ca datele introduse sunt corecte.') }}</span>
                                        </label>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="termeniConditii" id="termeniConditii" type="checkbox">
                                        <label class="custom-control-label" for="termeniConditii">
                                            <span class="text-muted">{{ __('Sunt de acord cu ') }} <a href="#!">{{ __('Termenii si Conditiile') }}</a></span>
                                        </label>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Salveaza datele') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

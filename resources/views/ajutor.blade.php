@extends('layouts.app', ['title' => __('User Profile')])
@section('navtitle')
 User
@endsection
@section('content')
    @include('users.partials.header', [
        'title' => __('Buna ziua,') . ' '. auth()->user()->name.'!',
        'description' => __('Aici puteti afla cum functioneaza aplicatia.'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row ">
            
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Ajutor') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <div class=" ">
                                <div class="text-black">{{ __('Bine ai venit pe AutoFormular.') }}</div>
                                <div class="text-black">{{ __('Pentru a adauga o licitatie trebuie sa incarcati fisa de date. Dupa acest pas puteti genera formularele necesare.') }}</div>
                                <div class="text-black">{{ __('Pentru o acuratete maxima trebuie sa aveti date firmai corecte. Daca trebuie sa le modificati, puteti face asta apasand pe numele domneavoastra din dreapta sus.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection

@extends('layouts.app', ['title' => __('User Profile')])
@section('navtitle')
 User
@endsection
@section('content')
    @include('users.partials.header', [
        'title' => __('Buna ziua,') . ' '. auth()->user()->name.'!',
        'description' => __('In caz ca gasiti vreo problema o puteti raporta.'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row ">
            
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Date de contact') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class=" ">
                            <div class="text-black">{{ __('Daca ati observat vreo problema in functionarea aplicatiei sau doriti sa propuneti noi facilitati o puteti face scriindu-mi un email la adresa:') }}</div>
                            <br>
                            <div class="text-black">{{ __('contact@andreicojanu.ro') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection

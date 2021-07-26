@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => __(ucwords(auth()->user()->name)).(', ne bucuram ca v-ati alaturat aplicatiei!') ,
    'description' => __('De acum va putem punem la dispozitie toate functionalitatiile.'),
    'class' => 'col-lg-7'
])   
    <div class="container-fluid mt--7">
        
        <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
        </div>
        <div class=" mt-5">
            <div class="mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                 <h3 class="mb-0">Licitatii</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nume licitatie</th>
                                    <th scope="col">Beneficiar</th>
                                    <th scope="col">Adresa</th>
                                    <th scope="col">Informatii de contact</th>
                                    <th scope="col">Detalii</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($licitatii as $licitatie)
                                    
                                    <tr>
                                        <td scope="row">
                                            {{$licitatie->nume_personalizat}}
                                        </td>
                                        <td>
                                            {{$licitatie->beneficiar}}
                                        </td>
                                        <td>
                                            {{$licitatie->adresa}},{{$licitatie->localitate}},{{$licitatie->tara}}
                                        </td>
                                        <td>
                                            {{$licitatie->email}}, {{$licitatie->persoana_contact}}, {{$licitatie->telefon}}
                                        </td>
                                        <td>
                                            <form  method="get" action="{{route('vezi_detalii')}}">
                                                @csrf
                                                <input type="hidden" id="id_lic" name="id_lic" value="{{$licitatie->id}}">
                                                <button type="submit" class="btn btn-info p-1">{{ __('Vezi detalii') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @if ($loop->index == 4)
                                        @break
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-5">
            <div class="mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                 <h3 class="mb-0">Imputerniciti</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nume imputernicit</th>
                                    <th scope="col">E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($imps as $row)
                                    <tr>
                                        <td scope="row">
                                            {{$row->name}}
                                        </td>
                                        <td>
                                            {{$row->email}}
                                        </td>

                                    </tr>
                                    @if ($loop->index == 4)
                                        @break
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

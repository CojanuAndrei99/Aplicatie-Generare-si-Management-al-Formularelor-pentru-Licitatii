@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => __('Buna ziua,') . ' '. auth()->user()->name.'!',
    'description' => __('Trebuie sa alegeti o licitatie careia sa ii generati formularele.'),
    'class' => 'col-lg-7'
])   
    <div class="container-fluid mt--7">
        
        <div class=" mt-5">
            <div class="mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                 <h3 class="mb-0">Licitatii</h3>
                            </div>
                           <div class="col text-right">
                                <div class="mb-1">
                                    <form class="row"  method="get" action="{{route('cauta_licitatie_formulare')}}">
                                        @csrf
                                        <input type="text" class="form-control border-primary col-6 " id="cautare_text" name="cautare_text" placeholder="Scrie aici..." aria-label="search">
                                        <select class="form-control border-primary col-4" id="cautare_atribut" name="cautare_atribut" data-toggle="select" data-minimum-results-for-search="Infinity">
                                            <option id="nume_personalizat" name="nume_personalizat" value="nume_personalizat">Nume licitatie</option>
                                            <option id="beneficiar" name="beneficiar" value="beneficiar">Beneficiar</option>
                                            <option id="adresa" name="adresa" value="adresa">Adresa</option>
                                            <option id="localitate" name="localitate" value="localitate">Localitate</option>
                                            <option id="tara" name="tara" value="tara">Tara</option>
                                            <option id="persoana_contact" name="persoana_contact" value="persoana_contact">Persoana de contact</option>
                                            <option id="email" name="email" value="email">E-mail</option>
                                            <option id="telefon" name="telefon" value="telefon">Telefon</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cauta</button>
                                        </div>
                                    </form>
                              </div>
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
                                    <th scope="col"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($licitatii->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            Nu s-a gasit nicio licitatie!
                                        </td>
                                    </tr>
                                @else
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
                                            <form  method="post" action="{{route('ales_licitatie')}}">
                                                @csrf
                                                <input type="hidden" id="id_lic" name="id_lic" value="{{$licitatie->id}}">
                                                <button type="submit" class="btn btn-info p-1">{{ __('Alege') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
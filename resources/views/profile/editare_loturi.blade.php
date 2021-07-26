@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => __('Buna ziua,') . ' '. auth()->user()->name.'!',
    'description' => __('Aici puteti vedea detaliile loturilor licitatiei selectate.'),
    'class' => 'col-lg-7'
])   
    <div class="container-fluid mt--7">
        <form  method="post" action="{{route('editat_loturi')}}" autocomplete="off">
        @csrf
        <div class=" mt-5">
            <div class="mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                 <h3 class="mb-0">Licitatia {{$licitatie[0]->nume_personalizat}}</h3>
                                 
                                 <h3  class="mb-0 pt-4">Lotul {{$nr_lot}}</h3>
                            </div>
                            
                        </div>
                    </div>
                    <div class="table-responsive">
                        
                        <table class="table align-items-center table-flush">
                            <tbody>
                                
                                    <tr class="thead-light">
                                        <td colspan="2">
                                            <h6 class="heading-small text-muted mb-4">{{ __('Informatii loturi') }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Denumire lot') }}
                                        </td>
                                        <td>
                                            <input type="text" name="denumire_lot" id="denumire_lot" class="form-control" value="{{ $lot[0]->denumire_lot }}" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Descriere achizitie') }}
                                        </td>
                                        <td>
                                            <textarea rows="20" type="text" name="descriere_achizitie" id="descriere_achizitie" class="form-control" >{{ $lot[0]->descriere_achizitie }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Criterii de atribuire') }}
                                        </td>
                                        <td>
                                            <textarea rows="20" type="text" name="criteriu_atribuire" id="criteriu_atribuire" class="form-control" >{{ $lot[0]->criteriu_atribuire }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Informatii despre posibilitatii variantelor') }}
                                        </td>
                                        <td>
                                            <input type="text" name="info_variante" id="info_variante" class="form-control" value="{{ $lot[0]->info_variante }}" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Durata contractului') }}
                                        </td>
                                        <td>
                                            <input type="text" name="durata_contract" id="durata_contract" class="form-control" value="{{ $lot[0]->durata_contract }}" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Valoarea totala a contractului fara TVA') }}
                                        </td>
                                        <td>
                                            <input type="text" name="valoare_totala_ftva" id="valoare_totala_ftva" class="form-control" value="{{ $lot[0]->valoare_totala_ftva }}" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Valoarea garantiei contractului fara TVA') }}
                                        </td>
                                        <td>
                                            <input type="text" name="valoare_garantie_ftva" id="valoare_garantie_ftva" class="form-control" value="{{ $lot[0]->valoare_garantie_ftva }}.%" >
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <div class="text-center">
                                                <input type="hidden" id="id_lic" name="id_lic" value="{{$licitatie[0]->id}}">
                                                <input type="hidden" id="id_lot" name="id_lot" value="{{$lot[0]->id}}">
                                                <button type="submit" class="btn btn-info p-1">{{ __('Salveaza') }}</button>
                                            </div>
                                        </td>
                                    </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </form>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
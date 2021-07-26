@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => __('Buna ziua,') . ' '. auth()->user()->name.'!',
    'description' => __('Aici puteti vedea detaliile loturilor licitatiei selectate.'),
    'class' => 'col-lg-7'
])   
    <div class="container-fluid mt--7">
        
        <div class=" mt-5">
            <div class="mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                 <h3 class="mb-0">Licitatia {{$licitatie[0]->nume_personalizat}}</h3>
                                 
                            </div>
                            <div class="col text-center">
                            <form  method="get" action="{{route('vezi_loturi_licitatie')}}">
                                @csrf
                                    <select class="form-control border-primary" data-toggle="select" id="numar_lot" name="numar_lot">
                                        <option value="0">Toate loturile</option>
                                        @for ($i=0;$i<$licitatie[0]->nr_loturi;$i++)

                                            <option value="{{$i+1}}">Lotul {{$i+1}}</option>
                                        @endfor
                                    </select>
                                    <script type="text/javascript">
                                        document.getElementById('numar_lot').value = "<?php if(array_key_exists('numar_lot',$_GET)) echo $_GET['numar_lot']; else echo 0; ?>";
                                      </script>
                                      
                                    <input type="hidden" id="id_lic" name="id_lic" value="{{$licitatie[0]->id}}">
                                    <input type="hidden" id="id_lot" name="id_lot" value="{{$loturi[0]->id}}">
                                    <button type="submit" class="btn btn-info p-2">{{ __('Vizualizare') }}</button>
                            </form>
                            </div>
                            <form  class="col  text-right" method="post" action="{{route('editare_loturi')}}">
                                @csrf
                                <input type="hidden" id="id_lic" name="id_lic" value="{{$licitatie[0]->id}}">
                                <input type="hidden" id="numar_lot1" name="numar_lot1">
                                <script type="text/javascript">
                                    document.getElementById('numar_lot1').value = document.getElementById('numar_lot').value;
                                </script>
                                <input type="hidden" id="id_lot" name="id_lot" value="{{$loturi[0]->id}}">
                                @if ($toate_loturile==0)
                                    
                                    <button type="submit" class="btn btn-info p-2">{{ __('Editare') }}</button>
                                @endif
                            </form>
                            
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
                                    @foreach ($loturi as $lot)
                                        
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Denumire lot') }}
                                        </td>
                                        <td>
                                            <input type="text" name="denumire_lot" id="denumire_lot" class="form-control" value="{{ $lot->denumire_lot }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Descriere achizitie') }}
                                        </td>
                                        <td>
                                            <textarea rows="20" type="text" name="descriere_achizitie" id="descriere_achizitie" class="form-control" readonly>{{ $lot->descriere_achizitie }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Criterii de atribuire') }}
                                        </td>
                                        <td>
                                            <textarea rows="20" type="text" name="criteriu_atribuire" id="criteriu_atribuire" class="form-control" readonly>{{ $lot->criteriu_atribuire }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Informatii despre posibilitatii variantelor') }}
                                        </td>
                                        <td>
                                            <input type="text" name="info_variante" id="info_variante" class="form-control" value="{{ $lot->info_variante }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Durata contractului') }}
                                        </td>
                                        <td>
                                            <input type="text" name="durata_contract" id="durata_contract" class="form-control" value="{{ $lot->durata_contract }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Valoarea totala a contractului fara TVA') }}
                                        </td>
                                        <td>
                                            <input type="text" name="valoare_totala_ftva" id="valoare_totala_ftva" class="form-control" value="{{ $lot->valoare_totala_ftva }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __('Valoarea garantiei contractului fara TVA') }}
                                        </td>
                                        <td>
                                            <input type="text" name="valoare_garantie_ftva" id="valoare_garantie_ftva" class="form-control" value="{{ $lot->valoare_garantie_ftva }}.%" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        </td>
                                    </tr>

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

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
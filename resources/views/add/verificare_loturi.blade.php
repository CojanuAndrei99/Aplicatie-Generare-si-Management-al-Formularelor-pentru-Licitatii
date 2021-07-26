@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => __('Verificati datele loturilor!') ,
    'description' => __('Inainte de a incarca loturile in baza de date, va rugam sa verificati si sa corectati campurile necesare.'),
    'class' => 'col-lg-7'
])   
    <div class="container-fluid mt--7">
        <div class="row ">
            
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Adaugare licitatie') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('verifica_lot')}}" autocomplete="off">
                            @csrf
                            @method('put')

                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                            
                                <div class="form-group">
                                    <label class="form-control-label" for="beneficiar">{{ __('Nume licitatie') }}</label>
                                    <input type="text" name="beneficiar" id="beneficiar" class="form-control" value="{{$nume_lic}}" readonly>
                                </div>
                                <input type="hidden" name="id_lic" id="id_lic" value={{$id_lic}}>
                                    
                                <h6 class="heading-small text-muted mb-4">{{ __('Informatii loturi') }}</h6>
                                @php
                                    $i=1;
                                @endphp
                                    <hr class="my-4" />
                                @foreach ($lista_loturi as $lot )
                                    <h5 class="heading-small text-muted mb-4">Lotul {{$i}}</h5>
                                    <input type="hidden" name="id[{{$i}}]" id="id[{{$i}}]" value="{{$lot->id}}">
                                    <div class="form-group">
                                        <label class="form-control-label" for="denumire_lot">{{ __('Denumire lot') }}</label>
                                        <input type="text" name="denumire_lot[{{$i}}]" id="denumire_lot[{{$i}}]" class="form-control" value="{{$lot->denumire_lot}}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="descriere_achizitie">{{ __('Descriere achizitie') }}</label>
                                        <textarea rows="10" type="text" name="descriere_achizitie[{{$i}}]" id="descriere_achizitie[{{$i}}]" class="form-control" required autofocus>{{$lot->descriere_achizitie}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="criteriu_atribuire">{{ __('Criteriu atribuire') }}</label>
                                        <textarea rows="10" type="text" name="criteriu_atribuire[{{$i}}]" id="criteriu_atribuire[{{$i}}]" class="form-control" required autofocus>{{$lot->criteriu_atribuire}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="info_variante">{{ __('Informatii privind variante') }}</label>
                                        <input type="text" name="info_variante[{{$i}}]" id="info_variante[{{$i}}]" class="form-control" value="{{$lot->info_variante}}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="durata_contract">{{ __('Durata contract') }}</label>
                                        <input type="text" name="durata_contract[{{$i}}]" id="durata_contract[{{$i}}]" class="form-control" value="{{$lot->durata_contract}}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="valoare_totala_ftva">{{ __('Valoarea totala estimata fara TVA') }}</label>
                                        <input type="text" name="valoare_totala_ftva[{{$i}}]" id="valoare_totala_ftva[{{$i}}]" class="form-control"  value="{{$lot->valoare_totala_ftva}}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="valoare_garantie_ftva">{{ __('Valoarea garantiei de participare(procente din valoarea totala a lotului)') }}</label>
                                        <input type="text" name="valoare_garantie_ftva[{{$i}}]" id="valoare_garantie_ftva[{{$i}}]" class="form-control"  value="{{$lot->valoare_garantie_ftva}}"required autofocus>
                                    </div>
                                    <hr class="my-4" />
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salveaza') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection

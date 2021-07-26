@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => __('Verificati datele!') ,
    'description' => __('Inainte de a incarca licitatia in baza de date, va rugam sa verificati si sa corectati campurile necesare deoarece pot aparea mici greseli in cazul diacriticelor si semnelor de punctuatie.'),
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
                        <form method="post" action="{{route('verifica_licitatie')}}" autocomplete="off">
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
                                <h6 class="heading-small text-muted mb-4">{{ __('Informatii licitatie') }}</h6>
                                <div class="form-group">
                                    <input type="hidden" name="id_lic" id="id_lic" value={{$id_lic}}>
                                    <label class="form-control-label" for="nume_personalizat">{{ __('Nume personalizat') }}</label>
                                    <input type="text" name="nume_personalizat" id="nume_personalizat" class="form-control" value="{{ $licitatie->nume_personalizat }}" readonly>

                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="beneficiar">{{ __('Nume licitatie') }}</label>
                                    <input type="text" name="beneficiar" id="beneficiar" class="form-control" value="{{ $licitatie->beneficiar }}" required autofocus>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="cod_fiscal">{{ __('Cod de identificare fiscala') }}</label>
                                    <input type="text" name="cod_fiscal" id="cod_fiscal" class="form-control" value="{{ $licitatie->cod_fiscal }}" required autofocus>
                                </div>
                                <hr class="my-4" />


                                <h6 class="heading-small text-muted mb-4">{{ __('Adresa autoritatii') }}</h6>
                            
                                <div class="form-group">
                                    <label class="form-control-label" for="adresa">{{ __('Adresa locala') }}</label>
                                    <input type="text" name="adresa" id="adresa" class="form-control" value="{{ $licitatie->adresa }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="localitate">{{ __('Localitate') }}</label>
                                    <input type="text" name="localitate" id="localitate" class="form-control" value="{{ $licitatie->localitate }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="tara">{{ __('Tara') }}</label>
                                    <input type="text" name="tara" id="tara" class="form-control" value="{{ $licitatie->tara }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="cod_postal">{{ __('Cod Postal') }}</label>
                                    <input type="text" name="cod_postal" id="cod_postal" class="form-control" value="{{ $licitatie->cod_postal }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="cod_nuts">{{ __('Codul NUTS') }}</label>
                                    <input type="text" name="cod_nuts" id="cod_nuts" class="form-control" value="{{ $licitatie->cod_nuts }}" required autofocus>
                                </div>
                                <hr class="my-4" />


                                <h6 class="heading-small text-muted mb-4">{{ __('Date de contact') }}</h6>
                            
                                <div class="form-group">
                                    <label class="form-control-label" for="email">{{ __('E-mail') }}</label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $licitatie->email }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="telefon">{{ __('Telefon') }}</label>
                                    <input type="text" name="telefon" id="telefon" class="form-control" value="{{ $licitatie->telefon }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="fax">{{ __('Fax') }}</label>
                                    <input type="text" name="fax" id="fax" class="form-control" value="{{ $licitatie->fax }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="persoana_contact">{{ __('Persoana de contact') }}</label>
                                    <input type="text" name="persoana_contact" id="persoana_contact" class="form-control" value="{{ $licitatie->persoana_contact }}" required autofocus>
                                </div>
                                <hr class="my-4" />


                                <h6 class="heading-small text-muted mb-4">{{ __('Date achizitie') }}</h6>
                            
                                <div class="form-group">
                                    <label class="form-control-label" for="titlu">{{ __('Titlu') }}</label>
                                    <input type="text" name="titlu" id="titlu" class="form-control" value="{{ $licitatie->titlu }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="titlu">{{ __('Numar referinta') }}</label>
                                    <input type="text" name="numar_referinta" id="numar_referinta" class="form-control" value="{{ $licitatie->numar_referinta }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="tip_contract">{{ __('Tip contract') }}</label>
                                    <input type="text" name="tip_contract" id="tip_contract" class="form-control" value="{{ $licitatie->tip_contract }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="descriere_succinta">{{ __('Descriere succinta') }}</label>
                                    <textarea rows="20" type="text" name="descriere_succinta" id="descriere_succinta" class="form-control" required autofocus>{{ $licitatie->descriere_succinta }}</textarea>
                                </div>
                                <hr class="my-4" />


                                <h6 class="heading-small text-muted mb-4">{{ __('Valori achizitie') }}</h6>
                            
                                <div class="form-group">
                                    <label class="form-control-label" for="valoare_totala_ftva">{{ __('Valoarea totala estimata fara TVA') }}</label>
                                    <input type="text" name="valoare_totala_ftva" id="valoare_totala_ftva" class="form-control" value="{{ $licitatie->valoare_totala_ftva }}" required autofocus>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="moneda">{{ __('Moneda') }}</label>
                                    <input type="text" name="moneda" id="moneda" class="form-control" value="{{ $licitatie->moneda }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="informatii_suplimentare">{{ __('Informatii suplimentare') }}</label>
                                    <textarea rows="20" type="text" name="informatii_suplimentare" id="informatii_suplimentare" class="form-control"  required autofocus>{{ $licitatie->informatii_suplimentare }}</textarea>
                                </div>
                                <hr class="my-4" />


                                <h6 class="heading-small text-muted mb-4">{{ __('Loturi achizitie') }}</h6>
                            
                                <div class="form-group">
                                    <label class="form-control-label" for="nr_loturi">{{ __('Numarul de loturi') }}</label>
                                    <input type="text" name="nr_loturi" id="nr_loturi" class="form-control" value="{{ $licitatie->nr_loturi }}" required autofocus>
                                </div>


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

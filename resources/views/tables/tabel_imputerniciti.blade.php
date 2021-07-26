@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => __('Buna ziua,') . ' '. auth()->user()->name.'!',
    'description' => __('Aici puteti vedea angajatii si imputernicitii firmei'),
    'class' => 'col-lg-7'
])   
    <div class="container-fluid mt--7">
        
        <div class=" mt-5">
            <div class="mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                 <h3 class="mb-0">Imputerniciti</h3>
                            </div>
                           <div class="col text-right">
                                <div class="mb-1">
                                    <form class="row"  method="get" action="{{route('cauta_imputernicit')}}">
                                        @csrf
                                        <input type="text" class="form-control border-primary col-6 " id="cautare_text" name="cautare_text" placeholder="Scrie aici..." aria-label="search">
                                        <select class="form-control border-primary col-4" id="cautare_atribut" name="cautare_atribut" data-toggle="select" data-minimum-results-for-search="Infinity">
                                            <option id="name" name="name" value="name">Nume imputernicit</option>
                                            <option id="email" name="email" value="email">E-mail</option>
                                        
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
                                    <th scope="col">Nume imputernicit</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col"></th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @if ($imps->isEmpty())
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            Nu s-a gasit niciun imputernicit!
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($imps as $row)
                                        <tr>
                                            <td scope="row">
                                                {{$row->name}}
                                            </td>
                                            <td>
                                                {{$row->email}}
                                            </td>

                                            <td>
                                                @if($user_id_firma==null)
                                                    <form  method="post" action="{{route('sterge_imputernicit')}}">
                                                    @csrf
                                                    <input type="hidden" id="id_imp" name="id_imp" value="{{$row->id}}">
                                                    <button type="submit" class="btn btn-info p-1">{{ __('Sterge') }}</button>
                                                    </form>
                                                @endif
                                                
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
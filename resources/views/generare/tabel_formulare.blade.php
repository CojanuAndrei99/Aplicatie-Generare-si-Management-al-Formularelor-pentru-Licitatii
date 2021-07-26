@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => __('Buna ziua,') . ' '. auth()->user()->name.'!',
    'description' => __('Trebuie sa alegeti tipul de formular.'),
    'class' => 'col-lg-7'
])   
    <div class="container-fluid mt--7">
        
        <div class=" mt-5">
            <div class="mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                 <h3 class="mb-0">Tipuri de formulare</h3>
                            </div>
                           
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Tip formular</th>
                                    <th scope="col"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipuri_formulare as $formular)
                                    <tr>
                                        <td scope="row">
                                            {{$formular->nume_formular}}
                                        </td>
                                        <td>
                                            <form  method="post" action="{{route('ales_formular')}}">
                                                @csrf
                                                <input type="hidden" id="id_lic" name="id_lic" value="{{$id_lic}}">
                                                <input type="hidden" id="id_form" name="id_form" value="{{$formular->id}}">
                                                <button type="submit" class="btn btn-info p-1">{{ __('Alege') }}</button>
                                            </form>
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
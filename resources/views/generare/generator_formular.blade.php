@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => __('Buna ziua,') . ' '. auth()->user()->name.'!',
    'description' => __('Super! Acum hai sa facem ultimele retusuri.'),
    'class' => 'col-lg-7'
])   
    <div class="container-fluid mt--7">
        <div class="row ">
            
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Editare formular') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('salvez_formular')}}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                 </div>
                             @endif
                            <h6 class="heading-small text-muted mb-4">{{ __('Formular') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                                <textarea rows="30">
                                    {{$pdf}}
                                </textarea>
                                <script>
                                  tinymce.init({
                                    selector: 'textarea',
                                    plugins: ' advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen print  powerpaste table advtable',
                                    toolbar: ' casechange checklist code formatpainter pageembed permanentpen table',
                                    toolbar_mode: 'floating',
                                    tinycomments_mode: 'embedded',
                                    export_image_proxy: 'proxy.php' // Required for rendering remote images
                                    
                                 });
                                </script>

                                <div class="text-center">
                                    <input type="hidden" name="id_lic" id="id_lic" value="{{$id_lic}}">
                                    <input type="hidden" name="tip_form" id="tip_form" value="{{$tip_form[0]->nume_formular}}">
                                    <button type="submit" onclick="tinymce.activeEditor.execCommand('mcePrint');" class="btn btn-success mt-4">{{ __('Genereaza') }}</button>
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

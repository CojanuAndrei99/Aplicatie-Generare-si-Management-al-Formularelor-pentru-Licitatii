
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-3">
                    
                    <div class="text-muted text-center mt-2 mb-1"><huge>Buna ziua, {{$email_data['name']}}!</huge></div>
                    <br>
                    <div class="text-muted text-center mt-2 mb-1"><huge>Ne bucuram sa te avem alaturi de noi!</huge></div>
                    
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        
                            <br>
                            Te rugam sa accesezi link-ul de mai jos pentru a-ti verifica adresa de e-mail si pentru a-ti activa contul!
                            <br><br>
                            <a href="http://localhost/Licenta-Cojanu-Andrei/public/verify?code={{$email_data['verification_code']}}">Apasa aici!</a>
                            
                            <br><br>
                            Multumim!
                            <br>
                            Echipa AutoFormular!
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
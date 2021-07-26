@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-4">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Bine ai venit pe AutoFormular.') }}</h1>
                        <h2 class="text-white">{{ __('Lasa grijile completarii zecilor de formulare in grija noastra!') }}</h2>
                        <h2 class="text-white">{{ __(' Hai sa crestem productivitatea!') }}</h2>
                    </div>
                </div>
            </div>
            <hr class="my-3">
            <h3 class="text-white">Introducere</h3>
                <p class="text-white text-bold">Dupa  cum  se  poate  observa,  trecem  printr-o  perioada,  potential  istorica,  
                    din  cauza contextului  sanitar in  care  ne  aflam.   Pandemia  provocata  de  coronavirusul  SARS-COV-2 a 
                    produs o schimbare brusca a modului in care realizam anumite activitati, transferand majoritatea acestora in mediul digital. Majoritatea firmelor, 
                    din cauza scaderii veniturilor, nu au mai putut sustine cheltuiala  salariilor  anumitor  angajati  si  au  fost  nevoite  sa  recurga  la  disponibilizari 
                    si conciedieri.  Tot acestea, au adoptat conceptul de munca la distanta, sau telemunca, pentru a reduce contactul interuman si riscul de infectare.Mediul 
                    de afaceri are la baza doua actiuni foarte simple: vanzarea si cumpararea. Cumpararea sau achizitia se realizeaza de catre un client, care poate fi 
                    reprezentat de catre: 
                </p>
                    <ul class="text-white text-bold">
                        <li>o persoana fizica, adica un om obisnuit;</li>
                        <li>o persoana juridica, de exemplu o societate comerciala privata;</li>
                        <li>statul.</li>
                    </ul>   
                <p class="text-white text-bold">
                    Clientii cumpara produse si/sau servicii, in majoritatea cazurilor, prin achitii directe. Pe scurt, un client gaseste produsul/serviciul de care are nevoie si il cumpara.
                    Acest proces este aplicat, in principal, de catre persoanele fizice, celalte doua tipuri de clientii au nevoie de anumite documente pentru a adeveri 
                    motivele achizitiei acelui produs. Principalul motiv ar fi dorinta de a plati un pret, cat mai mic cand facem o achizitie si de aceea majoritatea 
                    persoanelor juridice si, mai ales, statul desfasoara licitatii, indetrimentul achizitiilor directe, dar si pentru a asigura o transparenta mai buna in 
                    tot acest proces.
                </p>
            <hr class="my-3">
            <h3 class="text-white">Ce trebuie sa rezolvam?</h3>
            <p class="text-white text-bold">
                In acest moment, pentru simplificarea circulatiei acestor documente si pentru a asigura o  mai  mare  transparenta in  achizitiile  facute  de  stat,  s-a  optat
                pentru  crearea  unei platforme unde toate acestea sa fie incarcate si toate detaliile sa fie la vedere pentru oricine. Aceasta platforma a luat numele de 
                Sistemul Electronic de Achizitii Publice (SEAP).Aici  statul  si  institutiile  publice  pot  crea  licitatii in  care  sa  precizeze  de  ce  produse/servicii
                au nevoie, iar firmele sa se poata inscrie pentru a-si oferi cele mai bune oferte.  Pentru a se putea inscrie,  fiecare firma are nevoie de o serie de acte 
                doveditoare ca isi poate onora indatoririle, ca nu au datori si trebuie sa completeze o serie de formulare puse la dispozitie de catre licitator.  
                Toate aceste acte trebuie semnate fizic sau prin semnatura digitala de catre licitant. Tot acest proces de printat, completat si semnat formulare fizic poate sa
                consume pana la 6 ore pentru un angajat, iar riscul de a interveni si greseli de redactare este ridicat.  De precizat ca, daca lipseste unul din documente sau 
                are datele trecute gresit, poate  duce  la  descalificare  ofertantului  din  licitatie!   Acest  proces  limiteaza  foarte mult firmele mici si mijloci, cu un 
                numar mic de angajati, in a lua parte la mai multe licitatii, fiind limitate la una, maxim doua pe zi. Intr-o firma de o asemenea anvergura, in majoritatea cazurilor, 
                personalul angajat este polivalent si nu se poate ocupa numai cu astfel de activitati statice.
            </p>
            <hr class="my-3">
            <h3 class="text-white">Cu ce va putem ajuta?</h3>
            <p class="text-white text-bold">
                Asadar, se impune necesitatea unei aplicatii care s ̆a ajute aceste societati comerciale sa isi poata manageria mai usor aceste documente de inscriere si de a le
                genera automat, unde este posibil.  Avantajele pe termen scurt ar fi o diminuare semnificativa a risculuide descalificare, din cauza erorilor umane aparute la 
                completarea manuala, si crescand astfel, rata de succes in a lua parte la mai multe licitatii.  Avantajul din urma precizat se  poate  datora  si  din  
                potentialul  aplicatiei  de  a  genera  mai  rapid  actele  necesare, astfel firma putand depune mai multe oferte, sansele de a castiga mai multe licitatii si 
                a avea mai multe comenzi crescand proportional. In prezent, aceste documente de ınscriere s-ar putea genera autocompletate folosindu-ne de aplicatia celor de la 
                Google Forms.  Asta ar presupune ca licitantul sa converteasca toate formularele fizice, in formulare de tipul Forms,  iar licitantul sa se foloseasca de aplicatia 
                de autocompletare a celor de la Google.  Aceasta procedura, insa,nu este posibila deoarece in aplicatia SEAP institutiile publice prefera incarcarea documentelor de 
                inscriere sub forma unor fisiere de tip PDF, fara a se mai complica in acompune un formular cu Google Forms.  Pe langa acest fapt, Google fiind o corporatie de o 
                anvergura mondiala, riscul de atacuri cibernetice este ridicat, ceea ce ar duce la posibilitatea atacatorilor de a se folosi de datele firmelor.
            </p>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="jumbotron  bg-light rounded-3">
        <div class="container text-center py-5">
            <h1>Benvenuto!</h1>
            <p class="mt-4">Benvenuto nella nostra piattaforma per i professionisti della salute! Registrati come dottore per accedere a una vasta gamma di strumenti e risorse per aiutarti nella tua pratica quotidiana. Con la registrazione avrai la possibilità di entrare in contatto con molti pazienti che cercano proprio te!</p>

            <div class="pt-4">
                Scopri di più <i class="fa-solid fa-arrow-down fa-bounce"></i>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <h4 class="pb-3">Perché sceglierci?</h4>
        <div class="row">
            <div class="col-4 d-flex">
                <div class="icon mt-2">
                    <i class="fa-solid fa-users-line fa-2x"></i>
                </div>
                <div class="text px-3">
                    <strong>5 milioni</strong>
                    <p>Di pazienti usano BDoctor ogni mese</p>
                </div>
            </div>
            <div class="col-4 d-flex">
                <div class="icon mt-2">
                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                </div>
                <div class="text px-3">
                    <strong>1,5 milioni</strong>
                    <p>Di prenotazioni mensili ogni mese</p>
                </div>
            </div>
            <div class="col-4 d-flex">
                <div class="icon mt-2">
                    <i class="fa-solid fa-stethoscope fa-2x"></i>
                </div>
                <div class="text px-3">
                    <strong>15 000</strong>
                    <p>Specialisti della salute utilizzano BDoctor</p>
                </div>
            </div>
        </div>

    </div>
    
    <div class=" text-center my-2 py-4 bg-light">
        <h5>Entra a far parte del nostro team di specialisti! </h5>
        <a name="" id="" class="btn btn-dark my-2" href="{{ route('register') }}" role="button">Registrati</a>

        <small class="d-block pt-3">Oppure</small>
        <a name="" id="" class="btn btn-dark my-2" href="http://localhost:5174/" role="button">Torna al sito</a>
    </div>
@endsection

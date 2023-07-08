@extends('layouts.admin')

@section('content')
    <div class="container-md my-5">
        @if ($doctor->service == null)
            {{-- @empty($doctor->service || $doctor->specialization) --}}
            <div class="alert alert-danger " role="alert">
                <div class="container-fluid py-5 text-center">
                    <h6 class="display-5 fw-bold">Completa il tuo profilo</h6>
                    <p class="text-center">
                        Clicca sul pulsante Edit per aggiungere o modificare i dati del tuo profilo
                    </p>
                </div>

            </div>
            {{-- @endempty --}}
        @endif
        <div class="row py-5 shadow">
            <div class="col px-5 me-5">

                <div class="card d-flex flex-row p-2">
                    <div class="col-6 card-body">
                        <div class="d-flex align-items-center">
                            <h2 class="card-title m-0 text-uppercase me-3 p-0 ">{{ $userDetail->name }} {{ $userDetail->lastname }}</h2>
                            <a class="btn btn-danger " href="{{ route('doctor.edit', $doctor) }}" role="button">Edit</a>
                        </div>
                        <div class=" mb-4">
                            <smal class=" text-muted">Premi sul pulsante Edit per modificare il profilo.</smal>
                        </div>
                        <div>
                            <p><strong>Phone number: </strong>{{ $doctor->phone }}</p>
                        </div>
                        <div>
                            <p><strong>Email: </strong>{{ $userDetail->email }}</p>
                        </div>
                        <p><strong>Prestazioni: </strong>{{ $doctor->service }}</p>
                        <p><strong>Indirizzo </strong>{{ $doctor->address }}</p>
                        <span><strong>Specializzazioni:</strong></span>
                        <ul>
                            @forelse ($doctor->specializations as $specialization)
                                <li>{{ $specialization->name }}</li>
                            @empty
                                <li class=" list-unstyled">nessuna specializzazione</li>
                            @endforelse
                        </ul>

                    </div>
                    <div class="col-6 card_image p-3" style="width:300px">
                        <img class="card-img-top" src="{{ asset('storage/' . $doctor->photo) }}" alt="Photo">
                    </div>
                </div>
            </div>
            {{ $averages }}
        </div>
    </div>
@endsection

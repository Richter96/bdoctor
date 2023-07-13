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
                        <h2 class="card-title m-0 text-uppercase me-3 p-0 ">{{ $user->name }} {{ $user->lastname }}</h2>
                        <a class="btn btn-danger " href="{{ route('doctor.edit', $doctor) }}" role="button">Edit</a>
                    </div>
                    <div class="mb-3 text-muted">Premi Edit per modificare il profilo.</div>
                    <div class="mb-2 badge bg-danger"><strong>Vote: </strong>{{ isset($average[0]) ? $average[0]->avgVote : '-' }}</div>
                    <div class="mb-2"><strong>Phone number: </strong>{{ $doctor->phone }}</div>
                    <div class="mb-2"><strong>Email: </strong>{{ $user->email }}</div>
                    <div class="mb-2"><strong>Prestazioni: </strong>{{ $doctor->service }}</div>
                    <div class="mb-2"><strong>Indirizzo </strong>{{ $doctor->address }}</div>
                    <div><strong>Specializzazioni:</strong></div>
                    <ul>
                        @forelse ($doctor->specializations as $specialization)
                        <li>{{ $specialization->name }}</li>
                        @empty
                        <li class=" list-unstyled">nessuna specializzazione</li>
                        @endforelse
                    </ul>
                    @if ($doctor->cv)
                    <div class="mb-2" >
                        <strong>Visualizza il tuo curriculum </strong>
                        <a href="{{ route('display_pdf', $doctor->cv) }}" class="text-decoration-none "><i class="fa-solid fa-file-pdf fa-2x text-dark"></i></a>
                    </div>
                    @endif
                </div>
                <div class="col-6 card_image p-3" style="width:300px">
                    @if ($doctor->photo)
                    <img class="card-img-top" src="{{ asset('storage/' . $doctor->photo) }}" alt="Photo">
                    @else
                    <img class="card-img-top" src="{{asset('img/bdoctor.png')}}" alt="Photo">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

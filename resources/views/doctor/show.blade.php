@extends('layouts.admin')

@section('content')
    <div class="container-md my-5">
        <div class="row py-5 shadow">
            <div class="col px-5 me-5">
                <div class="card d-flex flex-row">
                    <div class="col-7 card-body">
                        <div class="d-flex align-items-center">
                            <h2 class="card-title py-4 text-uppercase me-3">{{ $userDetail->name }}</h2>
                            <a class="btn btn-danger my-3 " href="{{ route('doctor.edit', $doctor) }}" role="button">Edit</a>
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
                    <div class="col card_image" style="width:300px">
                        <img class="card-img-top" src="https://picsum.photos/200/300" alt="Title">
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

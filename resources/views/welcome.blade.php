@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container text-center py-5">
            <h1>WELCOME</h1>
            <h2>Jumbotron</h2>
        </div>
    </div>

    <div class="container">
        <div class="container">
            <h3 class="mb-3 mt-5">Che specialista desideri?</h3>

            <form action="{{ route('form-specialization') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <select required class="form-select form-select-lg" name="specializations" id="specializations">
                        <option disabled selected>Select one</option>
                        @foreach ($specializations as $specialization)
                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="input-group-text">Submit</button>
                </div>

                @error('specializations')
                    <div class="my-3"><small class="text-danger">{{ $message }}</small></div>
                @enderror
            </form>
        </div>

        @if (isset($doctors) && !empty($doctors))
            <div class="row">
                @foreach ($doctors as $index => $doctor)
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title m-0 text-uppercase me-3 p-0 ">{{ $users[$index]->name }} {{ $users[$index]->lastname }}</h2>
                                <div>
                                    <p><strong>Phone number: </strong>{{ $doctor->phone }}</p>
                                </div>
                                <div>
                                    <p><strong>Email: </strong>{{ $users[$index]->email }}</p>
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
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                @endforeach
            </div>
            <!-- /.row -->
        @else
            <div>Nessun risultato</div>
        @endif

    </div>
@endsection

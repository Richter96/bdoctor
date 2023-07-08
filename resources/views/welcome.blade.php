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

        @if (isset($docs_info) && !empty($docs_info))
            <div class="row mb-5">
                @foreach ($docs_info as $doc_info)
                    <div class="col-4 g-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h2 class="card-title text-uppercase">{{ $doc_info->name }} {{ $doc_info->lastname }}</h2>
                                <div class="mb-2 badge bg-danger"><strong>Vote: </strong>{{ $doc_info->avgVote }}</div>
                                <div class="mb-2"><strong>Phone number: </strong>{{ $doc_info->phone }}</div>
                                <div class="mb-2"><strong>Email: </strong>{{ $doc_info->email }}</div>
                                <div class="mb-2"><strong>Prestazioni: </strong>{{ $doc_info->service }}</div>
                                <div class="mb-2"><strong>Indirizzo </strong>{{ $doc_info->address }}</div>
                                <span><strong>Specializzazioni:</strong></span>
                                <ul>
                                    @forelse ($doc_info->specializations as $specialization)
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

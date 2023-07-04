@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container text-center py-5">
            <h1>WELCOME</h1>
            <h2>Jumbotron</h2>
        </div>
    </div>

    <div class="content">
        <div class="container text-center">
            <h3>Che specialista desideri?</h3>

            <form action="{{ route('form-specialization') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Specializazzione</label>
                    <select class="form-select form-select-lg" name="specializations" id="specializations">
                        <option selected>Select one</option>
                        @foreach ($specializations as $specialization)
                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-light text-dark px-4">Search</button>
                </div>
            </form>

            <div>{{ $specialization->name }}</div>
        </div>
    </div>
@endsection

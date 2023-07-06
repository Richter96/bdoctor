@extends('layouts.admin')

@section('content')
    <div class="container">
        @forelse ($messages as $message)
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Messaggio</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">{{$message->name_patient}}</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        @empty
            <tr>
                <td>No Message</td>
            </tr>
        @endforelse
    </div>
@endsection

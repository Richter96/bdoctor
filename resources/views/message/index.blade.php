@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-primary my-3" role="alert">
                <strong>{{ session('message') }}</strong>
            </div>
        @endif
        <table class="table ">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Messaggio</th>
                    <th>Data</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr>
                        <td>{{ $message->name_patient }}</td>
                        <td>{{ $message->email_patient }}</td>
                        <td>{{ $message->text }}</td>
                        <td>{{ $message->created_at }}</td>
                        <td>
                            <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Show</button>
                            <form action="{{ route('message.destroy', $message) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="text">
                                            <h1 class="modal-title fs-4" id="exampleModalLabel">{{ $message->name_patient }}</h1>
                                            <h3 class="text-muted fs-6" id="exampleModalLabel">{{ $message->email_patient }}</h3>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $message->text }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
            </tbody>
        @empty
            <tr>
                <td>No Message</td>
            </tr>
            @endforelse
        </table>
    </div>
@endsection

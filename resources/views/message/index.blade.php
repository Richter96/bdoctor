@extends('layouts.admin')

@section('content')
    <div class="container">
        <table class="table ">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Messaggio</th>
                    <th>Data</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                <tr>
                    <td>{{$message->name_patient}}</td>
                    <td>{{$message->email_patient}}</td>
                    <td>{{$message->text}}</td>
                    <td>{{$message->date_time}}</td>
                    <td>
                        <form action="{{route('message.destroy', $message)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

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

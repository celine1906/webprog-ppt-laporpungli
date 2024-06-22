@extends('adminlte::page')

@section('title', 'Chat')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chat</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach($users as $user)
                            <li><a href="{{ route('admin.chat.show', ['user' => $user->id_user]) }}">{{ $user->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

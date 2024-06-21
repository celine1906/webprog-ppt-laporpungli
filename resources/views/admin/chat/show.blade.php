@extends('adminlte::page')

@section('title', 'Chat with {{ $user->name }}')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chat with {{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="chat-messages" id="chat-messages">
                        @foreach($messages as $message)
                            <div class="message">
                                <strong>{{ $message->sender->name }}:</strong> {{ $message->content }}
                            </div>
                        @endforeach
                    </div>
                    <form id="chat-form" class="mt-3" action="{{ route('admin.chat.send', ['user' => $user->id_user]) }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="message" class="form-control" placeholder="Type your message" required>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const ws = new WebSocket('ws://localhost:8080/room');
    const chatMessages = document.getElementById('chat-messages');
    const chatForm = document.getElementById('chat-form');
    const messageInput = document.querySelector('input[name="message"]');

    ws.onmessage = function(event) {
        const msg = event.data;
        const msgDiv = document.createElement('div');
        msgDiv.textContent = msg;
        chatMessages.appendChild(msgDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    };

    chatForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const message = messageInput.value;
        if (message) {
            ws.send(message);
            messageInput.value = '';
        }
    });
</script>
@stop

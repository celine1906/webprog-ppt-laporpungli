@extends('masyarakat.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Chat</h3>
            <div class="chat-box">
                <div class="chat-messages" id="chat-messages" style="height: 400px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;">
                    <!-- Pesan akan ditambahkan di sini -->
                </div>
                <form id="chat-form" class="mt-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="message-input" placeholder="Ketik pesan...">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const ws = new WebSocket('ws://localhost:8080/room');
    const chatMessages = document.getElementById('chat-messages');
    const chatForm = document.getElementById('chat-form');
    const messageInput = document.getElementById('message-input');

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
@endsection

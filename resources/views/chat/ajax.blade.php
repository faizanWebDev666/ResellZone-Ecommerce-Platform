
<div class="container py-5">
    <h3 class="mb-4">Chat with {{ $receiver->name }}</h3>

    <div id="chat-box" class="border p-3 mb-3" style="height: 300px; overflow-y: scroll; background-color: #f9f9f9;"></div>

    <form id="chat-form">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
        <div class="input-group">
            <input type="text" name="message" class="form-control" placeholder="Type your message..." required>
            <button class="btn btn-primary" type="submit">Send</button>
        </div>
    </form>
</div>


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let receiverId = '{{ $receiver->id }}';
let chatBox = $('#chat-box');

function fetchMessages() {
    $.ajax({
        url: '{{ route("chat.fetch") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            receiver_id: receiverId
        },
        success: function(messages) {
            chatBox.html('');
            messages.forEach(function(msg) {
                let align = msg.sender_id == '{{ auth()->id() }}' ? 'text-end text-primary' : 'text-start text-dark';
                chatBox.append(`<p class="${align}"><strong>${msg.sender_id == '{{ auth()->id() }}' ? 'You' : 'Them'}:</strong> ${msg.message}</p>`);
            });
            chatBox.scrollTop(chatBox[0].scrollHeight);
        }
    });
}

$('#chat-form').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: '{{ route("chat.send") }}',
        method: 'POST',
        data: $(this).serialize(),
        success: function() {
            fetchMessages();
            $('input[name="message"]').val('');
        }
    });
});

// Auto-refresh every 3 seconds
setInterval(fetchMessages, 3000);
fetchMessages();
</script>
@endsection

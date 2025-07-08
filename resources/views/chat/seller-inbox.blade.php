
<div class="container py-4">
    <h3>Your Conversations</h3>
    <ul class="list-group">
        @forelse ($conversations as $userId => $messages)
            @php
                $user = \App\Models\User::find($userId);
            @endphp
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('chat.ajax', ['receiverId' => $userId]) }}">
                    {{ $user->name ?? 'Unknown User' }}
                </a>
                <span class="badge bg-primary">{{ $messages->count() }} messages</span>
            </li>
        @empty
            <li class="list-group-item">No conversations yet.</li>
        @endforelse
    </ul>
</div>


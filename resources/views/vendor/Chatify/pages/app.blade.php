


@include('Chatify::layouts.headLinks')

<div class="messenger">
    {{-- Users/Groups list --}}
    <div class="messenger-listView">
        <div class="m-header">
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span></a>
                <nav class="m-header-right">
                    <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                    <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                </nav>
            </nav>
            <input type="text" class="messenger-search" placeholder="Search users..." />
        </div>
        <div class="m-body contacts-container">
            <div class="listOfContacts"></div>
        </div>
    </div>

    {{-- Messaging Area --}}
    <div class="messenger-messagingView">
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                <div class="chatify-d-flex chatify-align-items-center">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar"></div>
                    <a href="#" class="user-name">{{ $user->name ?? 'User' }}</a>
                </div>
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Product
                    </a>
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
        </div>

        {{-- Messages Area --}}
        <div class="m-body messages-container app-scroll">
            <div class="messages" id="message-container">
                @foreach ($messages as $message)
                    <div class="message-card {{ $message->from_id == auth()->id() ? 'mc-sender' : 'mc-receiver' }}">
                        <div class="message">
                            <p>{{ $message->body }}</p>
                            <span class="message-time">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @include('Chatify::layouts.sendForm')
    </div>

    {{-- Info Side --}}
    <div class="messenger-infoView app-scroll">
        <nav>
            <p>Seller Details</p>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>



{{-- Auto Refresh Messages --}}
<script>
    function loadMessages() {
        $.ajax({
            url: "{{ route('messages.get', $user->id) }}",
            method: "GET",
            success: function (data) {
                $("#message-container").html(data);
            }
        });
    }

    setInterval(loadMessages, 5000); // Refresh messages every 5 seconds
</script>


@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
@php
    $isDoctor = Auth::user()->role === 'doctor';
@endphp
@extends($isDoctor ? 'doctor.app' : 'patient.app')
@section('title', 'Message')
@section('content')
    <style>
        .user-list {
            width: 30%;
            border-right: 1px solid #ccc;
            padding: 10px;
        }

        .chat-window {
            width: 70%;
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        .chat-header {
            background: #f1f1f1;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .chat-body {
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 10px;
            overflow-y: scroll;
        }

        .chat-footer {
            border-top: 1px solid #ccc;
            padding: 10px;
        }

        .message {
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }

        .message.sender {
            background: #dcf8c6;
            align-self: flex-end;
        }

        .message.receiver {
            background: #ebebeb;
            align-self: flex-start;
        }
    </style>
    @if ($isDoctor)
        <div class="col-sm-12">
            <div class="row flex-grow home-tab">
                <div class="col-4 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title card-title-dash">Message Patient</h4>
                                        <a style="cursor: pointer" data-bs-toggle="offcanvas" data-bs-target="#createMessage"
                                            class="btn btn-primary btn-xs text-white">Create Message</a>
                                        <div class="offcanvas offcanvas-end" tabindex="-1" id="createMessage">
                                            <div class="offcanvas-header">
                                                <h5 class="text-center">Message Patient</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body">
                                                <form action="{{ route('patient.messagestore') }}" method="POST">
                                                    @csrf
                                                    <div class="mb-4">
                                                        <label for="receiver_id" class="form-label">Patient:</label>
                                                        <select name="receiver_id" class="form-select" id="receiver_id">
                                                            @foreach ($patients as $patient)
                                                                <option value="{{ $patient->user->id }}"
                                                                    {{ request('receiver_id') == $patient->user->id ? 'selected' : '' }}>
                                                                    {{ $patient->user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-group">
                                                        <img class="img-sm rounded-10 me-2"
                                                            src="{{ asset($patient->photo) }}" alt="profile">
                                                        <input type="text" class="form-control"
                                                            placeholder="Send message" name="message">
                                                        <div class="input-group-append py-2 ms-2">
                                                            <button class="btn btn-primary text-white" type="submit"><i
                                                                    class="menu-icon mdi mdi-send"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        @foreach ($senders as $sender)
                                            <div
                                                class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a href="#{{ $sender->id }}"
                                                            style="text-decoration: none; color: black;"
                                                            class="border-none d-flex justify-content-between p-0 {{ $sender->id === $sender_id ? 'active' : '' }} message-tab"
                                                            id="home-tab" role="tab"
                                                            aria-controls="{{ $sender->id }}" aria-selected="true"
                                                            data-bs-toggle="tab" data-message-id="{{ $sender->id }}">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10"
                                                                    src="{{ asset($sender->patient->photo) }}"
                                                                    alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">{{ $sender->name }}</p>
                                                                    <small
                                                                        class="text-muted mb-0">{{ $sender->email }}</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    @if ($sender_id)
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade {{ $sender_id === $sender_id ? 'active show' : '' }}"
                                id="{{ $sender_id }}" role="tabpanel" aria-labelledby="overview">
                                <div class="card card-rounded">
                                    <div class="card-header d-flex justify-content-between pt-4 align-items-center">
                                        <div class="d-flex">
                                            @php
                                                $mypatient = $senders->where('id', $sender_id)->first();
                                            @endphp
                                            <img class="img-sm rounded-10 me-2"
                                                src="{{ asset($mypatient->patient->photo) }}"alt="profile">
                                            <div class="ms-2">
                                                <h6>{{ $mypatient->name }}</h6>
                                                <p>{{ $mypatient->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chat-body" id="chat-body">
                                            @foreach ($messages as $message)
                                                <div
                                                    class="message {{ $message->sender_id === auth()->id() ? 'sender' : 'receiver' }}">
                                                    <h5 class="fw-semibold mb-2">{{ $message->message }}</h5><small
                                                        class="float-end">{{ Carbon\Carbon::parse($message->sent_at)->format('H:i') }}</small>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <form action="{{ route('doctor.messagestore') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <img class="img-sm rounded-10 me-2" src="{{ asset($doctor->photo) }}"
                                                        alt="profile">
                                                    <input type="text" value="{{ $sender_id }}" name="receiver_id"
                                                        style="display: none">
                                                    <input type="text" class="form-control" placeholder="Send message"
                                                        aria-label="Send message" name="message">
                                                    <div class="input-group-append py-2 ms-2">
                                                        <button class="btn btn-primary text-white" type="submit"><i
                                                                class="menu-icon mdi mdi-send"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                aria-labelledby="overview">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <p>No message selected</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @else
        <div class="col-sm-12">
            <div class="row flex-grow home-tab">
                <div class="col-4 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title card-title-dash">Message Doctor</h4>
                                        <a style="cursor: pointer" data-bs-toggle="offcanvas"
                                            data-bs-target="#createMessage"
                                            class="btn btn-primary btn-xs text-white">Create Message</a>
                                        <div class="offcanvas offcanvas-end" tabindex="-1" id="createMessage">
                                            <div class="offcanvas-header">
                                                <h5 class="text-center">Message Doctor</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body">
                                                <form action="{{ route('patient.messagestore') }}" method="POST">
                                                    @csrf
                                                    <div class="mb-4">
                                                        <label for="receiver_id" class="form-label">Dokter:</label>
                                                        <select name="receiver_id" class="form-select" id="receiver_id">
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->user->id }}"
                                                                    {{ request('receiver_id') == $doctor->user->id ? 'selected' : '' }}>
                                                                    {{ $doctor->user->name }} |
                                                                    {{ $doctor->polyclinic->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-group">
                                                        <img class="img-sm rounded-10 me-2"
                                                            src="{{ asset($patient->photo) }}" alt="profile">
                                                        <input type="text" class="form-control"
                                                            placeholder="Send message" name="message">
                                                        <div class="input-group-append py-2 ms-2">
                                                            <button class="btn btn-primary text-white" type="submit"><i
                                                                    class="menu-icon mdi mdi-send"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        @foreach ($senders as $sender)
                                            <div
                                                class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a href="#{{ $sender->id }}"
                                                            style="text-decoration: none; color: black;"
                                                            class="border-none d-flex justify-content-between p-0 {{ $sender->id === $sender_id ? 'active' : '' }} message-tab"
                                                            id="home-tab" role="tab"
                                                            aria-controls="{{ $sender->id }}" aria-selected="true"
                                                            data-bs-toggle="tab" data-message-id="{{ $sender->id }}">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10"
                                                                    src="{{ asset($sender->doctor->photo) }}"
                                                                    alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">{{ $sender->name }}</p>
                                                                    <small
                                                                        class="text-muted mb-0">{{ $sender->email }}</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    @if ($sender_id)
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade {{ $sender_id === $sender_id ? 'active show' : '' }}"
                                id="{{ $sender_id }}" role="tabpanel" aria-labelledby="overview">
                                <div class="card card-rounded">
                                    <div class="card-header d-flex justify-content-between pt-4 align-items-center">
                                        <div class="d-flex">
                                            @php
                                                $mydoctor = $senders->where('id', $sender_id)->first();
                                            @endphp
                                            <img class="img-sm rounded-10 me-2"
                                            src="{{ asset($mydoctor->doctor->photo) }}"alt="profile">
                                            <div class="ms-2">
                                                <h6>{{ $mydoctor->name }}</h6>
                                                <p>{{ $mydoctor->email }}</p>
                                            </div>
                                        </div>
                                        <small class="text-muted badge badge-success">Polyclinic
                                            {{ $mydoctor->doctor->polyclinic->name }}</small>
                                        </div>
                                        <div class="card-body">
                                            <div class="chat-body" id="chat-body">
                                                @foreach ($messages as $message)
                                                <div
                                                    class="message {{ $message->sender_id === auth()->id() ? 'sender' : 'receiver' }}">
                                                    <h5 class="fw-semibold mb-2">{{ $message->message }}</h5><small
                                                        class="float-end">{{ Carbon\Carbon::parse($message->sent_at)->format('H:i') }}</small>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <form action="{{ route('patient.messagestore') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <img class="img-sm rounded-10 me-2"
                                                            src="{{ asset($patient->photo) }}"
                                                            alt="profile">
                                                        <input type="text" value="{{ $sender_id }}"
                                                            name="receiver_id" style="display: none">
                                                        <input type="text" class="form-control"
                                                            placeholder="Send message" aria-label="Send message"
                                                            name="message">
                                                        <div class="input-group-append py-2 ms-2">
                                                            <button class="btn btn-primary text-white" type="submit"><i
                                                                    class="menu-icon mdi mdi-send"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                aria-labelledby="overview">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <p>No message selected</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const isDoctor = @json(Auth::user()->role === 'doctor');
            document.querySelectorAll('.message-tab').forEach(function(tab) {
                tab.addEventListener('click', function() {
                    const senderId = this.getAttribute('data-message-id');
                    if (isDoctor) {
                        window.location.href = `/doctor/message/${senderId}`;
                    } else {
                        window.location.href = `/patient/message/${senderId}`;
                    }
                    // $isDoctor ? window.location.href = `/doctor/message/${senderId}` : window.location.href = `/patient/message/${senderId}`;
                });
            });
        });
    </script>
@endsection

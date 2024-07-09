@php
    $isDoctor = Auth::user()->role === 'doctor';
@endphp
@extends($isDoctor ? 'doctor.app' : 'patient.app')
@section('title', 'Queue')
@section('content')
    <div class="col-sm-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    @foreach ($polis as $poli)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link politab {{ $poli->id === $poli_id ? 'active' : '' }}" id="home-tab"
                                data-bs-toggle="tab" href="#{{ $poli->id }}" data-poli-id="{{ $poli->id }}"
                                role="tab" aria-controls="{{ $poli->id }}"
                                aria-selected="true">{{ $poli->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <div>
                    <div class="btn-wrapper">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#bookQueue"
                            class="btn btn-primary text-white me-0">Booking Antrian</a>
                    </div>
                </div>
            </div>

            <div class="tab-content tab-content-basic">
                <div class="tab-pane fade {{ $poli_id === $poli_id ? 'active show' : '' }}" id="{{ $poli_id }}"
                    role="tabpanel" aria-labelledby="overview">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>{{ $poli_name }} <p>open : 08.00 - 13.00</p>
                                </h2>
                                <span class="badge badge-warning"> {{ $today->format('D, d M Y') }}</span>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> No. </th>
                                            <th> Patient </th>
                                            <th> Poli </th>
                                            <th> Doctor </th>
                                            <th> Queue At </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($queues as $queue)
                                            <tr>
                                                <td>MP-{{ $queue->id }}</td>
                                                <td class="py-1">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset($queue->patient->photo) }}" alt="image">
                                                        <h6 class="ms-2">
                                                            {{ Auth::user()->id == $queue->patient->user->id ? $queue->patient->user->name : Str::limit($queue->patient->user->name, 3, '...') }}
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td> {{ $queue->polyclinic->name }} </td>
                                                <td>
                                                    {{ $queue->doctor->user->name }}
                                                </td>
                                                <td style="text-transform: uppercase;">
                                                    {{ Carbon\Carbon::parse($queue->queued_at)->format('h:i a') }} </td>
                                                <td>
                                                    @if (Auth::id() == $queue->patient->user->id)
                                                        <form action="{{ route('patient.destroyqueue', $queue->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $queue->id }}">
                                                            <button type="submit" class="btn btn-danger text-white"><i
                                                                    class="menu-icon mdi mdi-delete"></i></button>
                                                        </form>
                                                    @else
                                                        <p>-</p>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada antrian</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Booking Queued --}}
        <div class="modal" id="bookQueue">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookQueueLabel">Booking Antrian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('patient.storequeue') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="poli" class="form-label">Poli</label>
                                <select class="form-select" id="poli" name="poli_id" required>
                                    @foreach ($polis as $poli)
                                        <option value="{{ $poli->id }}">{{ $poli->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="priority" class="form-label">Priority</label>
                                <select class="form-select" id="priority" name="priority" required>
                                    <option value="umum">Umum</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="darurat">Darurat</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="queued_at" class="form-label">Queued At</label>
                                <input type="date" class="form-control" id="queued_at" name="queued_at" required>
                            </div>
                            <div class="ms-auto">
                                <button class="btn btn-primary text-white" type="submit">BOOK QUEUED</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.politab').forEach(function(tab) {
                tab.addEventListener('click', function() {
                    const poliId = this.getAttribute('data-poli-id');
                    window.location.href = `/patient/queues${poliId}`;
                });
            });
        });
    </script>
@endsection

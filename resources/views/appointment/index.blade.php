@php
    $isDoctor = Auth::user()->role === 'doctor';
@endphp
@extends($isDoctor ? 'doctor.app' : 'patient.app')
@section('title', 'Appointment')
@section('content')
    @if ($isDoctor)
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                @forelse ($appointments as $appointment)
                    <div class="col-md-4 col-lg-4 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body card-rounded">
                                <div class="wrapper d-flex align-items-center">
                                    <img src="{{ asset($appointment->patient->photo) }}" alt=""
                                        class="img-sm rounded-circle">
                                    <div class="ms-2">
                                        <h6 class="text-primary m-0">{{ $appointment->patient->user->name }}</h6>
                                        <p class="m-0"><i
                                                class="menu-icon mdi mdi-email me-2"></i>{{ $appointment->patient->user->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="list align-items-center border-bottom py-2">
                                    <div class="wrapper w-100">
                                        <p class="mb-2 fw-medium">Polyclinic : {{ $appointment->doctor->polyclinic->name }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="mdi mdi-calendar text-muted me-1"></i>
                                                <p class="mb-0 text-small text-muted">
                                                    {{ Carbon\Carbon::parse($appointment->appointment_time)->format('H:i | D, d M') }}
                                                </p>
                                            </div>
                                            <span class="badge badge-warning">{{ $appointment->status }}</span>
                                        </div>
                                    </div>
                                </div>
                                @if ($appointment->status == 'diterima')
                                    <form class="d-flex" action="{{ route('doctor.appointmentupdate', $appointment->id) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-success btn-sm mt-2 btn-block w-100" name="status"
                                            value="selesai" type="submit">Selesai</button>
                                        <a data-bs-toggle="modal" data-bs-target="#addRecord{{ $appointment->id }}"
                                            class="btn btn-transparent pt-3 btn-sm btn-block ms-2"><i
                                                class="menu-icon mdi mdi-application-edit-outline text-warning"></i></a>
                                    </form>
                                    
                                @elseif ($appointment->status == 'ditolak')
                                    <button class="btn btn-danger btn-sm mt-2 btn-block w-100">Tidak ada aksi</button>
                                @elseif ($appointment->status == 'selesai')
                                    <button class="btn btn-success btn-sm mt-2 btn-block w-100">Diagnosis Selesai</button>
                                @endif
                                <form
                                    class="d-flex gap-1 {{ $appointment->status == 'diterima' || $appointment->status == 'ditolak' || $appointment->status == 'selesai' ? 'd-none' : '' }}"
                                    action="{{ route('doctor.appointmentupdate', $appointment->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-primary btn-sm mt-2 btn-block w-100" name="status"
                                        value="diterima" type="submit">Terima</button>
                                    <button class="btn btn-danger btn-sm mt-2 btn-block w-100" name="status"
                                        value="ditolak" type="submit">Tolak</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="addRecord{{ $appointment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Diagnosis</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('doctor.healthrecordstore') }}" method="POST">
                                        @csrf
                                        <input type="text" value="{{ $appointment->patient->id }}" name="patient_id" hidden>
                                        <div class="form-group">
                                            <label for="diagnosis">Diagnosis</label>
                                            <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3"
                                                required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient">Recipient</label>
                                            <textarea class="form-control" id="recipient" name="recipient" rows="3"
                                                required></textarea>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Create Diagnosis</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-rounded">
                            <div class="card-body">
                                <h5 class="card-title">No appointment scheduled yet</h5>
                                <p class="card-text">Wait an appointment to start create health status.</p>
                            </div>
                        </div>
                    </div>
                @endforelse
                {!! $appointments->withQueryString()->links('vendor.pagination.mypagination') !!}
            </div>
        </div>
    @else
        <div class="col-sm-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="col-lg-12">
                <div class="d-flex align-items-center">
                    <div class="btn-wrapper">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#appointment"
                            class="btn btn-primary text-white me-0">
                            <i class="menu-icon mdi mdi-application-edit-outline"></i>
                            Create Appointment
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal" id="appointment">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookQueueLabel">Create Appointment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('patient.appointmentstore') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="doctor_id" class="form-label">Select Doctor</label>
                                    <select class="form-select" name="doctor_id" id="doctor_id">
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->user->name }} |
                                                {{ $doctor->polyclinic->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="appointment_time" class="form-label">Appointment Time</label>
                                    <input type="datetime-local" class="form-control" id="appointment_time"
                                        name="appointment_time" required>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-primary text-white" type="submit">CREATE APPOINTMENT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                @forelse ($appointments as $appointment)
                    <div class="col-md-4 col-lg-4 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body card-rounded">
                                <div class="wrapper d-flex align-items-center">
                                    <img src="{{ asset($appointment->doctor->photo) }}" alt=""
                                        class="img-sm rounded-circle">
                                    <div class="ms-2">
                                        <h6 class="text-primary m-0">{{ $appointment->doctor->user->name }}</h6>
                                        <p class="m-0"><i
                                                class="menu-icon mdi mdi-email me-2"></i>{{ $appointment->doctor->user->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="list align-items-center border-bottom py-2">
                                    <div class="wrapper w-100">
                                        <p class="mb-2 fw-medium">Polyclinic :
                                            {{ $appointment->doctor->polyclinic->name }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="mdi mdi-calendar text-muted me-1"></i>
                                                <p class="mb-0 text-small text-muted">
                                                    {{ Carbon\Carbon::parse($appointment->appointment_time)->format('H:i | D, d M') }}
                                                </p>
                                            </div>
                                            <span class="badge badge-warning">{{ $appointment->status }}</span>
                                        </div>
                                    </div>
                                </div>
                                @if ($appointment->status == 'diterima')
                                <button class="btn btn-success btn-sm mt-2 btn-block w-100">Temui Dokter</button>
                                @elseif ($appointment->status == 'ditolak')
                                    <button class="btn btn-danger btn-sm mt-2 btn-block w-100">Tidak disetujui</button>
                                @elseif ($appointment->status == 'selesai')
                                    <a href="{{ route('patient.healthrecord') }}" class="btn btn-success btn-sm mt-2 btn-block w-100">Cek diagnosis</a>
                                @endif
                                <form class="{{ $appointment->status == 'diterima' || $appointment->status == 'ditolak' || $appointment->status == 'selesai' ? 'd-none' : '' }}" action="{{ route('patient.appointmentdestroy', $appointment->id) }}"
                                    method="post">
                                    @csrf
                                    <button class="btn btn-danger btn-sm mt-2 btn-block w-100"
                                        type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 col-lg-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body card-rounded">
                                <h4 class="card-title card-title-dash">No Upcoming Appointments</h4>
                                <p class="card-text">You don't have any upcoming appointments.</p>
                            </div>
                        </div>
                    </div>
                @endforelse
                {!! $appointments->withQueryString()->links('vendor.pagination.mypagination') !!}
            </div>
        </div>
    @endif
@endsection

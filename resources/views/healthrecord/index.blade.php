@php
    $isDoctor = Auth::user()->role === 'doctor';
@endphp
@extends($isDoctor ? 'doctor.app' : 'patient.app')
@section('title', 'Health Record')
@section('content')
    @if ($isDoctor)

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
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <div class="btn-wrapper d-flex">
                                <a data-bs-toggle="modal" data-bs-target="#addRecord"
                                    class="btn btn-primary ms-2"><i
                                        class="menu-icon mdi mdi-application-edit-outline me-2"></i> add record</a>
                            </div>
                            <a class="btn btn-primary btn-sm ms-auto" style="cursor: pointer" data-bs-toggle="offcanvas"
                                data-bs-target="#filter">Filter</a>
                            <a class="btn btn-transparent ms-1" href="{{ route('doctor.healthrecord') }}">Reset</a>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="filter">
                                <div class="offcanvas-header">
                                    <h5 class="text-center">Filter</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">

                                    <form method="GET" action="{{ route('patient.healthrecord') }}">
                                        <div>
                                            <label for="start_date" class="form-label">Tanggal Mulai:</label>
                                            <input type="date" class="form-control" name="start_date" id="start_date"
                                                value="{{ request('start_date') }}">
                                        </div>
                                        <div>
                                            <label for="end_date" class="form-label">Tanggal Selesai:</label>
                                            <input type="date" class="form-control" name="end_date" id="end_date"
                                                value="{{ request('end_date') }}">
                                        </div>
                                        <div>
                                            <label for="diagnosis" class="form-label">Diagnosis:</label>
                                            <input type="text" class="form-control" name="diagnosis" id="diagnosis"
                                                value="{{ request('diagnosis') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="patient_id" class="form-label">Dokter:</label>
                                            <select name="patient_id" class="form-select" id="patient_id">
                                                <option value="">Semua Patient</option>
                                                @foreach ($patients as $patient)
                                                    <option value="{{ $patient->id }}"
                                                        {{ request('patient_id') == $patient->id ? 'selected' : '' }}>
                                                        {{ $patient->user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Filter</button>

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal fade" id="addRecord" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                        <div class="mb-4">
                                            <label for="patient_id" class="form-label">Patient:</label>
                                            <select name="patient_id" class="form-select" id="patient_id">
                                                @foreach ($patients as $patient)
                                                    <option value="{{ $patient->id }}"
                                                        {{ request('patient_id') == $patient->id ? 'selected' : '' }}>
                                                        {{ $patient->user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Patien </th>
                                    <th> Date </th>
                                    <th> Diagnosis </th>
                                    <th> recipient </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($healthRecords as $healthRecord)
                                    <tr>
                                        <td class="d-flex align-items-center">
                                            <img src="{{ asset($healthRecord->patient->photo) }}" class="img-sm rounded-10"
                                                alt="image">
                                            <div class="wrapper py-2 ms-2">
                                                <h6 class="m-0">{{ $healthRecord->patient->user->name }}</h6>
                                                <p class="m-0">{{ $healthRecord->patient->user->email }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <h6>{{ $healthRecord->created_at->format('D, d M Y') }}</h6>
                                            <p>{{ $healthRecord->created_at->format('H:i') }}</p>
                                        </td>
                                        <td>{{ $healthRecord->diagnosis }}</td>
                                        <td>{{ $healthRecord->recipient }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Nothing Healthy Record for now!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $healthRecords->withQueryString()->links('vendor.pagination.mypagination') !!}
                    </div>
                </div>
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
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <div class="btn-wrapper">
                                <h4 class="fw-bold">Healthy Record</h4>
                            </div>
                            <a class="btn btn-primary btn-sm ms-auto" style="cursor: pointer" data-bs-toggle="offcanvas"
                                data-bs-target="#filter">Filter</a>
                            <a class="btn btn-transparent ms-1" href="{{ route('patient.healthrecord') }}">Reset</a>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="filter">
                                <div class="offcanvas-header">
                                    <h5 class="text-center">Filter</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">

                                    <form method="GET" action="{{ route('patient.healthrecord') }}">
                                        <div>
                                            <label for="start_date" class="form-label">Tanggal Mulai:</label>
                                            <input type="date" class="form-control" name="start_date" id="start_date"
                                                value="{{ request('start_date') }}">
                                        </div>
                                        <div>
                                            <label for="end_date" class="form-label">Tanggal Selesai:</label>
                                            <input type="date" class="form-control" name="end_date" id="end_date"
                                                value="{{ request('end_date') }}">
                                        </div>
                                        <div>
                                            <label for="diagnosis" class="form-label">Diagnosis:</label>
                                            <input type="text" class="form-control" name="diagnosis" id="diagnosis"
                                                value="{{ request('diagnosis') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="doctor_id" class="form-label">Dokter:</label>
                                            <select name="doctor_id" class="form-select" id="doctor_id">
                                                <option value="">Semua Dokter</option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}"
                                                        {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                                        {{ $doctor->user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Filter</button>

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Diagnosis </th>
                                    <th> recipient </th>
                                    <th> Doctor </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($healthRecords as $healthRecord)
                                    <tr>
                                        <td>
                                            <h6>{{ $healthRecord->created_at->format('D, d M Y') }}</h6>
                                            <p>{{ $healthRecord->created_at->format('H:i') }}</p>
                                        </td>
                                        <td>{{ $healthRecord->diagnosis }}</td>
                                        <td>{{ $healthRecord->recipient }}</td>
                                        <td class="d-flex align-items-center">
                                            <img src="{{ asset($healthRecord->doctor->photo) }}"
                                                class="img-sm rounded-10" alt="image">
                                            <div class="wrapper py-2 ms-2">
                                                <h6 class="m-0">{{ $healthRecord->doctor->user->name }}</h6>
                                                <p class="m-0">{{ $healthRecord->doctor->user->email }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Nothing Healthy Record for now!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $healthRecords->withQueryString()->links('vendor.pagination.mypagination') !!}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

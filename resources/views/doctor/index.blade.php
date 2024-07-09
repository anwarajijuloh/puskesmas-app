@extends('doctor.app')
@section('title', 'Dashboard Dokter')
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
        {{-- {{ $totalAttendance }} --}}
        {{-- {{ $attendanceThisMonth }} --}}
        {{-- {{ $attendanceLastMonth }} --}}
        {{-- {{ $latestAppointments }} --}}
        {{-- {{ $latestDiagnoses }} --}}
        <div class="d-flex flex-wrap">
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-rounded">
                        <div class="p-3 align-items-center justify-content-center">
                            <div class="text-center w-100">
                                <div class="badge badge-opacity-danger align-items-center py-3 d-flex">
                                    <h5 class="m-0">Today</h5>
                                    <h5 class="m-0 ms-auto">{{ \Carbon\Carbon::today()->format('D, d M Y') }}</h5>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Attend In</th>
                                            <th>Attend Out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($attendanceToday as $attendance)
                                            <tr>
                                                <td>{{ $attendance->check_in_time }}</td>
                                                <td>{{ $attendance->check_out_time }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>--:--</td>
                                                <td>--:--</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('attendance.check-in') }}" class="btn btn-success">Attend Masuk</a>
                                <a href="{{ route('attendance.check-out') }}" class="btn btn-danger">Attend Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-md-2 col-sm-12">
                <div class="card">
                    <div class="card-rounded">
                        <div class="card-body">
                            <div class="badge-opacity-success p-3 text-center">
                                <h4 class="m-0">Total Attendance</h4>
                            </div>

                            <div class="col-12 d-flex mt-4 justify-content-evenly">
                                <div class="text-center">
                                    <p>All Month</p>
                                    <h2>{{ $totalAttendance }}</h2>
                                </div>
                                <div class="text-center">
                                    <p>This Month</p>
                                    <h2>{{ $attendanceThisMonth }}</h2>
                                </div>
                                <div class="text-center">
                                    <p>Last Month</p>
                                    <h2>{{ $attendanceLastMonth }}</h2>
                                </div>
                            </div>
                            <div class="col-12 badge-opacity-warning border-bottom py-1 mt-4">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-rounded">
                        <div class="card-body">
                            <div class="badge-opacity-primary d-flex align-items-center justify-content-between p-3 text-center">
                                <h4 class="m-0">Latest Appointments</h4>
                                <a class="btn btn-primary" href="{{ route('doctor.appointment') }}">Go Appointment</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Dokter</th>
                                            <th>Status</th>
                                            <th>Pasien</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($latestAppointments as $appointment)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('D, d M Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="{{ asset($appointment->doctor->photo) }}" alt="">
                                                        <div class="ms-2">
                                                            <h6 class="m-0">{{ $appointment->doctor->user->name }}</h6>
                                                            <p class="text-muted m-0">
                                                                ({{ $appointment->doctor->polyclinic->name }})</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="badge badge-opacity-warning">
                                                        {{ $appointment->status }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="{{ asset($appointment->patient->photo) }}" alt="">
                                                        <div class="ms-2">
                                                            <h6 class="m-0">{{ $appointment->patient->user->name }}</h6>
                                                            <p class="text-muted m-0">
                                                                {{ $appointment->patient->user->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada antrian</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-rounded">
                        <div class="card-body">
                            <div class="badge-opacity-warning d-flex align-items-center justify-content-between p-3 text-center">
                                <h4 class="m-0">Latest Diagnoses</h4>
                                <a class="btn btn-warning" href="{{ route('doctor.healthrecord') }}">Go Record</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Pasien</th>
                                            <th>Diagnosa</th>
                                            <th>Resep</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($latestDiagnoses as $diagnosis)
                                            <tr>
                                                <td>{{ $diagnosis->created_at->format('D, d M Y') }}</td>
                                                <td>{{ $diagnosis->created_at->format('H:i') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="{{ asset($diagnosis->patient->photo) }}" alt="">
                                                        <div class="ms-2">
                                                            <h6 class="m-0">{{ $diagnosis->patient->user->name }}</h6>
                                                            <p class="text-muted m-0">
                                                                {{ $diagnosis->patient->user->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-wrap">{{ $diagnosis->diagnosis }}</td>
                                                <td class="text-wrap">{{ $diagnosis->recipient }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada penyakit</td>
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
    </div>
@endsection

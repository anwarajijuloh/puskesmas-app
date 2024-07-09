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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex ms-auto">
                            <a href="{{ route('attendance.check-in') }}" class="btn btn-success">Attend Masuk</a>
                            <a href="{{ route('attendance.check-out') }}" class="btn btn-danger ms-2">Attend Keluar</a>
                            <h3 class="ms-auto">{{ $currentTime }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Doctor</th>
                                    <th>Date</th>
                                    <th>Check-in Time</th>
                                    <th>Check-out Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $attendance->doctor->user->name }}</td>
                                        <td>{{ $attendance->date }}</td>
                                        <td>{{ $attendance->check_in_time }}</td>
                                        <td>{{ $attendance->check_out_time }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $attendances->withQueryString()->links('vendor.pagination.mypagination') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

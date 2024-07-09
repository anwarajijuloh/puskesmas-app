@extends('patient.app')
@section('title', 'Dashboard Patient')
@section('content')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex align-items-center justify-content-between py-2">
                    <h4 class="fw-bold">Antrian pada {{ Carbon\Carbon::parse($date)->format('D, d M Y') }}</h4>
                    <form class="d-flex" action="{{ route('patient.dashboard') }}" method="get">
                        <div class="me-2">
                            <input type="date" class="form-control" name="date" value="{{ $date }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
                <div class="statistics-details d-flex align-items-center justify-content-between">
                    @foreach ($polyclinics as $poli)
                        <div>
                            <p class="statistics-title">{{ $poli->name }}</p>
                            <h3 class="rate-percentage">
                                @php
                                    $queue_count =
                                        $availability->where('polyclinic_id', $poli->id)->first()->queue_count ?? 0;
                                    $queue_percentage = ($queue_count / 5) * 100;
                                    $percent = round($queue_percentage, 2);
                                @endphp
                                {{ $queue_count }} <small class="fs-xs">Queue</small>
                            </h3>
                            <p class="text-{{ $queue_count < 5 ? 'success' : 'danger' }} d-flex"><i
                                    class="mdi mdi-circle"></i><span>{{ $queue_count < 5 ? "Terisi $percent %" : "Penuh $percent %" }}</span>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-4 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h4 class="card-title card-title-dash">Top Appointment Doctor</h4>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    @foreach ($mostPopularDoctors as $mostPopularDoctor)
                                        <div
                                            class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                            <div class="d-flex align-items-center">
                                                <img class="img-sm rounded-10" src="{{ asset($mostPopularDoctor->photo) }}"
                                                    alt="profile">
                                                <div class="wrapper ms-3">
                                                    <h6 class="fw-bold">{{ $mostPopularDoctor->name }}</h6>
                                                </div>
                                            </div>
                                            <div class="text-muted text-small badge badge-success">
                                                {{ $mostPopularDoctor->total_appointments }} Appoint </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title card-title-dash">Recent Created Queue</h4>
                                <p class="card-subtitle card-subtitle-dash">Importan for come to Puskesmas</p>
                            </div>
                        </div>
                        <div class="table-responsive  mt-1">
                            <table class="table select-table">
                                <thead>
                                    <tr>
                                        <th>Queue</th>
                                        <th>Doctor</th>
                                        <th>Poli</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($latestQueues as $latestQueue)
                                        <tr>
                                            <td>
                                                <div class="badge badge-opacity-warning">{{ Carbon\Carbon::parse($latestQueue->queued_at)->format('D, d M') }}</div>
                                                <div class="badge badge-opacity-danger">{{ Carbon\Carbon::parse($latestQueue->queued_at)->format('H:i') }}</div>
                                            </td>
                                            <td>
                                                <div class="d-flex ">
                                                    <img src="{{ asset($latestQueue->doctor_photo) }}" alt="">
                                                    <div>
                                                        <h6>{{ $latestQueue->doctor_name }}</h6>
                                                        <p>{{ $latestQueue->doctor_email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6>{{ $latestQueue->polyclinic_name }}</h6>
                                            </td>
                                            <td>
                                                <div>
                                                    <img src="{{ asset($latestQueue->patient_photo) }}" alt="">
                                                </div>
                                            </td>
                                            
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No data available</td>
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
@endsection

@php
    $isDoctor = Auth::user()->role === 'doctor';
@endphp
@extends($isDoctor ? 'doctor.app' : 'patient.app')
@section('title', 'Profile')
@section('content')
    @if ($isDoctor)
        <div class="col-sm-12">
            <div class="card">
                <div class="card-rounded">
                    <div class="card-header text-center">
                        <img src="{{ asset('assets/images/pusk-logo.svg') }}" class="img-logo py-2" alt="">
                        <h2 class="fw-bold text-primary">PATIENT INFORMATION</h2>
                    </div>
                    <div class="card-body d-flex px-5 align-items-center">
                        <table class="fw-semibold">
                            <tr>
                                <td class="py-2">Name</td>
                                <td class="ps-5"> : {{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="py-2">Email</td>
                                <td class="ps-5"> : {{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="py-2">Polyclinic</td>
                                <td class="ps-5"> : {{ $user->doctor->polyclinic->name }}</td>
                            </tr>
                        </table>
                        <div class="ms-auto text-center">
                            <img src="{{ asset($user->doctor->photo) }}" class="img-lg mb-2 rounded-20" alt="">
                            <h2 class="fm-signature">{{ $user->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-sm-12">
            <div class="card">
                <div class="card-rounded">
                    <div class="card-header text-center">
                        <img src="{{ asset('assets/images/pusk-logo.svg') }}" class="img-logo py-2" alt="">
                        <h2 class="fw-bold text-primary">PATIENT INFORMATION</h2>
                    </div>
                    <div class="card-body d-flex px-5 align-items-center">
                        <table class="fw-semibold">
                            <tr>
                                <td class="py-2">Name</td>
                                <td class="ps-5"> : {{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="py-2">Email</td>
                                <td class="ps-5"> : {{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="py-2">Address</td>
                                <td class="ps-5"> : {{ $user->patient->address }}</td>
                            </tr>
                            <tr>
                                <td class="py-2">Birth Date</td>
                                <td class="ps-5"> : {{ $user->patient->dob }}</td>
                            </tr>
                            <tr>
                                <td class="py-2">Gender</td>
                                <td class="ps-5"> : {{ $user->patient->gender }}</td>
                            </tr>
                        </table>
                        <div class="ms-auto text-center">
                            <img src="{{ asset($user->patient->photo) }}" class="img-lg mb-2 rounded-20" alt="">
                            <h2 class="fm-signature">{{ $user->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

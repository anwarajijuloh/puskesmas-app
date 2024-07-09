@php
    $isDoctor = Auth::user()->role === 'doctor';
@endphp
@extends($isDoctor ? 'doctor.app' : 'patient.app')
@section('title', 'Setting')
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
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-rounded">
                            <div class="card-body">
                                <h5 class="card-title">Update Information</h5>
                                <form action="{{ route('patient.updateProfile') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-4">
                        <div class="card-rounded">
                            <div class="card-body">
                                <h5 class="card-title">Change Photo</h5>
                                <form action="{{ route('patient.updatePhoto') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <img src="{{ asset(Auth::user()->doctor->photo) }}" class="img-sm rounded-10 mb-2" alt="">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control" id="photo" name="photo">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Change Photo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-rounded">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                                <form action="{{ route('patient.updatePassword') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">New Password</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Password</button>
                                </form>
                            </div>
                        </div>
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
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-rounded">
                            <div class="card-body">
                                <h5 class="card-title">Update Information</h5>
                                <form action="{{ route('patient.updateProfile') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-select" id="gender" name="gender">
                                            <option selected>Select Gender</option>
                                            <option value="Laki-laki"
                                                {{ old('gender', $patient->gender) == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="Perempuan"
                                                {{ old('gender', $patient->gender) == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Date Born</label>
                                        <input type="date" class="form-control" id="dob" name="dob"
                                            value="{{ Auth::user()->dob ? Auth::user()->dob->format('Y-m-d') : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $patient->address) }}"</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-4">
                        <div class="card-rounded">
                            <div class="card-body">
                                <h5 class="card-title">Change Photo</h5>
                                <form action="{{ route('patient.updatePhoto') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <img src="{{ asset($patient->photo) }}" class="img-sm rounded-10 mb-2"
                                        alt="">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control" id="photo" name="photo">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Change Photo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-rounded">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                                <form action="{{ route('patient.updatePassword') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">New Password</label>
                                        <input type="password" class="form-control" id="new_password"
                                            name="new_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    @endif

@endsection

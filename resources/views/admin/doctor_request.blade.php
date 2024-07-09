@extends('admin.app')
@section('title', 'Doctor Update Request')
@section('content')
    <div class="container">
        <h1>Pengajuan Update Profil Dokter</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Poliklinik</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td>{{ $request->name }}</td>
                        <td>{{ $request->email }}</td>
                        <td>{{ $request->polyclinic->name }}</td>
                        <td>{{ $request->status }}</td>
                        <td>
                            @if ($request->status == 'pending')
                                <form action="{{ route('admin.doctor-request.approve', $request->id) }}"
                                    method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form action="{{ route('admin.doctor-request.reject', $request->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

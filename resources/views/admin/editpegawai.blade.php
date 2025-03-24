@extends('templates.mainAdmin')
@section('content')

{{-- <div class="main">
    <div class="main-content dashboard">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pegawai.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">Nama User</label>
                                <input class="form-control" name="name" placeholder="Masukan Nama..." value="{{ old('name', $user->name) }}">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">Pilih Role:</label>
                                <select name="role_id" class="form-control custom-select select2 select2-hidden-accessible">
                                    <option label="Pilih Role"></option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">Department / Akses:</label>
                                <select name="akses_poli_id" class="form-control custom-select select2 select2-hidden-accessible">
                                    <option label="Pilih Akses Poli"></option>
                                    @foreach ($polis as $value)
                                    <option value="{{ $value->id }}" {{ $user->akses_poli_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">Email:</label>
                                <input class="form-control" name="email" placeholder="Email..." value="{{ old('email', $user->email) }}">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">Password:</label>
                                <input class="form-control" name="password" placeholder="Password...">
                                <small>Biarkan kosong jika tidak ingin mengubah password</small>
                            </div>
                        </div>

                        <div class="gr-btn">
                            <button type="submit" class="btn btn-primary btn-lg fs-16">UPDATE</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> --}}
{{-- @dd($roles) --}}


<div class="main">
    <div class="main-content dashboard me-2">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pegawai.update', $user->id) }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="main-title mx-3 my-4">
    Edit Pegawai
</div>
<div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 mb-24">
                <div class="form-group">
                    <label class="form-label">Nama User</label>
                    <input class="" name="name" placeholder="Masukan Nama..." value="{{ old('name', $user->name) }}">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 mb-24">
                <div class="form-group">
                    <label class="form-label">Email:</label>
                    <input class="" name="email" placeholder="Email..." value="{{ old('email', $user->email) }}">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 mb-24">
                <div class="form-group">
                    <label class="form-label">Password:</label>
                    <input class="" name="password" placeholder="pass.." value="{{ old('password', $user->password) }}">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 mb-24">
                <div class="form-group">
                    <label class="form-label">Tambah Foto Dokter (Opsional):</label>
                    <input type="file" class="form-control file-input" placeholder="Pilih" name="foto">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 mb-24">
                <div class="form-group">
                    <label class="form-label">Pilih Role:</label>
                    <select name="role_id" class="form-control custom-select select2 select2-hidden-accessible">
                        <option label="Pilih Role"></option>

                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 mb-24">
                <div class="form-group">
                    <label class="form-label">Department / Akses:</label>
                    <select name="akses_poli_id" class="form-control custom-select select2 select2-hidden-accessible">
                        <option label="Pilih Akses Poli"></option>
                        @foreach ($polis as $value)
                        <option value="{{ $value->id }}" {{ $user->akses_poli_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="gr-btn">
                <button type="submit" class="btn btn-primary btn-lg fs-16">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
</form>

    </div>
</div>
    @endsection

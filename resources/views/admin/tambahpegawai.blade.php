@extends('templates.mainAdmin')
@section('content')



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
        <form action="{{ route('admin.tambahpegawai') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="main-title mx-3 my-4">
        Tambah Pegawai
    </div>
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-24">
                    <div class="form-group">
                        <label class="form-label">Nama User</label>
                        <input class="" name="name" placeholder="Masukan Nama...">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 mb-24">
                    <div class="form-group">
                        <label class="form-label">Email:</label>
                        <input class="" name="email" placeholder="Email..">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 mb-24">
                    <div class="form-group">
                        <label class="form-label">Password:</label>
                        <input class="" name="password" placeholder="pass..">
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
                        <select name="role_id" data-placeholder="Select Client" tabindex="-1" aria-hidden="true">
                            <option label="Pilih Role" data-select2-id="select2-data-40-q3xu"></option>
                            <option value="2">Dokter</option>
                            <option value="3">Pegawai Poli</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-24">
                    <div class="form-group">
                        <label class="form-label">Department / Akses:</label>
                        <select name="akses_poli_id" data-placeholder="" tabindex="-1" aria-hidden="true">
                            <option label="Pilih Akses Poli" data-select2-id="select2-data-24-ktnv"></option>
                            @foreach ($akses as $value)
                                <option value="{{ $value->id }}">{{ $value->nama_poli }}</option>
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

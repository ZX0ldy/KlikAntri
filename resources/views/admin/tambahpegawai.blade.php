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
        <form action="/admin/tambahpegawai/store" method="post">
        @csrf
            <div class="main-title mx-3 my-4">
                Tambah Pegawai
            </div>
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 mb-24">
                            <div class="form-group"> <label class="form-label">Nama User</label> 
                            
                             <input class="" name="name" placeholder="Masukan Nama..."> </div>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-24">
                            <div class="form-group"> <label class="form-label">Email: </label>
                                <input class="" name="email" placeholder="Email..">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-24">
                            <div class="form-group"> <label class="form-label">Password: </label>
                                <input class="" name="password" placeholder="pass..">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">Tambah Foto Dokter (Opsional) : </label>
                                <input type="file" class="form-control file-input" placeholder="Pilih">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-24">
                            <div class="form-group"> <label class="form-label">Pilih Role:</label>
                            <select name="role_id"  data-placeholder="Select Client" tabindex="-1" aria-hidden="true" data-select2-id="select2-data-38-9jkg">
                                <option label="Pilih Role" data-select2-id="select2-data-40-q3xu"></option> 
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-39-684b" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-attendance-8z-container" aria-controls="select2-attendance-8z-container"><span class="select2-selection__rendered" id="select2-attendance-8z-container" role="textbox" aria-readonly="true" title="Enter Client"></span>
                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                            </span>
                            </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 mb-24">

                            <div class="form-group"> <label class="form-label">Department / Akses:</label>
                            <select name="akses_poli_id"  data-placeholder="" tabindex="-1" aria-hidden="true" data-select2-id="select2-data-22-9i9m">
                            <option label="Pilih Akses Poli" data-select2-id="select2-data-24-ktnv">
                            </option> 
                           
                            @foreach ($akses as $value)
                                <option value="{{ $value->id }}">{{ $value->nama_poli }}</option> 
                            @endforeach
                             </select>
                            <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-23-72at" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-attendance-92-container" aria-controls="select2-attendance-92-container"><span class="select2-selection__rendered" id="select2-attendance-92-container" role="textbox" aria-readonly="true" title="Select Department"></span>
                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                            </span>
                            </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
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
@extends('templates.mainAdmin')

@section('content')
<div class="main">
    <div class="main-content client">
        <div class="main-title py-1">
            <h1>{{ $poli->nama_poli }}</h1>
        </div>
        <div class="row">
            <div class="col-9 col-xl-9">
                <div class="box">
                    <div class="box-body">
                        <h5 class="main-title mx-3 my-1">
                            Daftar Pasien di {{ $poli->nama_poli }}
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-vcenter text-nowrap table-bordered dataTable no-footer">
                                <thead>
                                    <tr class="top">
                                        <th class="border-bottom-0 text-center sorting fs-14 font-w500">No</th>
                                        <th class="border-bottom-0 sorting fs-14 font-w500">Nomor Antrian</th>
                                        <th class="border-bottom-0 sorting_disabled fs-14 font-w500">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through patients in this poli -->
                                    @foreach($poli->patients as $patient)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $patient->nomor_antrian }}</td>
                                        <td>
                                            <button class="btn btn-primary"><i class='bx bx-edit'></i> Panggil</button>
                                        </td>
                                    </tr>
                                    @endforeach
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

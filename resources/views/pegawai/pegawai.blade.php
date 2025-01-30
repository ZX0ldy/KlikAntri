@extends('templates.mainPegawai')

@section('content')


    <div class="main">
        <div class="main-content client">
            <div class="main-title">
                Antrian Poli Gigi
            </div>
            <div class="row flex-wrap">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="box client">
                        <div class="box-body pt-5 pb-0">
                            <div class="row justify-content-end">
                                <!-- Menggunakan justify-content-end di sini -->
                                <div class="col">
                                    <ul class="card-list">
                                        <li class="custom-label" id="on-status"><span></span>Active</li>
                                    </ul>
                                    <h3 class="mt-17">Dokter 1</h3>
                                    <p class="fs-14 font-w400 font-main">Poli Gigi</p>
                                </div>
                                <div class="col text-center">
                                    <div class="antrian">
                                        <p>Nomor antrian</p>
                                        <h3>R001</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="box client">
                        <div class="box-body pt-5 pb-0">
                            <div class="row justify-content-end">
                                <!-- Menggunakan justify-content-end di sini -->
                                <div class="col">
                                    <ul class="card-list">
                                        <li class="custom-label" id="avail-status"><span></span>Available</li>
                                    </ul>
                                    <h3 class="mt-17">Dokter 2</h3>
                                    <p class="fs-14 font-w400 font-main">Poli Gigi</p>
                                </div>
                                <div class="col text-center">
                                    <div class="antrian">
                                        <p>Nomor antrian</p>
                                        <h3>-</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="box client">
                        <div class="box-body pt-5 pb-0">
                            <div class="row justify-content-end">
                                <!-- Menggunakan justify-content-end di sini -->
                                <div class="col">
                                    <ul class="card-list">
                                        <li class="custom-label" id="off-status"><span></span>Inactive</li>
                                    </ul>
                                    <h3 class="mt-17">Dokter 3</h3>
                                    <p class="fs-14 font-w400 font-main">Poli Gigi</p>
                                </div>
                                <div class="col text-center">
                                    <div class="antrian">
                                        <p>Nomor antrian</p>
                                        <h3>-</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <hr>
                <div class="row">
                    <div class="col-9 col-xl-9">
                        <div class="box">
                            <div class="box-body">
                                <h5 class="main-title mx-3 my-1">
                                    Daftar Pasien
                                </h5>
                                <div class="table-responsive">
                                    <div id="task-profile_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <!-- <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="task-profile_length"><label>Show <select name="task-profile_length" aria-controls="task-profile" class="form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="task-profile_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="task-profile"></label></div>
                                        </div>
                                    </div> -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <table
                                                    class="table table-vcenter text-nowrap table-bordered dataTable no-footer"
                                                    id="task-profile" role="grid">
                                                    <thead>
                                                        <tr class="top">
                                                            <th class="border-bottom-0 text-center sorting fs-14 font-w500"
                                                                tabindex="0" aria-controls="task-profile" rowspan="1"
                                                                colspan="1" style="width: 145.391px;">No</th>
                                                            <th class="border-bottom-0 sorting fs-14 font-w500"
                                                                tabindex="0" aria-controls="task-profile" rowspan="1"
                                                                colspan="1" style="width: 145.391px;">Nomor Antrian</th>
                                                            <th class="border-bottom-0 sorting_disabled fs-14 font-w500"
                                                                rowspan="1" colspan="1" style="width: 145.391px;">
                                                                Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td>G024</td>

                                                            <td>
                                                                <button class="btn btn-primary"><i
                                                                        class='bx bx-edit'></i>
                                                                    Panggil</button>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">2</td>
                                                            <td>G025</td>

                                                            <td>
                                                                <button class="btn btn-primary"><i
                                                                        class='bx bx-edit'></i>
                                                                    Panggil</button>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-xl-3">
                        <div class="box left-dot pt-39 mb-30">
                            <div class="box-header  border-0 ">
                                <div class="box-title fs-20 font-w600">Proses Pasien</div>
                            </div>
                            <div class="box-body pt-16 user-profile">
                                <div class="table-responsive">
                                    <table class="table mb-0 mw-100 color-span">
                                        <tbody>
                                            <tr>
                                                <td class="py-2 px-0"> <span class="w-50">Nomor Antrian</span> </td>
                                                <td>:</td>
                                                <td class="py-2 px-0"> <span class="">G021</span> </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-0"> <span class="w-50">Poli</span> </td>
                                                <td>:</td>
                                                <td class="py-2 px-0"> <span class="">Gigi</span> </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-0"> <span class="w-50">Loket</span> </td>
                                                <td>:</td>
                                                <td class="py-2 px-0"> <span class="">1</span> </td>
                                            </tr>
                                            <tr>
                                                <button class="btn btn-outline-warning my-2" id="akhiriButton">Akhiri
                                                    Antrian</button>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->

     </div>
     @endsection
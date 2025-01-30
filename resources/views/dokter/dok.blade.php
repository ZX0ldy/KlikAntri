@extends('templates.mainDokter')

@section('content')


    <!-- Modal Rujukan -->
    <div class="modal fade" id="rujukanModal" tabindex="-1" aria-labelledby="rujukanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg d-flex justify-content-center align-items-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title main-title py-3" id="rujukanModalLabel">Rujukan</h3>
                </div>
                <div class="modal-body">
                    <!-- Nomor Pasien -->
                    <p class="text-start">Nomor Pasien</p>
                    <input type="text" id="nomorPasien" placeholder="Masukkan nomor pasien">

                    <!-- Poli Sebelumnya -->
                    <p class="text-start mt-3">Poli Sebelumnya</p>
                    <input type="text" id="poliSebelumnya" placeholder="Masukkan poli sebelumnya">

                    <!-- Poli Rujukan -->
                    <p class="text-start mt-3">Poli Rujukan</p>
                    <select name="poli-rujukan" id="poliRujukan">
                        <option value="PoliUmum">Poli Umum</option>
                        <option value="PoliSaraf">Poli Saraf</option>
                        <option value="PoliAnak">Poli Anak</option>
                        <option value="PoliMata">Poli Mata</option>
                        <option value="PoliParu">Poli Paru</option>
                        <option value="PoliKulit">Poli Kulit</option>
                        <option value="PoliBedah">Poli Bedah</option>
                    </select>
                </div>
                <div class="modal-footer gr-btn justify-content-start">
                    <button type="button" class="btn btn-primary" id="submitButton">Submit</button>
                </div>
            </div>
        </div>
    </div>

  

    <!-- MAIN CONTENT -->

    <div class="main">
        <div class="main-content client">
            <div class="main-title py-1">
            </div>
            <div class="row">
                <div class="col-9 col-xl-9">
                    <div class="box">
                        <div class="box-body">
                            <h5 class="main-title mx-3 my-1">
                                Daftar Pasien
                            </h5>
                            <div class="table-responsive text-center">
                                <div id="task-profile_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <!-- <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="task-profile_length"><label>Show <select name="task-profile_length" aria-controls="task-profile" class="form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="task-profile_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="task-profile"></label></div>
                                    </div>
                                </div> -->
                                    <!-- Tabel 1 -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table
                                                class="table table-vcenter text-nowrap table-bordered dataTable no-footer"
                                                id="task-profile" role="grid">
                                                <thead>
                                                    <tr class="top">
                                                        <th class="border-bottom-0 text-center sorting fs-14 font-w500"
                                                            tabindex="0" aria-controls="task-profile" rowspan="1"
                                                            colspan="1">No</th>
                                                        <th class="border-bottom-0 text-center sorting fs-14 font-w500"
                                                            tabindex="0" aria-controls="task-profile" rowspan="1"
                                                            colspan="1">Nomor Antrian</th>
                                                        <th class="border-bottom-0 text-center sorting_disabled fs-14 font-w500"
                                                            rowspan="1" colspan="1">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td>G024</td>
                                                        <td>
                                                            <button class="btn btn-panggil"><i
                                                                    class='bx bx-user-voice'></i> Panggil</button>
                                                            <button class="btn btn-rujukan" data-bs-toggle="modal"
                                                                data-bs-target="#rujukanModal" id="open-modal-1"><i
                                                                    class='bx bxs-user-voice'></i> Rujukan</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td>G025</td>
                                                        <td>
                                                            <button class="btn btn-panggil"><i
                                                                    class='bx bx-user-voice'></i> Panggil</button>
                                                            <button class="btn btn-rujukan"
                                                                data-bs-target="#rujukanModal"><i
                                                                    class='bx bxs-user-voice'></i> Rujukan</button>
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
                                <table class="table table-white mb-0 mw-100">
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
                                            <button class="btn btn-outline-danger my-2" id="akhiriButton">Akhiri
                                                Antrian</button>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <hr>
            <!-- Tabel 2 -->
            <div class="row">
                <div class="col-9 col-xl-9">
                    <div class="box">
                        <div class="box-body">
                            <h5 class="main-title mx-3 my-1">
                                Daftar Pasien Rujukan
                            </h5>
                            <div class="table-responsive text-center">
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
                                                            colspan="1">No</th>
                                                        <th class="border-bottom-0 text-center sorting fs-14 font-w500"
                                                            tabindex="0" aria-controls="task-profile" rowspan="1"
                                                            colspan="1">Nomor Antrian</th>
                                                        <th class="border-bottom-0 text-center sorting_disabled fs-14 font-w500"
                                                            rowspan="1" colspan="1">
                                                            Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td>G024</td>
                                                        <td>
                                                            <button class="btn btn-panggil"><i
                                                                    class='bx bx-user-voice'></i>
                                                                Panggil</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td>G025</td>

                                                        <td>
                                                            <button class="btn btn-panggil"><i
                                                                    class='bx bx-user-voice'></i>
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
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->

    
@extends('templates.mainAdmin')
@section('content')

    <!-- MAIN CONTENT -->
    <div class="main">
        <div class="main-content user">
            <div class="row">
                <div class="col-9 col-xl-12">
                
                    <div class="box">
                        <div class="box-body">
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
                                        <div class="col-sm-12">
                                            <table class="table table-vcenter text-nowrap table-bordered dataTable no-footer" id="task-profile" role="grid">
                                                <thead>
                                                    <tr class="top">
                                                        <th class="border-bottom-0 text-center sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 26.6562px;">No</th>
                                                        <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 222.312px;">Nama</th>
                                                        <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 84.8281px;">Role</th>
                                                        <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 87.9844px;">Ditempatkan Di Poli </th>
                                                        <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 87.9844px;">Email</th>
                                                        <th class="border-bottom-0 sorting_disabled fs-14 font-w500" rowspan="1" colspan="1" style="width: 145.391px;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai as $worker)
                                                    <tr>
                                                      <td>{{ $loop->iteration }}</td>  
                                                      <td>{{ $worker->name }}</td>  
                                                      <td>{{ $worker->role->name }}</td>  
                                                      <td>{{ $worker->akses->nama_poli }}</td>  
                                                      <td>{{ $worker->email }}</td>  
                                                      <td>
                                                        <div class="d-flex gap-2">
                                                            <!-- Tombol Edit -->
                                                            <a href="/pegawai/{{ $worker->id }}" class="btn btn-primary">
                                                                <i class='bx bx-edit'></i>
                                                            </a>
                                                            
                                                            <!-- Form Delete -->
                                                            <form action="{{ route('pegawai.destroy', $worker->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-danger delete-btn">
                                                                    <i class='bx bxs-trash'></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="task-profile_info" role="status" aria-live="polite">Showing 1 to 8 of 8 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="task-profile_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="task-profile_previous"><a href="#" aria-controls="task-profile" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="task-profile" data-dt-idx="1" tabindex="0" class="page-link">01</a></li>
                                                    <li class="paginate_button page-item active"><a href="#" aria-controls="task-profile" data-dt-idx="1" tabindex="0" class="page-link">02</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="task-profile" data-dt-idx="1" tabindex="0" class="page-link">03</a></li>
                                                    <li class="paginate_button page-item next disabled" id="task-profile_next"><a href="#" aria-controls="task-profile" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-xl-12">
                    <div class="box left-dot pt-39 mb-30">
                        <div class="box-header  border-0 ">
                            <div class="box-title fs-20 font-w600">Info User</div>
                        </div>
                        <div class="box-body pt-16 user-profile">
                            <div class="table-responsive">
                                <table class="table mb-0 mw-100 color-span">
                                    <tbody>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Role</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">Admin</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Nama</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">UPKMBudiono</span> </td>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Phone Number</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">+11 05986 2359 03</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Status</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="badge badge-success">Active</span> </td>
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

    @endsection
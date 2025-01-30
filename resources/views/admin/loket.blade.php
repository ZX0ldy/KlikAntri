@extends('templates.mainAdmin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="main">
    <div class="main-content client">
            <div class="main-title mx-3 my-4">
                            Tambah Poli
                        </div>
    <div class="box mb-5">
    <form action="{{ route('loket.store') }}" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 mb-24">
                            <div class="form-group">
                            <label class="form-label">Nama Poli</label>
                            <input class="form-control" name="nama_poli" placeholder="Masukan Nama..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">Pilih Gambar Icon:</label>
                                <input type="file" class="form-control file-input" placeholder="Pilih">
                            </div>
                        </div>
                        <div class="gr-btn">
                          
                            <button type="submit" class="btn btn-primary btn-lg fs-16">SUBMIT</button> 
                        </div>
                    </div>
                </div>
               </form>
            </div>
    <hr>
          
            <div class="row">
            @foreach($polis as $poli)
                <div class="col-4 col-md-4 col-sm-12 mb-25">
                    <div class="box client">
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" id="deleteButton" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                            <a class="dropdown-item"  data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <a href="client-details.html"> <h5 class="mt-17">{{ $poli->nama_poli }}</h5></a>
                            <ul class="info">
                                <li class="fs-14"> <i class='bx bxs-user-rectangle'></i>+ {{ $poli->users_count }} Dokter</li>                            </ul>
                            <div class="d-flex justify-content-between">
                            <input class="switch" type="checkbox" 
                                data-id="{{ $poli->id }}"
                                {{ $poli->status == 2 ? 'checked' : '' }}
                                onchange="toggleStatus(this)">
                                <div class="gr-btn">
                                <button href="#" class="btn btn-primary h-10">Kelola</button> 
                                </div>
                              </div>
                        </div>

                    </div>
                </div>
                @endforeach
                <hr>
            </div>
        </div>
    </div>

@endsection

<script>
function toggleStatus(element) {
    const poliId = element.dataset.id;

    // Send AJAX request to toggle status
    fetch(`/poli/toggle-status/${poliId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Optional: Show success message
            toastr.success('Status berhasil diperbarui');
            console.log('Status baru:', data.new_status);
        } else {
            toastr.error('Gagal memperbarui status');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        toastr.error('Terjadi kesalahan');
    });
}

</script>
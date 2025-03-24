<div class="sidebar">
    <div class="sidebar-logo">
        <a href="index.html">
            <img src="../../../../assets/logos/logo1380.png" alt="Admin KlikAntri">
        </a>
        <div class="sidebar-close" id="sidebar-close">
            <i class='bx bx-menu'></i>
        </div>
    </div>
    <!-- SIDEBAR MENU -->
    <div class="simplebar-sc" data-simplebar>
        <ul class="sidebar-menu">
            @if(auth()->user()->role_id == 3) <!-- Role ID 3 untuk dokter -->
                <li>
                    <a href="{{ route('dokter') }}">Antrian {{ $user->poli->nama_poli }}</a>
                </li>
            @elseif(auth()->user()->role_id == 2)
            <li>

                <a href="{{ route('pegawai.jadwal') }}">
                    <i class='bx bxs-dashboard'></i>
                    Edit Jadwal
                </a>
            </li>
            <hr>
                @foreach($polis as $poli)
                    <li>
                        <a href="{{ route('pegawai.antrian_poli', $poli->id) }}">Antrian {{ $poli->nama_poli }}</a>
                    </li>
                @endforeach
                <!-- Tambahan Edit Jadwal khusus untuk role 2 -->
            @endif
        </ul>
    </div>
    <!-- END SIDEBAR MENU -->
</div>

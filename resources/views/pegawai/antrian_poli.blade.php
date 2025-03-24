@extends('templates.mainPegawai')
@section('content')
    <audio id="notif-audio" src="{{ asset('assetsAdmin/audio/notif.mp3') }}" preload="auto"></audio>
    <audio id="notif-keluar" src="{{ asset('assetsAdmin/audio/notifkeluar.mp3') }}" preload="auto"></audio>

    <div class="main">
        <div class="main-content client">
            <div class="main-title">
                Antrian {{ $poli->nama_poli }}
            </div>
            <div class="row">
                <div class="col-9 col-xl-9">
                    <div class="box">
                        <div class="box-body">

                            <div class="table-responsive">
                                <table class="table table-vcenter text-nowrap table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Antrian</th>
                                            <th>Poli</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($antrians as $antri)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $antri->nomor_antrian }}</td>
                                                <td>{{ $antri->poli->nama_poli ?? 'Tidak Diketahui' }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-call"
                                                        data-nomor="{{ $antri->nomor_antrian }}"
                                                        data-poli="{{ $antri->poli->nama_poli }}">
                                                        <i class='bx bx-edit'></i> Panggil
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if($antrians->isEmpty())
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada antrian</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
    const callButtons = document.querySelectorAll('.btn-call');
    const synth = window.speechSynthesis;
    const notifAudio = document.getElementById('notif-audio');

    notifAudio.volume = 0.5; // Atur volume suara

    function getVoice() {
        const voices = synth.getVoices();
        return voices.find(voice => voice.lang === "id-ID") || voices[0]; // Pilih suara bahasa Indonesia jika ada
    }

    callButtons.forEach(button => {
        button.addEventListener('click', () => {
            console.log("Tombol diklik!"); // Cek apakah event listener berfungsi

            const nomorAntrian = button.getAttribute('data-nomor');
            const namaPoli = button.getAttribute('data-poli');

            console.log(`Nomor: ${nomorAntrian}, Poli: ${namaPoli}`); // Debugging

            const textToSpeak = `Nomor antrian ${nomorAntrian}, menuju ke ${namaPoli}.`;

            notifAudio.play();

            notifAudio.onended = () => {
                if ('speechSynthesis' in window) {
                    const utterance = new SpeechSynthesisUtterance(textToSpeak);
                    utterance.voice = getVoice(); // Pilih suara
                    utterance.lang = "id-ID";
                    utterance.volume = 1;
                    utterance.rate = 1;
                    utterance.pitch = 1;
                    synth.speak(utterance);
                } else {
                    alert("Browser Anda tidak mendukung fitur Text-to-Speech.");
                }
            };
        });
    });

    // Tunggu beberapa saat untuk memuat daftar suara
    synth.onvoiceschanged = () => {
        getVoice();
    };
});


    </script>
@endsection

@push('scripts')
    <script>
        function panggilAntrian(id) {
            axios.post('/pegawai/panggil-antrian', { antrian_id: id })
                .then(response => {
                    if (response.data.success) {
                        alert('Antrian berhasil dipanggil');
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function akhiriAntrian(id) {
            if (confirm('Yakin ingin mengakhiri antrian ini?')) {
                axios.post('/pegawai/akhiri-antrian', { antrian_id: id })
                    .then(response => {
                        if (response.data.success) {
                            alert('Antrian berhasil diakhiri');
                            location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const callButtons = document.querySelectorAll('.btn-call');
            const synth = window.speechSynthesis;
            const notifAudio = document.getElementById('notif-audio');
            const notifKeluar = document.getElementById('notif-keluar');

            let isSpeaking = false; // Tambahkan flag untuk mengecek apakah sedang berbicara

            notifAudio.volume = 0.5;
            notifKeluar.volume = 0.5;

            function ubahKeSebutan(teks) {
                const digitKata = ["nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"];
                let hasil = [];

                for (let char of teks) {
                    if (!isNaN(char)) {
                        hasil.push(digitKata[char]); // Jika angka, ubah ke kata
                    } else {
                        hasil.push(char.toUpperCase()); // Jika huruf, tetap disebutkan sebagai huruf
                    }
                }

                return hasil.join(' ');
            }

            callButtons.forEach(button => {
                button.addEventListener('click', () => {
                    if (isSpeaking) {
                        console.log("Sedang memanggil, tunggu hingga selesai...");
                        return; // Blokir jika masih berbicara
                    }

                    const nomorAntrian = button.getAttribute('data-nomor');
                    const namaPoli = button.getAttribute('data-poli');

                    console.log(`Nomor: ${nomorAntrian}, Poli: ${namaPoli}`);

                    const nomorSebutan = ubahKeSebutan(nomorAntrian);
                    const textToSpeak = `Nomor antrian, ${nomorSebutan}. Silakan menuju ke ${namaPoli}.`;

                    isSpeaking = true; // Setel status sedang berbicara

                    notifAudio.play().then(() => {
                        notifAudio.onended = () => {
                            if ('speechSynthesis' in window) {
                                synth.cancel(); // Hentikan semua pemanggilan sebelumnya

                                const utterance = new SpeechSynthesisUtterance(textToSpeak);
                                utterance.lang = "id-ID";
                                utterance.volume = 1;
                                utterance.rate = 0.8;
                                utterance.pitch = 1;

                                utterance.onend = () => {
                                    console.log("Pemanggilan selesai, memutar notif keluar...");
                                    notifKeluar.play();
                                    isSpeaking = false; // Setel kembali agar bisa dipanggil lagi
                                };

                                synth.speak(utterance);
                            } else {
                                alert("Browser Anda tidak mendukung fitur Text-to-Speech.");
                                isSpeaking = false;
                            }
                        };
                    }).catch(error => {
                        console.error("Gagal memutar audio:", error);
                        isSpeaking = false;
                    });
                });
            });
        });

    </script>
@endpush

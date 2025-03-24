 // $(document).ready(function() {
        //     // Data awal untuk rendering pertama kali
        //     let antrians = @json($antrians);
        //     let lastCalledId = null;
        //     console.log(antrians[0].status);

        //     // Fungsi untuk update data display
        //     function updateDisplay() {
        //         if (antrians.length > 0) {
        //             // Antrian pertama
        //             $('#nomor-antrian-1').text(antrians[0].nomor_antrian);
        //             $('#ruang-antrian-1').text(antrians[0].poli.nama_poli);
        //             $('#status-badge-1').css('display', 'block');
        //             $('#status-badge-1').text(antrians[0].status.charAt(0).toUpperCase() + antrians[0].status.slice(1));
        //             $('#status-badge-1').removeClass('dipanggil dilayani')
        //                 .addClass(antrians[0].status === 'dipanggil' ? 'dipanggil' : 'dilayani');

        //             // Poli name diambil dari antrian pertama
        //             $('#poli-name').text(antrians[0].poli.nama_poli);

        //             // Antrian kedua (jika ada)
        //             if (antrians.length > 1) {
        //                 $('#nomor-antrian-2').text(antrians[1].nomor_antrian);
        //                 $('#ruang-antrian-2').text(antrians[1].poli.nama_poli);
        //                 $('#status-badge-2').css('display', 'block');
        //                 $('#status-badge-2').text(antrians[1].status.charAt(0).toUpperCase() + antrians[1].status.slice(1));
        //                 $('#status-badge-2').removeClass('dipanggil dilayani')
        //                     .addClass(antrians[1].status === 'dipanggil' ? 'dipanggil' : 'dilayani');
        //             } else {
        //                 // Reset jika tidak ada antrian kedua
        //                 $('#nomor-antrian-2').text('-');
        //                 $('#ruang-antrian-2').text('-');
        //                 $('#status-badge-2').css('display', 'none');
        //             }
        //         } else {
        //             // Reset jika tidak ada antrian
        //             $('#nomor-antrian-1').text('-');
        //             $('#ruang-antrian-1').text('-');
        //             $('#nomor-antrian-2').text('-');
        //             $('#ruang-antrian-2').text('-');
        //             $('#poli-name').text('-');
        //             $('#status-badge-1').css('display', 'none');
        //             $('#status-badge-2').css('display', 'none');
        //         }
        //     }

        //     // Panggil fungsi update display saat halaman pertama kali dimuat
        //     updateDisplay();

        //     // Jika ada antrian baru yang dipanggil, lakukan panggilan suara otomatis
        //     @if(session('is_first'))
        //     // Ini untuk antrian pertama yang dipanggil otomatis
        //     callPatient("{{ session('nomor_antrian') }}", "{{ session('poli') }}");
        //     @endif

        //     // Fungsi untuk memanggil pasien dengan audio
        //     function callPatient(nomorAntrian, namaPoli) {
        //         const textToSpeak = `Nomor antrian ${nomorAntrian}, menuju ke ${namaPoli}.`;
        //         const notifAudio = document.getElementById('notif-audio');

        //         // Fungsi rekursif untuk memanggil 3 kali
        //         function speakCall(count) {
        //             if (count > 3) return; // Berhenti setelah 3 kali

        //             notifAudio.play();

        //             notifAudio.onended = function() {
        //                 if ('speechSynthesis' in window) {
        //                     const utterance = new SpeechSynthesisUtterance(textToSpeak);
        //                     utterance.lang = "id-ID";
        //                     utterance.volume = 1;
        //                     utterance.rate = 1;
        //                     utterance.pitch = 1;

        //                     utterance.onend = function() {
        //                         // Setelah selesai berbicara, panggil lagi dengan jeda 2 detik
        //                         if (count < 3) {
        //                             setTimeout(() => {
        //                                 speakCall(count + 1);
        //                             }, 2000);
        //                         }
        //                     };

        //                     speechSynthesis.speak(utterance);
        //                 }
        //             };
        //         }

        //         // Mulai panggilan dengan hitungan 1
        //         speakCall(1);
        //     }

        //     // Refresh data secara periodik (5 detik)
        //     setInterval(function() {
        //         $.ajax({
        //             url: "{{ route('home') }}",
        //             type: "GET",
        //             dataType: "json",
        //             success: function(response) {
        //                 // Cek apakah ada antrian baru yang dipanggil
        //                 if (response.antrians.length > 0) {
        //                     const newCalledAntrian = response.antrians.find(item =>
        //                         item.status === 'dipanggil' &&
        //                         (lastCalledId === null || lastCalledId !== item.id)
        //                     );

        //                     if (newCalledAntrian) {
        //                         // Panggil dengan suara
        //                         callPatient(newCalledAntrian.nomor_antrian, newCalledAntrian.poli.nama_poli);
        //                         lastCalledId = newCalledAntrian.id;
        //                     }
        //                 }

        //                 // Update data antrian
        //                 antrians = response.antrians;

        //                 // Update tampilan
        //                 updateDisplay();
        //             },
        //             error: function(error) {
        //                 console.error("Error fetching display data:", error);
        //             }
        //         });
        //     }, 5000); // Refresh setiap 5 detik
        // });

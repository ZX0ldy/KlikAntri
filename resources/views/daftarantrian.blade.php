
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Display Antrian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        body {
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
        }

        .logo {
            height: 30px;
            margin-top: 0px;
        }

        .card-custom {
            height: 35vh;
            background: white;
            border-radius: 50px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 0px;
            position: relative;
        }

        .nomor {
            font-size: 5rem;
            font-weight: bold;
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-card {
            font-size: 1rem;
            font-weight: 500;
            color: white;
            background-color: #3749A6;
            padding: 8px;
            border-radius: 20px 20px 0 0;
        }

        .footer-card {
            font-size: 1rem;
            font-weight: 500;
            color: white;
            background-color: #3749A6;
            padding: 8px;
            border-radius: 0 0 20px 20px;
        }

        .poli {
            font-size: 4rem;
            font-weight: bold;
            background: linear-gradient(to right, #3A8EF6, #6F3AFA);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .poli-image {
            width: 100%;
            border-radius: 10px;
        }

        .poli-group {
            margin-top: -20px;
        }

            .header,
             .footer {
            background-color: #0A0E31;
            color: white;
            overflow: hidden;
            position: fixed;
            width: 100%;
            height: 40px;
            white-space: nowrap;
            z-index: 100;
        }

        .header {
            top: 0;
        }

        .footer {
            bottom: 0;
        }

        .marquee-wrapper {
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .marquee-text {
            margin-top: 5px;
            display: inline-block;
            white-space: nowrap;
            padding-left: 100%;
        }

        /* Header bergerak dari kanan ke kiri */
        .header .marquee-text {
    animation: marquee-left {{ $marqueeSpeed }}s linear infinite;
}

        @keyframes marquee-left {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }

        /* Footer bergerak dari kiri ke kanan */
       .footer .marquee-text {
    animation: marquee-right {{ $marqueeSpeed }}s linear infinite;
}

        @keyframes marquee-right {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(0); }
        }

        .marquee-text span {
            display: inline-block;
            padding: 0 10px;
        }
        .status-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .status-badge.memanggil {
            background-color: #FFC107;
            color: #000;
        }

        .status-badge.dipanggil {
            background-color: #28A745;
            color: #fff;
        }

        .pasien-info {
            font-size: 0.8rem;
            margin-top: 5px;
            color: #6c757d;
        }

        /* Animation for highlighting called number */
        .highlight-call {
            animation: highlight-pulse 2s ease-in-out infinite;
        }

        @keyframes highlight-pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); box-shadow: 0 0 15px rgba(255, 215, 0, 0.7); }
            100% { transform: scale(1); }
        }

        .audio-status {
            position: fixed;
            bottom: 10px;
            right: 10px;
            padding: 5px 10px;
            background-color: rgba(0,0,0,0.5);
            color: white;
            border-radius: 4px;
            font-size: 12px;
            z-index: 1000;
        }

        .debug-panel {
            position: fixed;
            bottom: 50px;
            right: 10px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            font-size: 12px;
            z-index: 1000;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        /* Call count indicator */
        .call-count {
            position: absolute;
            bottom: 45px;
            right: 10px;
            background-color: #FFC107;
            color: #000;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 12px;
        }

        /* Timer indicator */
        .timer {
            position: absolute;
            bottom: 45px;
            left: 10px;
            background-color: #17a2b8;
            color: white;
            border-radius: 4px;
            padding: 2px 8px;
            font-size: 12px;
            font-weight: bold;
        }
        .poli-image {
    width: 100%;
    height: auto;
    max-height: 300px;
    border-radius: 10px;
    object-fit: cover;
}

.poli-video {
    width: 100%;
    height: auto;
    max-height: 300px;
    border-radius: 10px;
    object-fit: cover;
}
    </style>
</head>

<body>
    <div class="header">
        <div class="marquee-wrapper">
            <div class="marquee-text">
                <span>{{ $marqueeText }}</span>
                <span>{{ $marqueeText }}</span>
                <span>{{ $marqueeText }}</span>
                <span>{{ $marqueeText }}</span>
                <span>{{ $marqueeText }}</span>
                <span>{{ $marqueeText }}</span>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <img src="{{ asset('assets/logos/logo1380.png') }}" alt="KlikAntri" class="logo mt-5 mb-3">
        <div class="row">
            <div class="col-md-5">
                <!-- Kartu untuk menampilkan nomor antrian terbaru -->
                <div class="card-custom mb-3 position-relative">
                    <div class="header-card">NOMOR ANTRIAN</div>
                    <div class="nomor" id="nomor-antrian-1" data-id="">-</div>
                    <div class="footer-card" id="status-badge-1">-</div>
                    <div class="call-count" id="call-count-1" style="display: none;">0</div>
                    <div class="timer" id="timer-1" style="display: none;">40s</div>
                </div>

                <!-- Kartu untuk menampilkan nomor antrian berikutnya -->
                <div class="card-custom position-relative">
                    <div class="header-card">NOMOR ANTRIAN</div>
                    <div class="nomor" id="nomor-antrian-2" data-id="">-</div>
                    <div class="footer-card" id="status-badge-2">-</div>
                </div>
            </div>
            <div class="col-md-7 text-center poli-group">
                <!-- Nama poli akan diubah secara dinamis -->
                <div class="poli" id="poli-name">-</div>
                @php
                $backgroundType = App\Models\Setting::getValue('background_type', 'image');
                $backgroundFile = App\Models\Setting::getValue('background_file', 'assets/bg/imagebg.png');
            @endphp
            @if($backgroundType == 'image')
                <img src="{{ asset('storage/' . $backgroundFile) }}" alt="Background" class="poli-image">
            @else
                <video autoplay muted loop class="poli-video">
                    <source src="{{ asset('storage/' . $backgroundFile) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="marquee-wrapper">
            <div class="marquee-text">
                <span>{{ $marqueeText }}</span>
                <span>{{ $marqueeText }}</span>
                <span>{{ $marqueeText }}</span>
                <span>{{ $marqueeText }}</span>
                <span>{{ $marqueeText }}</span>
                <span>{{ $marqueeText }}</span>
            </div>
        </div>
    </div>
    <!-- Audio elements untuk notifikasi -->
    <audio id="notif-audio" src="{{ asset('assetsAdmin/audio/notif.mp3') }}" preload="auto"></audio>
    <audio id="notif-keluar" src="{{ asset('assetsAdmin/audio/notifkeluar.mp3') }}" preload="auto"></audio>

    <!-- Status indicator (hidden by default) -->
    <div class="audio-status" id="audio-status" style="display: none;"></div>

    <!-- Debug panel -->
    <div class="debug-panel" id="debug-panel">
        <h6>Debug Panel</h6>
        <div id="debug-log">Log will appear here...</div>
        <button class="btn btn-sm btn-primary mt-2" onclick="testAudio()">Test Audio</button>
        <button class="btn btn-sm btn-danger mt-2 ml-2" onclick="clearLog()">Clear Log</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const marqueeSpeedInput = document.getElementById("marqueeSpeed");
            const previewSpeed = document.getElementById("previewMarqueeSpeed");
            const marqueeTexts = document.querySelectorAll(".marquee-text");

            function updateMarqueeSpeed() {
                let speed = marqueeSpeedInput.value; // Ambil nilai dari input
                previewSpeed.textContent = speed + "s"; // Update tampilan preview
                marqueeTexts.forEach(marquee => {
                    marquee.style.animationDuration = speed + "s"; // Terapkan perubahan
                });
            }

            // Update kecepatan saat slider digeser
            marqueeSpeedInput.addEventListener("input", updateMarqueeSpeed);

            // Jalankan sekali saat halaman dimuat untuk menerapkan nilai dari database
            updateMarqueeSpeed();
        });
    </script>

    <script>
    $(document).ready(function() {
        // Get CSRF token from meta tag
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Global variables
        let antrians = [];
        let polis = [];
        let isPlaying = false;
        let waitingForNextCall = false;
        let timerSeconds = 0;
        let timerInterval = null;
        let currentPoliIndex = 0;

        // Audio elements
        const notifAudio = document.getElementById('notif-audio');
        const notifKeluar = document.getElementById('notif-keluar');

        // Initialize by loading data
        loadData();

        // Function to load data from server
        function loadData() {
            $('#debug-log').append("<div>Loading data from server...</div>");

            $.ajax({
                url: window.location.href,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response && response.antrians && response.polis) {
                        // Gabungkan data lama dengan data baru
                        response.antrians.forEach(newAntrian => {
                            let existingIndex = antrians.findIndex(a => a.id === newAntrian.id);
                            if (existingIndex === -1) {
                                antrians.push(newAntrian); // Tambahkan jika belum ada
                            } else {
                                antrians[existingIndex] = newAntrian; // Perbarui jika sudah ada
                            }
                        });

                        polis = response.polis;

                        console.log("Updated data:", { antrians, polis });

                        updateDisplay();

                        if (!isPlaying && !waitingForNextCall) {
                            setTimeout(checkForAntriansToCall, 2000);
                        }
                    }
                },
                error: function(error) {
                    console.error("Error loading data:", error);
                }
            });
        }


        // Function to update the display with current data
        function updateDisplay() {
    const antriansByPoli = {};

    // Filter hanya yang berstatus "Memanggil"
    polis.forEach(poli => {
        antriansByPoli[poli.id] = antrians.filter(a =>
            a.poli_id === poli.id && a.status === 'Memanggil'
        ).sort((a, b) => {
            return new Date(a.created_at) - new Date(b.created_at);
        });
    });

    const poliIds = Object.keys(antriansByPoli);

    if (poliIds.length === 0) {
        $('#poli-name').text('-');
        $('#nomor-antrian-1').text('-').attr('data-id', '');
        $('#status-badge-1').text('-');
        $('#call-count-1').hide();
        $('#nomor-antrian-2').text('-').attr('data-id', '');
        $('#status-badge-2').text('-');
        return; // Keluar dari fungsi jika tidak ada antrian
    }

    // Ambil poli berdasarkan indeks yang bergantian
    currentPoliIndex = currentPoliIndex % poliIds.length;
    let selectedPoliId = poliIds[currentPoliIndex];
    let displayPoli = polis.find(p => p.id == selectedPoliId);
    let displayAntrians = antriansByPoli[selectedPoliId];

    $('#poli-name').text(displayPoli.nama_poli);

    // Update first card (current number)
    if (displayAntrians.length > 0) {
        $('#nomor-antrian-1').text(displayAntrians[0].nomor_antrian)
            .attr('data-id', displayAntrians[0].id);
        $('#status-badge-1').text(displayAntrians[0].status);
        $('#call-count-1').text(displayAntrians[0].jumlah_panggilan || 0).show();
        $('#nomor-antrian-1').addClass('highlight-call');

        // Panggil callAntrian hanya jika antrian yang ditampilkan memiliki status "Memanggil"
        if (!isPlaying && !waitingForNextCall && displayAntrians[0].status === 'Memanggil') {
            callAntrian(displayAntrians[0], displayPoli);
        }
    } else {
        // Jika tidak ada antrian, set tampilan ke default
        $('#nomor-antrian-1').text('-').attr('data-id', '');
        $('#status-badge-1').text('-');
        $('#call-count-1').hide();
        $('#nomor-antrian-1').removeClass('highlight-call');
    }

    // Update second card (next number)
    if (displayAntrians.length > 1) {
        $('#nomor-antrian-2').text(displayAntrians[1].nomor_antrian)
            .attr('data-id', displayAntrians[1].id);
        $('#status-badge-2').text(displayAntrians[1].status);
    } else {
        $('#nomor-antrian-2').text('-').attr('data-id', '');
        $('#status-badge-2').text('-');
    }

    // Increment the poli index for next update
    currentPoliIndex++;
}

        // First run immediately, then set interval
        updateDisplay();
        setInterval(updateDisplay, 15000);

        // Function to check for antrians with "Memanggil" status
        function checkForAntriansToCall() {
    if (isPlaying || waitingForNextCall) {
        setTimeout(checkForAntriansToCall, 1000);
        return;
    }

    // Cari antrian yang sedang ditampilkan di layar
    const currentAntrianId = $('#nomor-antrian-1').attr('data-id');
    const antrianToCall = antrians.find(a => a.id == currentAntrianId && a.status === 'Memanggil');

    if (antrianToCall) {
        const poli = polis.find(p => p.id === antrianToCall.poli_id);
        if (poli) {
            // Mulai proses pemanggilan
            isPlaying = true;
            callAntrian(antrianToCall, poli);
        }
    } else {
        // Tidak ada antrian untuk dipanggil, cek lagi dalam 3 detik
        setTimeout(checkForAntriansToCall, 3000);
    }
}




        // Function to call an antrian
        function callAntrian(antrian, poli) {
            // $('#debug-log').append(<div>Starting call for ${antrian.nomor_antrian} (${poli.nama_poli})</div>);
            if (isPlaying) {
        console.log("Pemanggilan sedang berjalan, mengabaikan panggilan baru.");
        return; // Keluar jika sudah ada pemanggilan yang sedang berjalan
    }

            // Set playing flag
            isPlaying = true;

            // Highlight the number being called
            $('#nomor-antrian-1').addClass('highlight-call');

            // Update status indicator
            $('#audio-status').text('Memulai panggilan...').show();

            // Prepare announcement text
            const textToSpeak = `Nomor antrian ${antrian.nomor_antrian}, silahkan menuju poli ${poli.nama_poli}.`;

            // Play notification sound
            try {
                $('#debug-log').append("<div>Playing notification sound...</div>");
                notifAudio.play()
                    .then(() => {
                        $('#debug-log').append("<div>Notification sound started playing</div>");
                    })
                    .catch(error => {
                        // $('#debug-log').append(<div class="text-danger">Error playing notification: ${error.message}</div>);
                        // If audio fails, continue to speech
                        speakAnnouncement();
                    });

                // When notification sound ends
                notifAudio.onended = function() {
                    $('#debug-log').append("<div>Notification sound finished</div>");
                    speakAnnouncement();
                };
            } catch (error) {
                // $('#debug-log').append(<div class="text-danger">Error with audio: ${error.message}</div>);
                // If there's an error with audio, try to speak anyway
                speakAnnouncement();
            }

            // Function to speak the announcement
            function speakAnnouncement() {
                $('#audio-status').text(`Memanggil nomor ${antrian.nomor_antrian}`);
                $('#debug-log').append("<div>Starting speech synthesis...</div>");

                try {
                    const utterance = new SpeechSynthesisUtterance(textToSpeak);
                    utterance.lang = "id-ID";
                    utterance.rate = 0.9;
                    utterance.volume = 1.0;

                    function updateAntrianStatus(antrianId) {
                        $.ajax({
                            url: '/daftarantri/markascalled',
                            method: 'POST',
                            data: {
                                antrian_id: antrianId,
                                _token: $('meta[name="csrf-token"]').attr('content') // Tambahkan CSRF token jika pakai Laravel
                            },
                            success: function(response) {
                                console.log("Status antrian diperbarui:", response.message);
                            },
                            error: function(error) {
                                console.error("Gagal memperbarui status antrian:", error);
                            }
                        });
                    }


                    // When speech ends
                    utterance.onend = function() {
                        $('#debug-log').append("<div>Speech completed</div>");
                        updateAntrianStatus(antrian.id);
                        // Increment call count via AJAX
                        incrementCallCount(antrian.id);
                    };

                    // Error handling for speech synthesis
                    utterance.onerror = function(event) {
                        // $('#debug-log').append(<div class="text-danger">Speech error: ${event.error}</div>);
                        // Continue even if speech fails
                        incrementCallCount(antrian.id);
                    };

                    // Start speech synthesis
                    window.speechSynthesis.speak(utterance);
                } catch (error) {
                    $('#debug-log').append(`<div class="text-danger">Speech synthesis error: ${error.message}</div>`);
                    // Continue even if speech fails
                    incrementCallCount(antrian.id);
                }
            }
        }
        // Function to increment call count
        function incrementCallCount(antrianId) {
            $('#debug-log').append(`<div>Incrementing call count for antrian ID: ${antrianId}</div>`);

            $.ajax({
                url: '/api/increment-call-count',
                method: 'POST',
                data: {
                    antrian_id: antrianId,
                    _token: csrfToken
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $('#debug-log').append(`<div>Call count updated to ${response.call_count}/3</div>`);

                        // Update local data
                        const index = antrians.findIndex(a => a.id === antrianId);
                        if (index !== -1) {
                            antrians[index].jumlah_panggilan = response.call_count;

                            // If status changed, update it
                            if (response.antrian_status && response.antrian_status !== antrians[index].status) {
                                antrians[index].status = response.antrian_status;
                            }

                            // Update display
                            updateDisplay();

                            // If we've called 3 times, play exit sound
                            if (response.call_count >= 3) {
                                playExitSound();
                            } else {
                                // Still more calls to make, release lock
                                isPlaying = false;
                                $('#audio-status').fadeOut(1000);
                            }
                        }
                    } else {
                        $('#debug-log').append(`<div class="text-danger">Error in response: ${response.message || 'Unknown error'}</div>`);
                        isPlaying = false;
                        $('#audio-status').fadeOut(1000);
                    }
                },
                error: function(error) {
                    $('#debug-log').append(`<div class="text-danger">AJAX error: ${error.status} - ${error.statusText}</div>`);
                    isPlaying = false;
                    $('#audio-status').fadeOut(1000);
                }
            });
        }

        // Function to play exit sound
        function playExitSound() {
            $('#debug-log').append("<div>Playing exit sound...</div>");
            $('#audio-status').text('Playing exit sound');

            try {
                notifKeluar.play()
                    .then(() => {
                        $('#debug-log').append("<div>Exit sound started playing</div>");
                    })
                    .catch(error => {
                        $('#debug-log').append(`<div class="text-danger">Error playing exit sound: ${error.message}</div>`);
                        startWaitingTimer();
                    });

                // When exit sound ends
                notifKeluar.onended = function() {
                    $('#debug-log').append("<div>Exit sound finished</div>");
                    startWaitingTimer();
                };
            } catch (error) {
                $('#debug-log').append(`<div class="text-danger">Error with exit audio: ${error.message}</div>`);
                 startWaitingTimer();
            }
        }

        // Function to start 40-second waiting timer
        function startWaitingTimer() {
            $('#debug-log').append("<div>Starting 40-second timer before next call</div>");
            $('#audio-status').text('Waiting for next call');

            // Set waiting flag
            waitingForNextCall = true;
            isPlaying = false;

            // Reset and show timer
            timerSeconds = 40;
            $('#timer-1').text(`${timerSeconds}s`);
            $('#timer-1').show();

            // Clear any existing timer
            if (timerInterval) {
                clearInterval(timerInterval);
            }

            // Start countdown timer
            timerInterval = setInterval(function() {
                timerSeconds--;
                $('#timer-1').text(`${timerSeconds}s`);

                if (timerSeconds <= 0) {
                    clearInterval(timerInterval);
                    $('#timer-1').hide();
                    waitingForNextCall = false;
                    $('#audio-status').fadeOut(1000);

                    // Refresh data and check for more calls
                    $('#debug-log').append("<div>Timer complete, refreshing data...</div>");
                    loadData();
                }
            }, 1000);
        }

        // Refresh data periodically when not playing or waiting
        setInterval(function() {
            if (!isPlaying && !waitingForNextCall) {
                $('#debug-log').append("<div>Performing regular data refresh...</div>");
                loadData();
            }
        }, 15000); // Every 30 seconds

        // Test audio function
        window.testAudio = function() {
            $('#debug-log').append("<div>Testing audio...</div>");

            notifAudio.play()
                .then(() => {
                    $('#debug-log').append("<div>Test audio playing</div>");
                })
                .catch(error => {
                    $('#debug-log').append(`<div class="text-danger">Test audio error: ${error.message}</div>`);
                });
        };

        // Clear log function
        window.clearLog = function() {
            $('#debug-log').empty();
            $('#debug-log').append("<div>Log cleared</div>");
        };
    });
    </script>
</body>
</html>

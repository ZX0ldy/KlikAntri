
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
    let lastCalledAntrianId = null;
    let lastRefreshTime = Date.now();

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
                    // Clear old antrians list and replace with fresh data
                    antrians = response.antrians;
                    polis = response.polis;

                    console.log("Updated data:", { antrians, polis });
                    $('#debug-log').append("<div>Data refreshed successfully</div>");

                    updateDisplay();

                    // Check for new antrians to call only if not currently playing or waiting
                    if (!isPlaying && !waitingForNextCall) {
                        checkForAntriansToCall();
                    }
                }
            },
            error: function(error) {
                console.error("Error loading data:", error);
                $('#debug-log').append(`<div class="text-danger">Failed to load data: ${error.statusText}</div>`);
            }
        });
    }

    // Function to update the display with current data
    function updateDisplay() {
        // Get only antrians with "Memanggil" status, sorted by ID (sequential order)
        const activeAntrians = antrians.filter(a => a.status === 'Memanggil')
            .sort((a, b) => a.id - b.id);

        $('#debug-log').append(`<div>Found ${activeAntrians.length} active antrians with "Memanggil" status</div>`);

        // If no active antrians, clear the display
        if (activeAntrians.length === 0) {
            $('#poli-name').text('-');
            $('#nomor-antrian-1').text('-').attr('data-id', '').removeClass('highlight-call');
            $('#status-badge-1').text('-');
            $('#call-count-1').hide();
            $('#timer-1').hide();
            $('#nomor-antrian-2').text('-').attr('data-id', '');
            $('#status-badge-2').text('-');
            return;
        }

        // Group active antrians by poli
        const antriansByPoli = {};
        activeAntrians.forEach(antrian => {
            if (!antriansByPoli[antrian.poli_id]) {
                antriansByPoli[antrian.poli_id] = [];
            }
            antriansByPoli[antrian.poli_id].push(antrian);
        });

        // Get poli IDs that have active antrians
        const poliIds = Object.keys(antriansByPoli);

        // If no polis have active antrians, keep the display empty
        if (poliIds.length === 0) {
            return;
        }

        // Get the first antrian's poli (oldest one by ID)
        const firstPoliId = activeAntrians[0].poli_id;
        const currentPoli = polis.find(p => p.id == firstPoliId);
        const currentAntrians = antriansByPoli[firstPoliId];

        // Update poli name
        if (currentPoli) {
            $('#poli-name').text(currentPoli.nama_poli);
            $('#debug-log').append(`<div>Displaying poli: ${currentPoli.nama_poli}</div>`);
        } else {
            $('#poli-name').text('-');
        }

        // Update first card (current number)
        if (currentAntrians && currentAntrians.length > 0) {
            const firstAntrian = currentAntrians[0];
            $('#nomor-antrian-1').text(firstAntrian.nomor_antrian)
                .attr('data-id', firstAntrian.id);
            $('#status-badge-1').text(firstAntrian.status);
            $('#call-count-1').text(firstAntrian.jumlah_panggilan || 0).show();

            // Highlight if this is being called
            if (isPlaying && firstAntrian.id == lastCalledAntrianId) {
                $('#nomor-antrian-1').addClass('highlight-call');
            } else {
                $('#nomor-antrian-1').removeClass('highlight-call');
            }

            $('#debug-log').append(`<div>Displaying antrian ${firstAntrian.nomor_antrian} in position 1</div>`);
        } else {
            $('#nomor-antrian-1').text('-').attr('data-id', '').removeClass('highlight-call');
            $('#status-badge-1').text('-');
            $('#call-count-1').hide();
            $('#timer-1').hide();
        }

        // Update second card (next number)
        if (currentAntrians && currentAntrians.length > 1) {
            const secondAntrian = currentAntrians[1];
            $('#nomor-antrian-2').text(secondAntrian.nomor_antrian)
                .attr('data-id', secondAntrian.id);
            $('#status-badge-2').text(secondAntrian.status);
            $('#debug-log').append(`<div>Displaying antrian ${secondAntrian.nomor_antrian} in position 2</div>`);
        } else {
            $('#nomor-antrian-2').text('-').attr('data-id', '');
            $('#status-badge-2').text('-');
        }
    }

    // Function to check for antrians with "Memanggil" status
    function checkForAntriansToCall() {
        if (isPlaying || waitingForNextCall) {
            // Already playing or waiting, check again later
            setTimeout(checkForAntriansToCall, 1000);
            return;
        }

        // Find any antrians with "Memanggil" status, sorted by ID (sequential order)
        const antriansToCall = antrians.filter(a => a.status === 'Memanggil')
            .sort((a, b) => a.id - b.id);

        if (antriansToCall.length > 0) {
            // The first antrian in the sorted list should be called first
            const antrianToCall = antriansToCall[0];

            // Get the poli for this antrian
            const poli = polis.find(p => p.id === antrianToCall.poli_id);

            if (poli) {
                // Update display to show this poli before calling
                updateDisplay();

                // Start calling process
                $('#debug-log').append(`<div>Found antrian to call: ${antrianToCall.nomor_antrian} for ${poli.nama_poli}</div>`);
                lastCalledAntrianId = antrianToCall.id;
                callAntrian(antrianToCall, poli);
            }
        } else {
            // No antrians to call, check again in 3 seconds
            $('#debug-log').append("<div>No antrians with 'Memanggil' status found</div>");
            setTimeout(checkForAntriansToCall, 3000);
        }
    }

    // Function to call an antrian
    function callAntrian(antrian, poli) {
        if (isPlaying) {
            console.log("Call already in progress, ignoring new call request.");
            return;
        }

        // Set playing flag
        isPlaying = true;

        // Update status indicator
        $('#audio-status').text('Memulai panggilan...').show();
        $('#debug-log').append(`<div>Starting call for ${antrian.nomor_antrian} at ${poli.nama_poli}</div>`);

        // Highlight the number being called
        $('#nomor-antrian-1').addClass('highlight-call');

        // Prepare announcement text
        const textToSpeak = `Nomor antrian ${antrian.nomor_antrian}, silahkan menuju poli ${poli.nama_poli}.`;

        // Play notification sound
        try {
            notifAudio.play()
                .then(() => {
                    $('#debug-log').append("<div>Notification sound started playing</div>");
                })
                .catch(error => {
                    $('#debug-log').append(`<div class="text-danger">Error playing notification: ${error.message}</div>`);
                    speakAnnouncement();
                });

            // When notification sound ends
            notifAudio.onended = function() {
                $('#debug-log').append("<div>Notification sound finished</div>");
                speakAnnouncement();
            };
        } catch (error) {
            $('#debug-log').append(`<div class="text-danger">Error with audio: ${error.message}</div>`);
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

                // When speech ends
                utterance.onend = function() {
                    $('#debug-log').append("<div>Speech completed</div>");

                    // Play exit notification sound
                    playExitSound(antrian);
                };

                // Error handling for speech synthesis
                utterance.onerror = function(event) {
                    $('#debug-log').append(`<div class="text-danger">Speech error: ${event.error}</div>`);
                    playExitSound(antrian);
                };

                // Start speech synthesis
                window.speechSynthesis.speak(utterance);
            } catch (error) {
                $('#debug-log').append(`<div class="text-danger">Speech synthesis error: ${error.message}</div>`);
                playExitSound(antrian);
            }
        }
    }

    // Function to play exit sound and handle post-call tasks
    function playExitSound(antrian) {
        $('#debug-log').append("<div>Playing exit sound...</div>");
        $('#audio-status').text('Playing exit sound');

        try {
            notifKeluar.play()
                .then(() => {
                    $('#debug-log').append("<div>Exit sound started playing</div>");
                })
                .catch(error => {
                    $('#debug-log').append(`<div class="text-danger">Error playing exit sound: ${error.message}</div>`);
                    finishCallProcess(antrian);
                });

            // When exit sound ends
            notifKeluar.onended = function() {
                $('#debug-log').append("<div>Exit sound finished</div>");
                finishCallProcess(antrian);
            };
        } catch (error) {
            $('#debug-log').append(`<div class="text-danger">Error with exit audio: ${error.message}</div>`);
            finishCallProcess(antrian);
        }
    }

    // Function to complete the call process, update status, and start timer
    function finishCallProcess(antrian) {
        // Update status to "Dipanggil" in the database
        updateAntrianStatus(antrian.id);

        // Increment call count
        incrementCallCount(antrian.id);

        // Start the 40-second waiting timer
        startWaitingTimer();
    }

    // Function to update antrian status to "Dipanggil"
    function updateAntrianStatus(antrianId) {
        $.ajax({
            url: '/daftarantri/markascalled',
            method: 'POST',
            data: {
                antrian_id: antrianId,
                _token: csrfToken
            },
            success: function(response) {
                $('#debug-log').append(`<div>Antrian status updated: ${response.message}</div>`);

                // Update local data to reflect status change
                const index = antrians.findIndex(a => a.id === antrianId);
                if (index !== -1) {
                    antrians[index].status = 'Dipanggil';
                    // Update display to reflect the change
                    updateDisplay();
                }
            },
            error: function(error) {
                $('#debug-log').append(`<div class="text-danger">Failed to update antrian status: ${error.statusText}</div>`);
            }
        });
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

                    // Update the local antrian data
                    const index = antrians.findIndex(a => a.id === antrianId);
                    if (index !== -1) {
                        antrians[index].jumlah_panggilan = response.call_count;

                        // If status changed, update it
                        if (response.antrian_status && response.antrian_status !== antrians[index].status) {
                            antrians[index].status = response.antrian_status;
                            $('#debug-log').append(`<div>Antrian status changed to: ${response.antrian_status}</div>`);

                            // Update display
                            updateDisplay();
                        }
                    }
                } else {
                    $('#debug-log').append(`<div class="text-danger">Error in response: ${response.message || 'Unknown error'}</div>`);
                }
            },
            error: function(error) {
                $('#debug-log').append(`<div class="text-danger">AJAX error: ${error.status} - ${error.statusText}</div>`);
            }
        });
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

                // Force a full data refresh and check for calls
                $('#debug-log').append("<div>Timer complete, refreshing data...</div>");
                loadData();
            }
        }, 1000);
    }

    // Set up automatic polling for new data
    function setupAutomaticDataRefresh() {
        // Shorter interval when nothing is happening
        const shortInterval = 5000; // 5 seconds
        // Longer interval when something is happening
        const longInterval = 15000; // 15 seconds

        setInterval(function() {
            const now = Date.now();
            const timeSinceLastRefresh = now - lastRefreshTime;

            // If there's no activity (not playing, not waiting) and it's been at least shortInterval
            if (!isPlaying && !waitingForNextCall && timeSinceLastRefresh >= shortInterval) {
                lastRefreshTime = now;
                $('#debug-log').append("<div>Automatic data refresh triggered</div>");
                loadData();
            }
            // If there is activity but it's been a long time since refresh
            else if (timeSinceLastRefresh >= longInterval) {
                lastRefreshTime = now;
                $('#debug-log').append("<div>Forced data refresh triggered (long interval)</div>");
                loadData();
            }
        }, 2000); // Check every 2 seconds
    }

    // Start automatic data refresh
    setupAutomaticDataRefresh();

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

    // Manually trigger check for antrians function
    window.checkNow = function() {
        $('#debug-log').append("<div>Manual check triggered</div>");
        loadData();
        if (!isPlaying && !waitingForNextCall) {
            checkForAntriansToCall();
        }
    };

    // Add a button to the debug panel for manual checking
    $('#debug-panel').append('<button class="btn btn-sm btn-success mt-2 ml-2" onclick="checkNow()">Check Now</button>');
});
        </script>
    </body>
    </html>

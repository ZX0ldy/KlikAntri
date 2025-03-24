@extends('templates.mainAdmin')
@section('content')
    <!-- Main Header -->
    <style>
        .main-content {
            padding: 20px 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 500;
            color: #333;
            margin: 0;
        }

        .dashboard-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            border: 1px solid #e9ecef;
            overflow: hidden;
        }

        .dashboard-card-header {
            padding: 15px 20px;
            border-bottom: 1px solid #f1f1f1;
            display: flex;
            align-items: center;
        }

        .dashboard-card-header i {
            margin-right: 10px;
            font-size: 18px;
            color: #5a67d8;
        }

        .dashboard-card-title {
            margin: 0;
            font-size: 15px;
            font-weight: 500;
            color: #333;
        }

        .dashboard-card-body {
            padding: 20px;
        }

        .preview-description {
            color: #666;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .marquee-preview {
            overflow: hidden;
            white-space: nowrap;
            background-color: #333;
            color: white;
            padding: 8px 0;
            border-radius: 4px;
        }

        .marquee-preview-text {
            display: inline-block;
            animation: marquee 15s linear infinite;
            padding: 0 20px;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .hero-preview {
            width: 100%;
            background-color: #f5f5f5;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .poli-image-preview {
            max-width: 100%;
            max-height: 300px;
            object-fit: contain;
            border-radius: 4px;
        }

        .poli-video-preview {
            max-width: 100%;
            max-height: 300px;
            border-radius: 4px;
        }

        /* Untuk memberi tahu user jika tidak ada gambar/video */
        .hero-preview:empty::after {
            content: "Tidak ada media yang ditampilkan";
            color: #6c757d;
            font-style: italic;
        }

        .logo-preview-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 4px;
            border: 1px solid #e9ecef;
        }

        .logo-preview {
            max-width: 180px;
        }

        .logo-preview img {
            max-width: 100%;
            height: auto;
        }

        .settings-section {
            margin-bottom: 25px;
        }

        .settings-title {
            font-size: 15px;
            font-weight: 500;
            color: #333;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            margin-bottom: 6px;
            color: #4a5568;
        }

        .form-control {
            width: 100%;
            padding: 8px 12px;
            font-size: 14px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            background-color: #fff;
        }

        .form-control:focus {
            border-color: #5a67d8;
            box-shadow: 0 0 0 2px rgba(90, 103, 216, 0.1);
            outline: none;
        }

        .range-control {
            width: 100%;
            height: 6px;
            -webkit-appearance: none;
            appearance: none;
            background: #e2e8f0;
            border-radius: 3px;
            outline: none;
        }

        .range-control::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            background: #5a67d8;
            border-radius: 50%;
            cursor: pointer;
        }

        .speed-value {
            color: #5a67d8;
            font-weight: 500;
        }

        .speed-labels {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #718096;
            margin-top: 6px;
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            background-color: #f8fafc;
            border: 1px dashed #cbd5e0;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s;
            flex-direction: column;
            gap: 8px;
        }

        .file-upload-label:hover {
            border-color: #5a67d8;
            background-color: #f0f5ff;
        }

        .file-upload-icon {
            font-size: 24px;
            color: #5a67d8;
        }

        .file-upload-text {
            font-size: 13px;
            color: #4a5568;
        }

        .file-upload input[type="file"] {
            position: absolute;
            width: 0;
            height: 0;
            opacity: 0;
        }

        .current-file {
            display: flex;
            align-items: center;
            margin-top: 8px;
            padding: 8px 10px;
            background-color: #f8fafc;
            border-radius: 4px;
            font-size: 12px;
            color: #4a5568;
        }

        .current-file i {
            font-size: 14px;
            margin-right: 8px;
            color: #5a67d8;
        }

        .btn-primary {
            background-color: #5a67d8;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: #4c51bf;
            transform: translateY(-1px);
        }

        .history-link {
            color: #5a67d8;
            font-size: 14px;
            text-decoration: none;
        }

        .history-link:hover {
            text-decoration: underline;
        }

        /* Adjust this to ensure compatibility with your sidebar */
        .main {
            padding-left: 20px;
            padding-right: 20px;
        }
        .media-type-selector {
    margin-bottom: 25px;
}

.media-type-title {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
}

.media-type-options {
    display: flex;
    gap: 20px;
}

.media-type-option {
    flex: 1;
}

.media-type-input {
    display: none;
}

.media-type-label {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 15px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    background-color: #f9f9f9;
}

.media-type-label:hover {
    border-color: #3949ab;
    background-color: #f3f4fc;
}

.media-type-icon {
    font-size: 36px;
    margin-bottom: 10px;
    color: #666;
}

.media-type-input:checked + .media-type-label {
    border-color: #3949ab;
    background-color: #ebeeff;
    box-shadow: 0 3px 10px rgba(57, 73, 171, 0.1);
}

.media-type-input:checked + .media-type-label .media-type-icon {
    color: #3949ab;
}

.media-type-input:checked + .media-type-label span {
    color: #3949ab;
    font-weight: 600;
}

@media (max-width: 576px) {
    .media-type-options {
        flex-direction: column;
        gap: 10px;
    }
}
    </style>
    <div class="main">
        <div class="main-content">
            <div class="page-header">
                <h4 class="main-title">Edit Landing Page</h4>
                <a href="#" class="history-link">History</a>
            </div>

            <div class="row">
                <!-- Main Preview Card -->
                <div class="col-lg-8">
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            <i class='bx bx-text'></i>
                            <h5 class="dashboard-card-title">Marquee Text Preview</h5>
                        </div>
                        <div class="dashboard-card-body">
                            <p class="preview-description">Berikut ini adalah tampilan teks marquee yang akan ditampilkan di
                                header dan footer.</p>
                            <div class="marquee-preview">
                                <div class="marquee-preview-text" id="headerMarqueePreview">
                                    {{ $marqueeText }}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="dashboard-card mt-4">
                        <div class="dashboard-card-header">
                            <i class='bx bx-image-alt'></i>
                            <h5 class="dashboard-card-title">Background Media Preview</h5>
                        </div>
                        <div class="dashboard-card-body">
                            <p class="preview-description">Berikut ini adalah tampilan media latar belakang pada halaman
                                antrian.</p>
                            <div class="hero-preview" id="heroPreview">
                                @if($backgroundType == 'image')
                                    <img src="{{ asset('storage/' . $backgroundFile) }}" id="imagePreview"
                                        class="poli-image-preview" alt="Background">
                                @else
                                    <video id="videoPreview" class="poli-video-preview" controls autoplay muted loop>
                                        <source src="{{ asset('storage/' . $backgroundFile) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            <i class='bx bx-image'></i>
                            <h5 class="dashboard-card-title">Background Preview</h5>
                        </div>
                        <div class="dashboard-card-body">
                            <p class="preview-description">Berikut ini adalah tampilan gambar latar belakang pada halaman
                                landing.</p>
                                <div class="hero-preview" id="heroPreview">
                                    @if($backgroundMediaType == 'image')
                                        <img src="{{ asset('storage/' . $backgroundMediaFile) }}" id="imagePreview"
                                            class="poli-image-preview" alt="Background">
                                    @else
                                        <video id="videoPreview" class="poli-video-preview" controls autoplay muted loop>
                                            <source src="{{ asset('storage/' . $backgroundMediaFile) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>

                <!-- Settings Card -->
                <div class="col-lg-4">
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            <i class='bx bx-cog'></i>
                            <h5 class="dashboard-card-title">Settings</h5>
                        </div>
                        <div class="dashboard-card-body">
                            {{-- @dd($backgroundMediaType) --}}
                            <form id="landingPageForm" action="{{ route('edit.tampilan.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <!-- Bagian Marquee yang sudah ada -->
                                <div class="settings-section">
                                    <h6 class="settings-title">Teks Berjalan (Marquee)</h6>
                                    <div class="form-group">
                                        <label for="marqueeText">Teks Berjalan</label>
                                        <input type="text" class="form-control" id="marqueeText" name="marqueeText"
                                            value="{{ $marqueeText }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="marqueeSpeed">Kecepatan Teks (dalam detik)</label>
                                        <input type="number" class="form-control" id="marqueeSpeed" name="marqueeSpeed"
                                            min="5" max="30" value="{{ $marqueeSpeed }}">
                                        <small class="form-text text-muted">Semakin kecil nilai, semakin cepat teks
                                            bergerak</small>
                                    </div>
                                </div>

                                <!-- Bagian Media Background (Baru) -->
                                <div class="settings-section">
                                    <h6 class="settings-title">Media Latar Belakang (Display Antrian)</h6>

                                    <div class="form-group media-type-selector">
                                        <h5 class="media-type-title">Jenis Media</h5>

                                        <div class="media-type-options">
                                            <div class="media-type-option">
                                                <input type="radio" id="imageType" name="backgroundType" value="image"
                                                       class="media-type-input" {{ $backgroundType == 'image' ? 'checked' : '' }}>
                                                <label for="imageType" class="media-type-label">
                                                    <div class="media-type-icon">
                                                        <i class="bx bx-image"></i>
                                                    </div>
                                                    <span>Gambar</span>
                                                </label>
                                            </div>

                                            <div class="media-type-option">
                                                <input type="radio" id="videoType" name="backgroundType" value="video"
                                                       class="media-type-input" {{ $backgroundType == 'video' ? 'checked' : '' }}>
                                                <label for="videoType" class="media-type-label">
                                                    <div class="media-type-icon">
                                                        <i class="bx bx-video"></i>
                                                    </div>
                                                    <span>Video</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="file-upload">
                                            <label class="file-upload-label" for="backgroundFile">
                                                <i class='bx bx-upload file-upload-icon'></i>
                                                <span class="file-upload-text">Pilih file media</span>
                                            </label>
                                            <input type="file" id="backgroundFile" name="backgroundFile"
                                                accept="image/*,video/*">
                                        </div>
                                        <div class="current-file">
                                            <i class='bx bx-file'></i>
                                            <span>File saat ini: <span
                                                    id="currentBackgroundFile">{{ basename($backgroundFile) }}</span></span>
                                        </div>
                                        <small class="form-text text-muted">Format yang didukung: JPG, PNG, GIF (untuk
                                            gambar) atau MP4, WEBM, OGG (untuk video)</small>
                                    </div>
                                </div>


                                <div class="media-upload-section" id="videoUploadSection">
                                    <h6 class="settings-title">Media Latar Belakang (Landing)</h6>
                                    <div class="form-group media-type-selector">
                                        <h5 class="media-type-title">Jenis Media</h5>

                                        <div class="media-type-options">
                                            <div class="media-type-option">
                                                <input type="radio" id="mediaImageType" name="background_media_type" value="image"
                                                       class="media-type-input" {{ $backgroundMediaType == 'image' ? 'checked' : '' }}>
                                                <label for="mediaImageType" class="media-type-label">
                                                    <div class="media-type-icon">
                                                        <i class="bx bx-image"></i>
                                                    </div>
                                                    <span>Gambar</span>
                                                </label>
                                            </div>

                                            <div class="media-type-option">
                                                <input type="radio" id="mediaVideoType" name="background_media_type" value="video"
                                                       class="media-type-input" {{ $backgroundMediaType == 'video' ? 'checked' : '' }}>
                                                <label for="mediaVideoType" class="media-type-label">
                                                    <div class="media-type-icon">
                                                        <i class="bx bx-video"></i>
                                                    </div>
                                                    <span>Video</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Upload Video Background</label>
                                        <div class="file-upload">
                                            <label class="file-upload-label" for="backgroundVideo">
                                                <i class='bx bx-upload file-upload-icon'></i>
                                                <span class="file-upload-text">Pilih file video background</span>
                                            </label>
                                            <input type="file" id="backgroundVideo" name="background_media" accept="image=/*">
                                        </div>
                                        <div class="current-file">
                                            <i class='bx bx-file'></i>
                                            <span>File saat ini: <span id="currentVideoFile">Tidak ada video</span></span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">
                                    <i class='bx bx-save'></i> Simpan Perubahan
                                </button>
                            </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>
@endsection

<script>
    $(document).ready(function () {
        // Update marquee text preview
        $('#marqueeText').on('input', function () {
            let text = $(this).val();
            $('#headerMarqueePreview').text(text);
        });

        // Update marquee speed
        $('#marqueeSpeed').on('input', function () {
            let speed = $(this).val();
            $('#previewMarqueeSpeed').text(speed + 's');
            $('.marquee-preview-text').css('animation-duration', speed + 's');
        });

        // Background media type toggle
        $('input[name="backgroundType"]').change(function () {
            let mediaType = $(this).val();

            if (mediaType === 'image') {
                $('#imagePreview').show();
                $('#videoPreview').hide();
                $('#backgroundFile').attr('accept', 'image/*');
            } else {
                $('#imagePreview').hide();
                $('#videoPreview').show();
                $('#backgroundFile').attr('accept', 'video/*');
            }
        });

        // Background media file preview
        $('#backgroundFile').change(function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                const mediaType = $('input[name="backgroundType"]:checked').val();

                reader.onload = function (e) {
                    if (mediaType === 'image') {
                        $('#imagePreview').attr('src', e.target.result);
                        $('#imagePreview').show();
                        $('#videoPreview').hide();
                    } else {
                        $('#videoPreview').attr('src', e.target.result);
                        $('#videoPreview').show();
                        $('#imagePreview').hide();
                    }
                    $('#currentBackgroundFile').text(file.name);
                }
                reader.readAsDataURL(file);
                $(this).siblings('.file-upload-label').find('.file-upload-text').text(file.name);
            }
        });

        // Hero background image preview (previous code)
        $('#heroBackground').change(function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#heroPreview').css('background-image', `url(${e.target.result})`);
                    $('#currentHeroImage').text(file.name);
                }
                reader.readAsDataURL(file);
                $(this).siblings('.file-upload-label').find('.file-upload-text').text(file.name);
            }
        });

        // Logo image preview (previous code)
        $('#logoImage').change(function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#logoPreview').attr('src', e.target.result);
                    $('#currentLogoImage').text(file.name);
                }
                reader.readAsDataURL(file);
                $(this).siblings('.file-upload-label').find('.file-upload-text').text(file.name);
            }
        });

        // Form submission
        $('#landingPageForm').submit(function (e) {
            // Form validation
            const backgroundType = $('input[name="backgroundType"]:checked').val();
            const backgroundFile = $('#backgroundFile')[0].files[0];

            if (backgroundFile) {
                let fileExtension = backgroundFile.name.split('.').pop().toLowerCase();
                let isValid = false;

                if (backgroundType === 'image' && ['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
                    isValid = true;
                } else if (backgroundType === 'video' && ['mp4', 'webm', 'ogg'].includes(fileExtension)) {
                    isValid = true;
                }

                if (!isValid) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Error!',
                        text: 'Format file tidak sesuai dengan jenis media yang dipilih',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#5a67d8'
                    });
                    return false;
                }
            }
        });
    });

    // Sidebar toggle functionality
    document.getElementById('sidebar-close').addEventListener('click', function () {
        document.body.classList.toggle('sidebar-expand');
    });

    document.getElementById('mobile-toggle').addEventListener('click', function () {
        document.body.classList.toggle('sidebar-expand');
    });
</script>

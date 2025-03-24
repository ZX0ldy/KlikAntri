<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class KelolaTampilan extends Controller
{
    public function index()
    {
        $marqueeText = Setting::getValue('marquee_text', 'JAM BUKA KAMI ADALAH PUKUL 07:00 s.d 21:00. TERIMA KASIH ATAS KUNJUNGAN ANDA');
        $marqueeSpeed = Setting::getValue('marquee_speed', 15);
        $backgroundType = Setting::getValue('background_type', 'image');
        $backgroundMediaType = Setting::getValue('background_media_type', 'image');
        $backgroundFile = Setting::getValue('background_file', 'assets/bg/imagebg.png');
        $backgroundMediaFile = Setting::getValue('background_media', 'assets/media/imagebg.png');

        return view('admin/edittampilan', compact('marqueeText', 'marqueeSpeed', 'backgroundType', 'backgroundFile', 'backgroundMediaType', 'backgroundMediaFile'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'marqueeText' => 'required|string|max:255',
            'marqueeSpeed' => 'required|numeric|min:5|max:30',
            'backgroundType' => 'required|in:image,video',
        ]);

        Setting::setValue('marquee_text', $request->marqueeText);
        Setting::setValue('marquee_speed', $request->marqueeSpeed);
        Setting::setValue('background_type', $request->backgroundType);
        Setting::setValue('background_media_type', $request->background_media_type);

        // Handle background file upload untuk halaman antrian
        if ($request->hasFile('backgroundFile')) {
            $file = $request->file('backgroundFile');
            $extension = $file->getClientOriginalExtension();
            $allowedImageTypes = ['jpg', 'jpeg', 'png', 'gif'];
            $allowedVideoTypes = ['mp4', 'webm', 'ogg'];

            if (($request->backgroundType == 'image' && in_array($extension, $allowedImageTypes)) ||
                ($request->backgroundType == 'video' && in_array($extension, $allowedVideoTypes))) {

                // Delete old file if exists
                $oldFile = Setting::getValue('background_file');
                if ($oldFile && Storage::disk('public')->exists($oldFile)) {
                    Storage::disk('public')->delete($oldFile);
                }

                // Store new file
                $path = $file->store('assets/bg', 'public');
                Setting::setValue('background_file', $path);
            } else {
                return redirect()->back()->with('error', 'Format file untuk background tidak sesuai dengan jenis media yang dipilih.');
            }
        }

        // Handle media background upload (field terpisah)
        if ($request->hasFile('background_media')) {
            $file = $request->file('background_media');
            $extension = $file->getClientOriginalExtension();
            $allowedImageTypes = ['jpg', 'jpeg', 'png', 'gif'];
            $allowedVideoTypes = ['mp4', 'webm', 'ogg'];

            // Jika tidak ada backgroundType khusus untuk media, gunakan yang umum
            $mediaType = $request->has('background_media_type') ? $request->background_media_type : $request->backgroundType;

            if (($mediaType == 'image' && in_array($extension, $allowedImageTypes)) ||
                ($mediaType == 'video' && in_array($extension, $allowedVideoTypes))) {

                // Delete old media file if exists
                $oldFile = Setting::getValue('background_media');
                if ($oldFile && Storage::disk('public')->exists($oldFile)) {
                    Storage::disk('public')->delete($oldFile);
                }

                // Store new media file
                $path = $file->store('assets/media', 'public');
                Setting::setValue('background_media', $path);
            } else {
                return redirect()->back()->with('error', 'Format file untuk media background tidak sesuai dengan jenis media yang dipilih.');
            }
        }

        return redirect()->back()->with('success', 'Pengaturan tampilan telah disimpan');
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Setting;

class Marquee extends Component
{
    public $position;
    public $text;
    public $speed;

    public function __construct($position = 'header')
    {
        $this->position = $position;
        $this->text = Setting::getValue('marquee_text', 'JAM BUKA KAMI ADALAH PUKUL 07:00 s.d 21:00. TERIMA KASIH ATAS KUNJUNGAN ANDA');
        $this->speed = Setting::getValue('marquee_speed', 15);
    }

    public function render()
    {
        return view('components.marquee');
    }
}

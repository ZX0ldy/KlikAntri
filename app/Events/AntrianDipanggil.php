<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AntrianDipanggil implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $nomorAntrian;
    public $namaPoli;

    public function __construct($data)
    {
        $this->nomorAntrian = $data['nomor_antrian'];
        $this->namaPoli = $data['nama_poli'];
    }

    public function broadcastOn()
    {
        return new Channel('antrian-channel');
    }

    public function broadcastAs()
    {
        return 'antrian.dipanggil';
    }
}

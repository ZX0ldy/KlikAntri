<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Antrian;
use App\Models\Poli;
use Illuminate\Support\Facades\Log;

class AntrianList extends Component
{
    public $antrianList = [];
    public $polis = [];
    public $lastCalledAntrian = null;
    public $calledCount = 0;

    protected $listeners = [
        'echo:antrian,AntrianCreated' => 'handleAntrianCreated',
        'callAntrian' => 'callAntrian',
        'refreshComponent' => '$refresh'
    ];

    public function mount()
    {
        $this->loadAntrian();
        $this->loadPolis();
    }

    public function loadAntrian()
    {
        // Get all uncalled antrian (status = 'menunggu')
        $this->antrianList = Antrian::with('poli')
                            ->where('status', 'menunggu')
                            ->orderBy('created_at', 'asc')
                            ->get()
                            ->toArray();
    }

    public function loadPolis()
    {
        $this->polis = Poli::where('status', 2)->get()->toArray();
    }

    public function handleAntrianCreated($event)
    {
        Log::info('New antrian received via websocket', $event);

        // Check if it's the first antrian for this poli today
        $antrianCount = Antrian::where('poli_id', $event['antrian']['poli_id'])
                        ->whereDate('created_at', now()->toDateString())
                        ->count();

        if ($antrianCount === 1) {
            // If it's the first antrian, call it automatically
            $this->callAntrian($event['antrian']['id']);
        } else {
            // Otherwise just refresh the list
            $this->loadAntrian();
        }
    }

    public function callAntrian($antrianId)
    {
        $antrian = Antrian::with('poli')->find($antrianId);

        if (!$antrian) {
            return;
        }

        $this->lastCalledAntrian = $antrian;
        $this->calledCount = 1;

        // Update status to 'dipanggil'
        $antrian->status = 'dipanggil';
        $antrian->save();

        // Remove this antrian from the list
        $this->loadAntrian();

        // Call this method again after 5 seconds (for the 2nd call)
        $this->dispatchBrowserEvent('play-call-sound', [
            'nomor' => $antrian->nomor_antrian,
            'poli' => $antrian->poli->nama_poli
        ]);

        $this->emit('scheduleNextCall');
    }

    public function continueCall()
    {
        if ($this->lastCalledAntrian && $this->calledCount < 3) {
            $this->calledCount++;

            $this->dispatchBrowserEvent('play-call-sound', [
                'nomor' => $this->lastCalledAntrian->nomor_antrian,
                'poli' => $this->lastCalledAntrian->poli->nama_poli
            ]);

            if ($this->calledCount < 3) {
                $this->emit('scheduleNextCall');
            } else {
                // After 3 calls, reset
                $this->lastCalledAntrian = null;
                $this->calledCount = 0;
            }
        }
    }

    public function render()
    {
        return view('livewire.daftar-antri-display');
    }
}

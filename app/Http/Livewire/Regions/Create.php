<?php

namespace App\Http\Livewire\Regions;

use App\Models\Region;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $name;

    public function render()
    {
        return view('livewire.regions.create');
    }

    public function store()
    {
        // Validasi data
        $this->validate([
            // 'nis' => ['required', 'numeric'],
            'name' => ['required'],
        ]);

        // Masukkan kedalam database
        Region::create([
            'name' => $this->name,
        ]);

        // Kirim notifikasi berhasil menggunakan emmit
        $this->emit('regionAdded');
    }
}

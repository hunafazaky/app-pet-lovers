<?php

namespace App\Http\Livewire\Familias;

use App\Models\Familia;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $name;

    public function render()
    {
        return view('livewire.familias.create');
    }

    public function store()
    {
        // Validasi data
        $this->validate([
            // 'nis' => ['required', 'numeric'],
            'name' => ['required'],
        ]);

        // Masukkan kedalam database
        Familia::create([
            'name' => $this->name,
        ]);

        // Kirim notifikasi berhasil menggunakan emmit
        $this->emit('familiaAdded');
    }
}

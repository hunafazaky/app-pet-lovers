<?php

namespace App\Http\Livewire\Familias;

use App\Models\Familia;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $familiaId, $name;

    // Untuk mengambil emit yang dikirim dari komponen index
    protected $listeners = ['familiaEdit'];

    public function render()
    {
        return view('livewire.familias.edit');
    }

    // Untuk handle emit dari komponen index
    public function familiaEdit($familia)
    {
        // Isi properti yang sudah dideklarasikan sebelumnya menggunakan data dari emit
        $this->familiaId = $familia['id'];
        $this->name = $familia['name'];
    }

    // Update data
    public function update(Familia $familia)
    {
        // Validasi
        $this->validate([
            // 'nis' => ['required', 'numeric'],
            'name' => ['required'],
        ]);

        // Update ke database
        $familia->update([
            'name' => $this->name,
        ]);

        // Emit untuk trigger notifikasi
        $this->emit('familiaEdited');
    }
}

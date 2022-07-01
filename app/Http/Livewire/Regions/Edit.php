<?php

namespace App\Http\Livewire\Regions;

use App\Models\Region;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $regionId, $name;

    // Untuk mengambil emit yang dikirim dari komponen index
    protected $listeners = ['regionEdit'];

    public function render()
    {
        return view('livewire.regions.edit');
    }

    // Untuk handle emit dari komponen index
    public function regionEdit($region)
    {
        // Isi properti yang sudah dideklarasikan sebelumnya menggunakan data dari emit
        $this->regionId = $region['id'];
        $this->name = $region['name'];
    }

    // Update data
    public function update(Region $region)
    {
        // Validasi
        $this->validate([
            // 'nis' => ['required', 'numeric'],
            'name' => ['required'],
        ]);

        // Update ke database
        $region->update([
            'name' => $this->name,
        ]);

        // Emit untuk trigger notifikasi
        $this->emit('regionEdited');
    }
}

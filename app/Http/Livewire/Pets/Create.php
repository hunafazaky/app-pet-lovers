<?php

namespace App\Http\Livewire\Pets;

use App\Models\Pet;
use App\Models\Familia;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $name, $id_familia, $id_donor, $id_owner, $description, $photo;

    public function render()
    {
        return view('livewire.pets.create', [
            'familias' => Familia::all(),
            'users' => User::all(),
        ]);
    }

    public function store()
    {
        // Validasi data
        $this->validate([
            // 'nis' => ['required', 'numeric'],
            'name' => ['required'],
            'description' => ['required'],
            'id_familia' => ['required'],
            'id_owner' => ['required', 'numeric'],
            'id_donor' => ['required'],
        ]);

        // Cek jika pet upload foto, maka gunakan foto tersebut
        // Jika tidak, maka gunakan foto default
        if ($this->photo) {
            $photo = $this->photo->store('avatar/upload');
        } else {
            $photo = 'avatar/' . strtolower(substr($this->name, 0, 1)) . '.png';
        }

        // Masukkan kedalam database
        Pet::create([
            'name' => $this->name,
            'description' => $this->description,
            'id_familia' => $this->id_familia,
            'id_donor' => $this->id_donor,
            'id_owner' => $this->id_owner,
            'photo' => $photo,
        ]);

        // Kirim notifikasi berhasil menggunakan emmit
        $this->emit('petAdded');
    }
}

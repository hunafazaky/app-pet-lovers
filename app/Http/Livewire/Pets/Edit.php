<?php

namespace App\Http\Livewire\Pets;

use App\Models\Pet;
use App\Models\User;
use App\Models\Familia;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $petId, $name, $id_familia, $id_donor, $id_owner, $description, $photo, $photoOld;

    // Untuk mengambil emit yang dikirim dari komponen index
    protected $listeners = ['petEdit'];

    public function render()
    {
        return view('livewire.pets.edit', [
            'users' => User::all(),
            'familias' => Familia::all(),
        ]);
    }

    // Untuk handle emit dari komponen index
    public function petEdit($pet)
    {
        // Isi properti yang sudah dideklarasikan sebelumnya menggunakan data dari emit
        $this->petId = $pet['id'];
        $this->name = $pet['name'];
        $this->description = $pet['description'];
        $this->id_familia = $pet['id_familia'];
        $this->id_owner = $pet['id_owner'];
        $this->id_donor = $pet['id_donor'];
        $this->photoOld = $pet['photo'];
    }

    // Update data
    public function update(Pet $pet)
    {
        // Validasi
        $this->validate([
            // 'nis' => ['required', 'numeric'],
            'name' => ['required'],
            'description' => ['required'],
            'id_familia' => ['required', 'numeric'],
            'id_owner' => ['required', 'numeric'],
            'id_donor' => ['required', 'numeric'],
        ]);

        // Jika pet upload foto baru, maka foto lama hapus (kalau foto sebelumnya hasil upload)
        if ($this->photo) {
            $photo = $this->photo->store('avatar/upload');
            if (preg_match('/upload/', $pet->photo)) {
                Storage::delete($pet->photo);
            }
        } else {
            $photo = $this->photoOld;
        }

        // Update ke database
        $pet->update([
            'name' => $this->name,
            'description' => $this->description,
            'id_familia' => $this->id_familia,
            'id_owner' => $this->id_owner,
            'id_donor' => $this->id_donor,
            'photo' => $photo,
        ]);

        // Emit untuk trigger notifikasi
        $this->emit('petEdited');
    }
}

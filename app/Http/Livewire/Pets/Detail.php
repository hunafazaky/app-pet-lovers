<?php

namespace App\Http\Livewire\Pets;

use App\Models\User;
use App\Models\Familia;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $petId, $name, $id_familia, $id_donor, $id_owner, $description, $photo, $photoOld;

    // Untuk mengambil emit yang dikirim dari komponen index
    protected $listeners = ['petDetail'];

    public function render()
    {
        return view('livewire.pets.detail', [
            'users' => User::all(),
            'familias' => Familia::all(),
        ]);
    }

    // Untuk handle emit dari komponen index
    public function petDetail($pet)
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
}

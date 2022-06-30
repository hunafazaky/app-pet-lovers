<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $name, $address, $phone_number, $id_region, $photo, $email, $password;

    public function render()
    {
        return view('livewire.users.create');
    }

    public function store()
    {
        // Validasi data
        $this->validate([
            // 'nis' => ['required', 'numeric'],
            'name' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
            'id_region' => ['required', 'numeric'],
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // Cek jika user upload foto, maka gunakan foto tersebut
        // Jika tidak, maka gunakan foto default
        if ($this->photo) {
            $photo = $this->photo->store('avatar/upload');
        } else {
            $photo = 'avatar/' . strtolower(substr($this->name, 0, 1)) . '.png';
        }

        // Masukkan kedalam database
        User::create([
            'name' => $this->name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'id_region' => $this->id_region,
            'photo' => $photo,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        // Kirim notifikasi berhasil menggunakan emmit
        $this->emit('userAdded');
    }
}

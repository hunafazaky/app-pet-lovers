<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $userId, $name, $address, $phone_number, $id_region, $photo, $photoOld;

    // Untuk mengambil emit yang dikirim dari komponen index
    protected $listeners = ['userEdit'];

    public function render()
    {
        return view('livewire.users.edit');
    }

    // Untuk handle emit dari komponen index
    public function userEdit($user)
    {
        // Isi properti yang sudah dideklarasikan sebelumnya menggunakan data dari emit
        $this->userId = $user['id'];
        $this->name = $user['name'];
        $this->address = $user['address'];
        $this->phone_number = $user['phone_number'];
        $this->id_region = $user['id_region'];
        $this->photoOld = $user['photo'];
    }

    // Update data
    public function update(User $user)
    {
        // Validasi
        $this->validate([
            // 'nis' => ['required', 'numeric'],
            'name' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
            'id_region' => ['required', 'numeric'],
        ]);

        // Jika user upload foto baru, maka foto lama hapus (kalau foto sebelumnya hasil upload)
        if ($this->photo) {
            $photo = $this->photo->store('avatar/upload');
            if (preg_match('/upload/', $user->photo)) {
                Storage::delete($user->photo);
            }
        } else {
            $photo = $this->photoOld;
        }

        // Update ke database
        $user->update([
            'name' => $this->name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'id_region' => $this->id_region,
            'photo' => $photo,
        ]);

        // Emit untuk trigger notifikasi
        $this->emit('userEdited');
    }
}

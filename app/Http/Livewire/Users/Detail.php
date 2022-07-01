<?php

namespace App\Http\Livewire\Users;

use App\Models\Region;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $userId, $name, $address, $email, $phone_number, $id_region, $photo, $photoOld;

    // Untuk mengambil emit yang dikirim dari komponen index
    protected $listeners = ['userDetail'];

    public function render()
    {
        return view('livewire.users.detail', [
            'regions' => Region::all(),
        ]);
    }

    // Untuk handle emit dari komponen index
    public function userDetail($user)
    {
        // Isi properti yang sudah dideklarasikan sebelumnya menggunakan data dari emit
        $this->userId = $user['id'];
        $this->name = $user['name'];
        $this->address = $user['address'];
        $this->email = $user['email'];
        $this->phone_number = $user['phone_number'];
        $this->id_region = $user['id_region'];
        $this->photoOld = $user['photo'];
    }
}

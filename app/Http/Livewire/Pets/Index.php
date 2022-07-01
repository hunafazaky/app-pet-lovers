<?php

namespace App\Http\Livewire\Pets;

use App\Models\Pet;
use App\Models\User;
use App\Models\Familia;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    // Gunakan ini agar menggunakan pagination milik livewire
    use WithPagination;

    public $paginate = 10, $search, $formVisible = false;

    // Untuk mengupdate 'search' yang ada di url
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    // Membuat listener untuk emit yang dibuat di komponen lain
    protected $listeners = ['petAdded', 'closeForm', 'petEdited'];

    public function render()
    {
        return view('livewire.pets.index', [
            'pets' => $this->search
                ? Pet::where('name', 'like', '%' . $this->search . '%')
                ->latest()->paginate($this->paginate)
                : Pet::latest()->paginate($this->paginate),
            'users' => User::all(),
            'familias' => Familia::all(),
        ]);
    }

    // Untuk menampilkan form tambah
    public function create()
    {
        $this->formVisible = 'create';
    }

    // Untuk menampilkan notifikasi dari emit yang dikirim dari komponen create
    public function petAdded()
    {
        session()->flash('message', 'Pet added successfully');
        // Tutup form
        $this->closeForm();
    }

    // Untuk menutup form
    public function closeForm()
    {
        $this->formVisible = false;
    }

    // Untuk menghapus data
    public function destroy(Pet $pet)
    {
        $pet->delete();

        // Untuk menghapus foto siswa di penyimpanan jika foto tersebut hasil upload
        if (preg_match('/upload/', $pet->photo)) {
            Storage::delete($pet->photo);
        }

        // Untuk memberi notifikasi
        session()->flash('message', 'Pet deleted successfully');
    }

    public function detail(Pet $pet, User $users, Familia $familias)
    {
        $this->formVisible = 'detail';
        // Untuk mengirim data pet yang di klik ke komponen lain (komponen edit)
        $this->emit('petDetail', $pet, $users, $familias);
    }
    // Untuk menampilkan form edit
    public function edit(Pet $pet, User $users, Familia $familias)
    {
        $this->formVisible = 'edit';
        // Untuk mengirim data pet yang di klik ke komponen lain (komponen edit)
        $this->emit('petEdit', $pet, $users, $familias);
    }

    // Untuk menampilkan notifikasi dari emit yang dikirim dari komponen edit
    public function petEdited()
    {
        session()->flash('message', 'Pet edited successfully');
        // Tutup form
        $this->closeForm();
    }
}

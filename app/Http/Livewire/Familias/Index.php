<?php

namespace App\Http\Livewire\Familias;

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
    protected $listeners = ['familiaAdded', 'closeForm', 'familiaEdited'];

    public function render()
    {
        return view('livewire.familias.index', [
            'familias' => $this->search
                ? Familia::where('name', 'like', '%' . $this->search . '%')
                ->latest()->paginate($this->paginate)
                : Familia::latest()->paginate($this->paginate),
            'users' => User::All()
        ]);
    }

    // Untuk menampilkan form tambah
    public function create()
    {
        $this->formVisible = 'create';
    }

    // Untuk menampilkan notifikasi dari emit yang dikirim dari komponen create
    public function familiaAdded()
    {
        session()->flash('message', 'Familia added successfully');
        // Tutup form
        $this->closeForm();
    }

    // Untuk menutup form
    public function closeForm()
    {
        $this->formVisible = false;
    }

    // Untuk menghapus data
    public function destroy(Familia $familia)
    {
        $familia->delete();

        // Untuk menghapus foto siswa di penyimpanan jika foto tersebut hasil upload
        if (preg_match('/upload/', $familia->photo)) {
            Storage::delete($familia->photo);
        }

        // Untuk memberi notifikasi
        session()->flash('message', 'Familia deleted successfully');
    }

    // Untuk menampilkan form edit
    public function edit(Familia $familia)
    {
        $this->formVisible = 'edit';
        // Untuk mengirim data familia yang di klik ke komponen lain (komponen edit)
        $this->emit('familiaEdit', $familia);
    }

    // Untuk menampilkan notifikasi dari emit yang dikirim dari komponen edit
    public function familiaEdited()
    {
        session()->flash('message', 'Familia edited successfully');
        // Tutup form
        $this->closeForm();
    }
}

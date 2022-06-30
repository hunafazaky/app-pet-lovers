<?php

namespace App\Http\Livewire\Regions;

use App\Models\Region;
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
    protected $listeners = ['regionAdded', 'closeForm', 'regionEdited'];

    public function render()
    {
        return view('livewire.regions.index', [
            'regions' => $this->search
                ? Region::where('name', 'like', '%' . $this->search . '%')
                ->latest()->paginate($this->paginate)
                : Region::latest()->paginate($this->paginate)
        ]);
    }

    // Untuk menampilkan form tambah
    public function create()
    {
        $this->formVisible = 'create';
    }

    // Untuk menampilkan notifikasi dari emit yang dikirim dari komponen create
    public function regionAdded()
    {
        session()->flash('message', 'Region added successfully');
        // Tutup form
        $this->closeForm();
    }

    // Untuk menutup form
    public function closeForm()
    {
        $this->formVisible = false;
    }

    // Untuk menghapus data
    public function destroy(Region $region)
    {
        $region->delete();

        // Untuk menghapus foto siswa di penyimpanan jika foto tersebut hasil upload
        if (preg_match('/upload/', $region->photo)) {
            Storage::delete($region->photo);
        }

        // Untuk memberi notifikasi
        session()->flash('message', 'Region deleted successfully');
    }

    // Untuk menampilkan form edit
    public function edit(Region $region)
    {
        $this->formVisible = 'edit';
        // Untuk mengirim data region yang di klik ke komponen lain (komponen edit)
        $this->emit('regionEdit', $region);
    }

    // Untuk menampilkan notifikasi dari emit yang dikirim dari komponen edit
    public function regionEdited()
    {
        session()->flash('message', 'Region edited successfully');
        // Tutup form
        $this->closeForm();
    }
}

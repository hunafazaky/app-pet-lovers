<div class="container px-8 mx-auto my-10">
    <div class="space-y-4">
        <!-- <h1 class="text-xl font-bold text-gray-800">USER LIST</h1> -->
        @if ($formVisible)
        @if ($formVisible === 'detail')
        <livewire:pets.detail />
        @elseif ($formVisible === 'edit')
        <livewire:pets.edit />
        @else
        <livewire:pets.create />
        @endif
        @else
        <button wire:click="create" class="btn btn-primary">New</button>
        @endif
    </div>
    <hr class="my-6">
    <div class="space-y-6">
        @if (session()->has('message'))
        <div class="alert alert-success">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                <label>{{ session('message') }}</label>
            </div>
        </div>
        @endif
        <div class="grid grid-cols-3 gap-6">

            <a href="/pets" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-red-900 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pet List</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Kumpulan hewan yang berasal dari donasi para pencinta hewan, dan dipelihara oleh orang yang mencintai hewan</p>
            </a>
            <a href="/users" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-yellow-900 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">User List</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Kumpulan orang-orang yang mencintai hewan, bersukarela untuk mendonasikan hewan dan memelihara hewan</p>
            </a>
            <a href="/regions" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-green-900 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Region List</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Kumpulan data kota dari para pencinta hewan untuk mempermudah mapping wilayah</p>
            </a>
            <a href="/familias" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-blue-900 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Familia List</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Kumpulan data jenis atau famili hewan yang sudah terkumpul di komunitas untuk mempermudah mapping familia hewan</p>
            </a>

            <!-- @forelse ($pets as $pet)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src='{{ asset("storage/{$pet->photo}") }}' alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{$pet->name}}</div>
                </div>
            </div>
            @break ($loop->iteration >= 5)
            @empty
            <tr>
                <td colspan="5">Not Found</td>
            </tr>
            @endforelse -->
        </div>
        <!-- <a href="/pets">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src='{{ asset("storage/avatar/in-kittens.jpg") }}' alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">To Pet List</div>
                </div>
            </div>
        </a> -->
        <!-- {{ $pets->links() }} -->
    </div>
</div>
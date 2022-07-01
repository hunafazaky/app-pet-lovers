<div class="container px-8 mx-auto my-10">
    <div class="space-y-4">
        <h1 class="text-xl font-bold text-gray-800">PET LIST</h1>
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
        <div class="grid grid-cols-2 gap-2">
            <select wire:model="paginate" class="select select-bordered max-w-max">
                <option>5</option>
                <option>10</option>
                <option>15</option>
            </select>
            <input wire:model="search" type="search" placeholder="Search..." class="input input-bordered">
        </div>
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Name</th>
                        <th>Familia</th>
                        <th>Owner</th>
                        <th class="text-center">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pets as $pet)
                    <tr>
                        <th class="align-baseline">{{ $loop->iteration }}</th>
                        <td>
                            <div class="avatar">
                                <div class="w-12 h-12 mask mask-hexagon">
                                    <img class="w-full h-full object-cover" src='{{ asset("storage/{$pet->photo}") }}'>
                                </div>
                            </div>
                        </td>
                        <td class="align-baseline">{{ $pet->name }}</td>
                        <td class="align-baseline">
                            @foreach ($familias as $familia)
                            @if ($familia->id == $pet->id_familia)
                            {{$familia->name}}
                            @endif
                            @endforeach
                        </td>
                        <td class="align-baseline">
                            @foreach ($users as $user)
                            @if ($user->id == $pet->id_owner)
                            {{$user->name}}
                            @endif
                            @endforeach
                        </td>
                        <td class="align-baseline mx-auto text-center">
                            <button wire:click="detail({{ $pet->id }})" class="btn btn-sm btn-success my-2">Detail</button>
                            <button wire:click="edit({{ $pet->id }})" class="btn btn-sm btn-warning my-2">Edit</button>
                            <button wire:click="destroy({{ $pet->id }})" class="btn btn-sm btn-error my-2">Delete</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Not Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $pets->links() }}
    </div>
</div>
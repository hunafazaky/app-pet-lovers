<div class="max-w-3xl mx-auto my-10">
    <div class="space-y-4">
        <h1 class="text-2xl font-black text-gray-800">Simple CRUD Laravel + Livewire</h1>
        @if ($formVisible)
        @if ($formVisible === 'edit')
        <livewire:users.edit />
        @else
        <livewire:users.create />
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
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Region</th>
                        <th>Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <th class="align-baseline">{{ $loop->iteration }}</th>
                        <td>
                            <div class="avatar">
                                <div class="w-12 h-12 mask mask-hexagon">
                                    <img class="w-full h-full object-cover" src='{{ asset("storage/{$user->photo}") }}'>
                                </div>
                            </div>
                        </td>
                        <td class="align-baseline">{{ $user->name }}</td>
                        <td class="align-baseline">{{ $user->address }}</td>
                        <td class="align-baseline">{{ $user->phone_number }}</td>
                        <td class="align-baseline">{{ $user->id_region }}</td>
                        <td class="align-baseline">
                            <button wire:click="edit({{ $user->id }})" class="btn btn-warning">Edit</button>
                            <button wire:click="destroy({{ $user->id }})" class="btn btn-error">Delete</button>
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
        {{ $users->links() }}
    </div>
</div>
<form wire:submit.prevent='update({{ $userId }})' class="space-y-4" action="">
    <!-- <div class="grid grid-cols-2"> -->
    <!-- <div>
            <div class="w-40 h-40 mask mask-rounded">
                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $photoOld) }}">
            </div>
        </div> -->
    <div>
        <table class="table-auto w-full">
            <tbody>
                <tr class="p-2">
                    <td rowspan="6">
                        <div class="w-40 h-40 m-auto">
                            <img class="w-full h-full object-scale-down" src="{{ asset('storage/' . $photoOld) }}">
                        </div>
                    </td>
                    <td class="text-sm align-baseline font-semibold uppercase">User ID</td>
                    <td> : </td>
                    <td class="text-sm align-baseline"> {{ $userId }}</td>
                </tr>
                <tr class="p-2">
                    <td class="text-sm align-baseline font-semibold uppercase">Name</td>
                    <td> : </td>
                    <td class="text-sm align-baseline"> {{ $name }}</td>
                </tr>
                <tr class="p-2">
                    <td class="text-sm align-baseline font-semibold uppercase">Email</td>
                    <td> : </td>
                    <td class="text-sm align-baseline"> {{ $email }}</td>
                </tr>
                <tr class="p-2">
                    <td class="text-sm align-baseline font-semibold uppercase">Address</td>
                    <td> : </td>
                    <td class="text-sm align-baseline"> {{ $address }}</td>
                </tr>
                <tr class="p-2">
                    <td class="text-sm align-baseline font-semibold uppercase">Region</td>
                    <td> : </td>
                    <td class="text-sm align-baseline">
                        @foreach ($regions as $region)
                        @if ($region->id == $id_region)
                        {{$region->name}}
                        @endif
                        @endforeach
                    </td>
                </tr>
                <tr class="p-2">
                    <td class="text-sm align-baseline font-semibold uppercase">Phone Number</td>
                    <td> : </td>
                    <td class="text-sm align-baseline"> {{ $phone_number }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- <div class="form-control">
            <label class="label">
                <span class="label-text">Name</span>
            </label>
            <input wire:model="name" type="text" placeholder="Name" class="input @error('name') input-error @enderror input-bordered">
            @error('name')
            <label class="label">
                <span class="label-text-alt">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input wire:model="email" type="text" placeholder="Email" class="input @error('email') input-error @enderror input-bordered">
            @error('email')
            <label class="label">
                <span class="label-text-alt">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Address</span>
            </label>
            <input wire:model="address" type="text" placeholder="Address" class="input @error('address') input-error @enderror input-bordered">
            @error('address')
            <label class="label">
                <span class="label-text-alt">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Region</span>
            </label>
            <select name="id_region" wire:model="id_region" class="input @error('id_region') input-error @enderror input-bordered">
                @forelse($regions as $region)
                <option value="{{$region->id}}" <?= $region->id == $id_region ? 'selected' : '' ?>>{{$region->name}}</option>
                @empty
                <option>Not Found</option>
                @endforelse
            </select>
            @error('id_region')
            <label class="label">
                <span class="label-text-alt">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Phone Number</span>
            </label>
            <input wire:model="phone_number" type="text" placeholder="Phone Number" class="input @error('phone_number') input-error @enderror input-bordered">
            @error('phone_number')
            <label class="label">
                <span class="label-text-alt">{{ $message }}</span>
            </label>
            @enderror
        </div> -->
    <!-- </div> -->
    <!-- <div class="space-y-2">
        <div class="flex items-center gap-2">
            {{-- Jika user upload foto, maka ubah previewnya jadi foto yang di upload --}}
            @if ($photo)
            <div class="avatar">
                <div class="w-24 h-24 mask mask-hexagon">
                    <img class="w-full h-full object-cover" src="{{ $photo->temporaryUrl() }}">
                </div>
            </div>
            @else
            <div class="avatar">
                <div class="w-24 h-24 mask mask-hexagon">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $photoOld) }}">
                </div>
            </div>
            @endif
            <label class="btn btn-sm" for="photo">Upload Photo</label>
            <input class="absolute pointer-events-none opacity-0" type="file" wire:model="photo" id="photo">
        </div>
        @error('photo')
        <p class="text-sm">{{ $message }}</p>
        @enderror
    </div> -->
    <!-- <input class="absolute opacity-0 pointer-events-none" type="file" id="photo"> -->
    <!-- <button class="btn btn-primary">Edit</button> -->
    {{-- Kirim emit untuk trigger menutup form --}}
    <button type="button" wire:click="$emit('closeForm')" class="btn">Close</button>
</form>
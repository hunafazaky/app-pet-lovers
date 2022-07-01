<form wire:submit.prevent='store' class="space-y-4" action="">
    <div class="grid grid-cols-2 gap-2">
        <div class="form-control">
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
                <span class="label-text">Phone Number</span>
            </label>
            <input wire:model="phone_number" type="text" placeholder="Phone Number" class="input @error('phone_number') input-error @enderror input-bordered">
            @error('phone_number')
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
                <span class="label-text">Password</span>
            </label>
            <input wire:model="password" type="text" placeholder="Password" class="input @error('password') input-error @enderror input-bordered">
            @error('password')
            <label class="label">
                <span class="label-text-alt">{{ $message }}</span>
            </label>
            @enderror
        </div>
    </div>
    <div class="space-y-2">
        <div class="flex items-center gap-2">
            {{-- Jika user upload foto, maka ubah previewnya jadi foto yang di upload --}}
            @if ($photo)
            <div class="avatar">
                <div class="w-24 h-24 mask mask-hexagon">
                    <img class="w-full h-full object-cover" src="{{ $photo->temporaryUrl() }}">
                </div>
            </div>
            @endif
            <label class="btn btn-sm" for="photo">Upload Photo</label>
            <input class="absolute pointer-events-none opacity-0" type="file" wire:model="photo" id="photo">
        </div>
        @error('photo')
        <p class="text-sm">{{ $message }}</p>
        @enderror
    </div>
    <button class="btn btn-primary">Create</button>
    {{-- Kirim emit untuk trigger menutup form --}}
    <button type="button" wire:click="$emit('closeForm')" class="btn">Cancel</button>
</form>
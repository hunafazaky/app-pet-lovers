<form wire:submit.prevent='store' class="space-y-4" action="">
    <div class="grid grid-cols-2 gap-2">
        <div class="form-control">
            <label class="label">
                <span class="label-text">NIS</span>
            </label> 
            <input wire:model="nis" type="number" placeholder="NIS" class="input @error('nis') input-error @enderror input-bordered">
            @error('nis')
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
            @enderror
        </div>
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
    </div>
    <div class="space-y-2">
        <div class="flex items-center gap-2">
            {{-- Jika user upload foto, maka tampilkan previewnya --}}
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
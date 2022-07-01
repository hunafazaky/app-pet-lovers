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
    </div>
    <button class="btn btn-primary">Create</button>
    {{-- Kirim emit untuk trigger menutup form --}}
    <button type="button" wire:click="$emit('closeForm')" class="btn">Cancel</button>
</form>
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
                <span class="label-text">Familia</span>
            </label>
            <select name="id_familia" wire:model="id_familia" class="input @error('id_familia') input-error @enderror input-bordered">
                @forelse($familias as $familia)
                <option value="{{$familia->id}}" <?= $familia->id == $id_familia ? 'selected' : '' ?>>{{$familia->name}}</option>
                @empty
                <option>Not Found</option>
                @endforelse
            </select>
            @error('id_familia')
            <label class="label">
                <span class="label-text-alt">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Owner</span>
            </label>
            <select name="id_owner" wire:model="id_owner" class="input @error('id_owner') input-error @enderror input-bordered">
                @forelse($users as $user)
                <option value="{{$user->id}}" <?= $user->id == $id_owner ? 'selected' : '' ?>>{{$user->name}}</option>
                @empty
                <option>Not Found</option>
                @endforelse
            </select>
            @error('id_owner')
            <label class="label">
                <span class="label-text-alt">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Donor</span>
            </label>
            <select name="id_donor" wire:model="id_donor" class="input @error('id_donor') input-error @enderror input-bordered">
                @forelse($users as $user)
                <option value="{{$user->id}}" <?= $user->id == $id_donor ? 'selected' : '' ?>>{{$user->name}}</option>
                @empty
                <option>Not Found</option>
                @endforelse
            </select>
            @error('id_donor')
            <label class="label">
                <span class="label-text-alt">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Description</span>
            </label>
            <textarea wire:model="description" rows="10" maxlength="400" class="input @error('description') input-error @enderror input-bordered">
            {{ $description }}
            </textarea>
            @error('description')
            <label class="label">
                <span class="label-text-alt">{{ $message }}</span>
            </label>
            @enderror
        </div>
    </div>
    <div class="space-y-2">
        <div class="flex items-center gap-2">
            {{-- Jika pet upload foto, maka ubah previewnya jadi foto yang di upload --}}
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
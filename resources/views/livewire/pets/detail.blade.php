<form wire:submit.prevent='update({{ $petId }})' class="space-y-4" action="">
    <div class="w-40 h-40">
        <img class="w-full h-full object-scale-down" src="{{ asset('storage/' . $photoOld) }}">
    </div>
    <div>
        <table class="table-auto w-full">
            <tbody>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">Pet ID</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full"> {{ $petId }}</td>
                </tr>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">Name</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full"> {{ $name }}</td>
                </tr>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">Familia</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full">
                        @foreach ($familias as $familia)
                        @if ($familia->id == $id_familia)
                        {{$familia->name}}
                        @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">Donor</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full">
                        @foreach ($users as $user)
                        @if ($user->id == $id_donor)
                        {{$user->name}}
                        @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">Owner</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full">
                        @foreach ($users as $user)
                        @if ($user->id == $id_owner)
                        {{$user->name}}
                        @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">Description</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full"> {{ $description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- Kirim emit untuk trigger menutup form --}}
    <button type="button" wire:click="$emit('closeForm')" class="btn">Close</button>
</form>
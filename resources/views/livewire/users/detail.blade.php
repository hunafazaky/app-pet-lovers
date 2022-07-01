<form wire:submit.prevent='update({{ $userId }})' class="space-y-4" action="">
    <div class="w-40 h-40">
        <img class="w-full h-full object-scale-down" src="{{ asset('storage/' . $photoOld) }}">
    </div>
    <div>
        <table class="table-auto w-full">
            <tbody>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">User ID</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full"> {{ $userId }}</td>
                </tr>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">Name</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full"> {{ $name }}</td>
                </tr>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">Email</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full"> {{ $email }}</td>
                </tr>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">Address</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full"> {{ $address }}</td>
                </tr>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">Region</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full">
                        @foreach ($regions as $region)
                        @if ($region->id == $id_region)
                        {{$region->name}}
                        @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="py-2 text-sm align-baseline font-semibold uppercase w-1/4">Phone Number</td>
                    <td class="py-2 text-sm align-baseline px-4"> : </td>
                    <td class="py-2 text-sm align-baseline w-full"> {{ $phone_number }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- Kirim emit untuk trigger menutup form --}}
    <button type="button" wire:click="$emit('closeForm')" class="btn">Close</button>
</form>
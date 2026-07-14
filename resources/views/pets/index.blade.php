<x-layouts::app>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="absolute right-4 top-4 border bg-green-600 text-white font-bold px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a class="text-green-600" href="{{ route('pets.create') }}">Create New Pet</a>

            <div class="p-4 sm:p-8 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium mb-4">Registered Pet</h3>
                <div class="grid grid-cols-4 gap-2">
                    @forelse($pets as $index => $pet)
                        <a href="{{ route('pets.show', $pet->id) }}" class="block w-full p-2 bg-mist-800 border rounded">
                            <figure class="flex flex-col gap-2">
                                <img class="aspect-square object-cover" src="{{ asset('storage/' . $pet->photo) }}"
                                    alt="">
                                <figcaption class="font-bold">{{ $pet->name }}</figcaption>
                            </figure>
                        </a>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-center">There's no
                                registered pet yet</td>
                        </tr>
                    @endforelse
                </div>
                {{-- <table class="w-full table-fixed border-collapse border text-left text-sm">
                    <thead>
                        <tr class="bg-indigo-800">
                            <th class="w-1/2 p-3 border">Pet Name</th>
                            <th class="w-1/4 p-3 border">Created At</th>
                            <th class="w-1/4 p-3 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pets as $index => $pet)
                            <tr class="bg-mist-800">
                                <td class="p-3 border">
                                    <span class="block truncate">{{ $pet->name }}</span>
                                </td>
                                <td class="p-3 border">{{ $pet->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="p-3 border flex">
                                    <a href="{{ route('pets.edit', $pet->id) }}"
                                        class="text-amber-400 hover:text-amber-300 flex items-center gap-1 font-bold text-xs m-1 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                            <path
                                                d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                        </svg>
                                        EDIT
                                    </a>
                                    <form action="{{ route('pets.destroy', $pet->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this pet data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" icon="heart"
                                            class="text-amber-700 hover:text-amber-600 flex items-center justify-center gap-1 font-bold text-xs m-1 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4">
                                                <path
                                                    d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                                <path fill-rule="evenodd"
                                                    d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            DELETE
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-center">There's no
                                    registered pet yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table> --}}
            </div>

        </div>
    </div>
</x-layouts::app>

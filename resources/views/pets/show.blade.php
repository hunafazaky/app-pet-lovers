{{-- <a href="{{ route('pets.edit', $pet->id) }}"
    class="text-amber-400 hover:text-amber-300 flex items-center gap-1 font-bold text-xs m-1 cursor-pointer">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
        <path
            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
        <path
            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
    </svg>
    EDIT
</a>
<form action="{{ route('pets.destroy', $pet->id) }}" method="POST" onsubmit="return confirm('Delete this pet data?')">
    @csrf
    @method('DELETE')
    <button type="submit" icon="heart"
        class="text-amber-700 hover:text-amber-600 flex items-center justify-center gap-1 font-bold text-xs m-1 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
            <path
                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
            <path fill-rule="evenodd"
                d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" />
        </svg>
        DELETE
    </button>
</form> --}}

<x-layouts::app>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="absolute right-4 top-4 border bg-green-600 text-white font-bold px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a class="text-green-600" href="{{ route('pets.index') }}">Pet List</a>

            <div class="p-4 sm:p-8 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium mb-4">Pet Detail Information</h3>
                <div class="bg-mist-800 border border-white rounded p-4">
                    <div class="grid grid-cols-3 gap-2">
                        <img class="object-cover aspect-square rounded" src="{{ asset('storage/' . $pet->photo) }}"
                            alt="">
                        <div class="col-span-2">
                            <div class="border-b pb-2 mb-2 text-lg font-medium">{{ $pet->name }}</div>
                            <div class="grid grid-cols-3">
                                <div class="my-2">
                                    <p class="text-sm font-medium">Gender</p>
                                    <p class="text-sm font-medium">Age</p>
                                    <p class="text-sm font-medium">Category</p>
                                    <p class="text-sm font-medium">Condition</p>
                                    <p class="text-sm font-medium">Owner</p>
                                </div>
                                <div class="col-span-2 my-2">
                                    <p class="text-sm opacity-80">: {{ $pet->gender }}</p>
                                    <p class="text-sm opacity-80">: {{ $pet->age }} Months</p>
                                    <p class="text-sm opacity-80">: {{ $pet->category->name }}</p>
                                    <p class="text-sm opacity-80">: {{ $pet->condition }}</p>
                                    <p class="text-sm opacity-80">: {{ $pet->user->name }}</p>
                                </div>
                            </div>
                            @if ($pet->bio)
                                <div class="text-sm opacity-80">{{ $pet->bio }}</div>
                            @else
                                <div class="text-sm opacity-50">Lorem ipsum dolor sit amet consectetur,
                                    adipisicing elit. Similique, fugit minus quae autem officiis exercitationem
                                    velit nihil at adipisci placeat odio est, eligendi nam a iste rerum? Tempora,
                                    eum commodi!</div>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-end border-t pt-4 mt-4">
                        <a href="{{ route('pets.edit', $pet->id) }}"
                            class="bg-amber-400 hover:bg-amber-300 text-mist-800 flex items-center gap-1 font-bold text-sm m-1 cursor-pointer px-2 py-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5">
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
                                class="bg-amber-700 hover:bg-amber-600 text-white flex items-center justify-center gap-1 font-bold text-sm m-1 cursor-pointer px-2 py-1 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5">
                                    <path
                                        d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                    <path fill-rule="evenodd"
                                        d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                                DELETE
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts::app>

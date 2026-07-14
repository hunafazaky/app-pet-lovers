<x-layouts::app>
    <div class="py-12">
        <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="absolute right-4 top-4 rounded border bg-green-600 px-4 py-2 font-bold text-white">
                    {{ session('success') }}
                </div>
            @endif

            <div class="p-4 shadow sm:rounded-lg sm:p-8">
                <h3 class="mb-4 text-lg font-medium">Register New Pet</h3>
                <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data"
                    class="flex flex-col gap-2">
                    @csrf
                    <label for="name" class="text-sm font-medium">Pet Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full rounded border border-white p-2 shadow-sm sm:text-sm" placeholder="Example: Kuro">
                    <div class="grid grid-cols-3 gap-2">
                        <div>
                            <label for="age" class="text-sm font-medium">Age (In Months)</label>
                            <input type="number" name="age" id="age" value="{{ old('age') }}"
                                class="w-full rounded border border-white p-2 shadow-sm sm:text-sm"
                                placeholder="Example: 1">
                        </div>
                        <div class="col-span-2">
                            <label for="photo" class="text-sm font-medium">Profile Picture</label>
                            <input type="file" name="photo" id="photo"
                                class="w-full rounded border border-white p-2 text-neutral-400 shadow-sm sm:text-sm">
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <div>
                            <label for="category_id" class="text-sm font-medium">Category</label>
                            <select name="category_id" id="category_id"
                                class="w-full rounded border border-white p-2 shadow-sm sm:text-sm">
                                {{-- <option class="bg-mist-800">Select</option> --}}
                                @foreach ($categories as $category)
                                    <option class="bg-mist-800" value="{{ $category->id }}">{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="gender" class="text-sm font-medium">Gender</label>
                            <select name="gender" id="gender"
                                class="w-full rounded border border-white p-2 shadow-sm sm:text-sm">
                                {{-- <option class="bg-mist-800">Select</option> --}}
                                <option class="bg-mist-800" value="Male">Male</option>
                                <option class="bg-mist-800" value="Female">Female</option>
                            </select>
                        </div>
                        <div>
                            <label for="condition" class="text-sm font-medium">Condition</label>
                            <select name="condition" id="condition"
                                class="w-full rounded border border-white p-2 shadow-sm sm:text-sm">
                                {{-- <option class="bg-mist-800">Select</option> --}}
                                <option class="bg-mist-800" value="Healthy">Healthy</option>
                                <option class="bg-mist-800" value="Sick">Sick</option>
                            </select>
                        </div>
                    </div>
                    <label for="bio" class="text-sm font-medium">Bio</label>
                    <textarea name="bio" id="bio" rows="3"
                        class="w-full rounded border border-white p-2 shadow-sm sm:text-sm"
                        placeholder="Short story about your cute pet >_<"></textarea>
                    <button type="submit"
                        class="w-1/4 rounded bg-green-600 py-2 font-bold text-white hover:bg-green-800">
                        Save
                    </button>
                    @if ($errors->any())
                        <div class="rounded border border-red-700 bg-red-500 px-4 py-2 text-sm text-white">
                            <p class="font-bold">Gagal menyimpan data karena ada error berikut:</p>
                            <ul class="mt-1 list-inside list-disc">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>

            <div class="p-4 shadow sm:rounded-lg sm:p-8">
                <h3 class="mb-4 text-lg font-medium">Registered Pet</h3>
                <div class="my-2 grid grid-cols-2 gap-2">
                    @forelse($pets as $index => $pet)
                        <div class="bg-mist-800 grid grid-cols-2 gap-2 rounded border border-white p-4 font-bold">
                            <div>
                                <img class="aspect-3/2 object-cover" src="{{ asset('storage/' . $pet->photo) }}"
                                    alt="">
                            </div>
                            <div class="flex flex-col gap-1">
                                <div class="mb-1 border-b pb-2">{{ $pet->name }} ({{ $pet->age }} Months)</div>
                                <div class="text-xs font-light">Category: {{ $pet->category->name }}</div>
                                <div class="text-xs font-light">Gender: {{ $pet->gender }}</div>
                                <div class="text-xs font-light">Condition: {{ $pet->condition }}</div>
                                <div class="text-xs font-light">Owner: {{ $pet->user->name }}</div>
                            </div>
                            <div class="col-span-2 font-normal">
                                @if ($pet->bio)
                                    <div class="min-h-18 line-clamp-3">{{ $pet->bio }}</div>
                                @else
                                    <div class="min-h-18 line-clamp-3 opacity-50">Lorem ipsum dolor sit amet
                                        consectetur,
                                        adipisicing elit. Similique, fugit minus quae autem officiis exercitationem
                                        velit nihil at adipisci placeat odio est, eligendi nam a iste rerum? Tempora,
                                        eum commodi!</div>
                                @endif
                            </div>
                            <div class="col-span-2 mt-auto flex border-t pt-4">
                                <button
                                    class="m-1 flex cursor-pointer items-center gap-1 text-xs font-bold text-amber-400 hover:text-amber-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path
                                            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>
                                    EDIT
                                </button>
                                <button
                                    class="m-1 flex cursor-pointer items-center justify-center gap-1 text-xs font-bold text-amber-700 hover:text-amber-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4">
                                        <path fill-rule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>
                                        DELETE
                                    </span>
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="whitespace-nowrap py-20 text-center">There's no
                            registered pet yet</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-layouts::app>

<x-layouts::app>
    <div class="py-12">
        <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="absolute right-4 top-4 rounded border bg-green-600 px-4 py-2 font-bold text-white">
                    {{ session('success') }}
                </div>
            @endif

            <a class="text-green-600" href="{{ route('pets.show', $pet->id) }}">Pet Detail</a>

            <div class="p-4 shadow sm:rounded-lg sm:p-8">
                <h3 class="mb-4 text-lg font-medium">Edit Pet</h3>
                <form action="{{ route('pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data"
                    class="flex flex-col gap-2">
                    @csrf
                    @method('PUT')
                    <div class="grid w-full grid-cols-4 gap-2">
                        <figure>
                            <figcaption class="mb-1 text-sm font-medium">Photo Preview</figcaption>
                            @if ($pet->photo)
                                <img id="image-preview" src="{{ asset('storage/' . $pet->photo) }}"
                                    class="aspect-square rounded object-cover">
                            @else
                                <img id="image-preview" class="hidden aspect-square rounded object-cover">
                                <div id="no-photo-placeholder"
                                    class="bg-mist-200 text-mist-400 flex aspect-square items-center justify-center rounded object-cover">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-12">
                                        <path fill-rule="evenodd"
                                            d="m6.72 5.66 11.62 11.62A8.25 8.25 0 0 0 6.72 5.66Zm10.56 12.68L5.66 6.72a8.25 8.25 0 0 0 11.62 11.62ZM5.105 5.106c3.807-3.808 9.98-3.808 13.788 0 3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @endif
                        </figure>
                        <div class="col-span-3">
                            <label for="name" class="text-sm font-medium">Pet Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $pet->name) }}"
                                required class="w-full rounded border border-white p-2 shadow-sm sm:text-sm"
                                placeholder="Example: Kuro">
                            <div class="grid grid-cols-3 gap-2">
                                <div>
                                    <label for="age" class="text-sm font-medium">Age (In Months)</label>
                                    <input type="number" name="age" id="age"
                                        value="{{ old('age', $pet->age) }}" required
                                        class="w-full rounded border border-white p-2 shadow-sm sm:text-sm"
                                        placeholder="Example: 7">
                                </div>
                                <div class="col-span-2">
                                    <label for="photo" class="text-sm font-medium">Avatar</label>
                                    <input type="file" name="photo" id="photo" accept="image/*"
                                        onchange="previewImage(event)"
                                        class="w-full rounded border border-white p-2 text-neutral-400 shadow-sm sm:text-sm">
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <div>
                                    <label for="category_id" class="text-sm font-medium">Category</label>
                                    <select name="category_id" id="category_id" required
                                        class="w-full rounded border border-white p-2 shadow-sm sm:text-sm">
                                        @foreach ($categories as $category)
                                            <option class="bg-mist-800" @selected($pet->category_id == $category->id)
                                                value="{{ $category->id }}">{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="gender" class="text-sm font-medium">Gender</label>
                                    <select name="gender" id="gender" required
                                        class="w-full rounded border border-white p-2 shadow-sm sm:text-sm">
                                        <option class="bg-mist-800" @selected($pet->gender === 'Male') value="Male">Male
                                        </option>
                                        <option class="bg-mist-800" @selected($pet->gender === 'Female') value="Female">
                                            Female</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="condition" class="text-sm font-medium">Condition</label>
                                    <select name="condition" id="condition" required
                                        class="w-full rounded border border-white p-2 shadow-sm sm:text-sm">
                                        <option class="bg-mist-800" @selected($pet->condition === 'Healthy') value="Healthy">Healthy
                                        </option>
                                        <option class="bg-mist-800" @selected($pet->condition === 'Sick') value="Sick">Sick
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <label for="bio" class="text-sm font-medium">Bio</label>
                            <textarea name="bio" id="bio" rows="3"
                                class="w-full rounded border border-white p-2 shadow-sm sm:text-sm"
                                placeholder="Example: Cute cat, grumpy when starved">{{ old('bio', $pet->bio) }}</textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="ml-auto w-1/4 rounded bg-green-600 px-4 py-2 font-bold text-white hover:bg-green-800">
                        Update
                    </button>
                    @if ($errors->any())
                        <div class="rounded border border-red-700 bg-red-500 px-4 py-2 text-sm text-white">
                            <p class="font-bold">Failed with Error:</p>
                            <ul class="mt-1 list-inside list-disc">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>

        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('no-photo-placeholder');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');

                    if (placeholder) {
                        placeholder.classList.add('hidden');
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-layouts::app>

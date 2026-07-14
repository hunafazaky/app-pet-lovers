<x-layouts::app>
    <div class="py-12">
        <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="absolute right-4 top-4 rounded border bg-green-600 px-4 py-2 font-bold text-white">
                    {{ session('success') }}
                </div>
            @endif

            <a class="text-green-600" href="{{ route('categories.index') }}">Category List</a>

            <div class="p-4 shadow sm:rounded-lg sm:p-8">
                <h3 class="mb-4 text-lg font-medium">Register New Category</h3>
                <form action="{{ route('categories.store') }}" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <label for="name" class="text-sm font-medium">Category Name</label>
                    <div class="flex gap-2">
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="w-full rounded border border-white p-2 shadow-sm sm:text-sm"
                            placeholder="Example: Hamster">
                        <button type="submit"
                            class="rounded bg-green-600 px-4 py-2 font-bold text-white hover:bg-green-800">
                            Register
                        </button>
                    </div>
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
</x-layouts::app>

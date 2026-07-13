<x-layouts::app>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="absolute right-4 top-4 border bg-green-600 text-white font-bold px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a class="text-green-600" href="{{ route('locations.index') }}">Location List</a>

            <div class="p-4 sm:p-8 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium mb-4">Register New Location</h3>
                <form action="{{ route('locations.store') }}" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <label for="name" class="text-sm font-medium">Location Name</label>
                    <div class="flex gap-2">
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="p-2 w-full border border-white rounded shadow-sm sm:text-sm"
                            placeholder="Example: Cilegon">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-800 text-white font-bold px-4 py-2 rounded">
                            Create
                        </button>
                    </div>
                    @if ($errors->any())
                        <div class="bg-red-500 border border-red-700 text-white px-4 py-2 rounded text-sm">
                            <p class="font-bold">Failed with Error:</p>
                            <ul class="list-disc list-inside mt-1">
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

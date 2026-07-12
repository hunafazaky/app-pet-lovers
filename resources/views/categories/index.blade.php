<x-layouts::app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Lokasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="absolute right-4 top-4 border bg-green-600 text-white font-bold px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="p-4 sm:p-8 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium mb-4">Register New Category</h3>
                <form action="{{ route('categories.store') }}" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <label for="name" class="text-sm font-medium">Category Name</label>
                    <div class="flex gap-2">
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="p-2 w-full border border-white rounded shadow-sm sm:text-sm"
                            placeholder="Example: Cat">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-800 text-white font-bold px-4 py-2 rounded">
                            Save
                        </button>
                    </div>
                    @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </form>
            </div>

            <div class="p-4 sm:p-8 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium mb-4">Registered Category</h3>
                <table class="w-full table-fixed border-collapse border text-left text-sm">
                    <thead>
                        <tr class="bg-indigo-800">
                            <th class="w-1/3 p-3 border">Category Name</th>
                            <th class="w-20 p-3 border">Index</th>
                            <th class="w-1/4 p-3 border">Created At</th>
                            <th class="w-40 p-3 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $index => $location)
                            <tr class="bg-mist-800">
                                <td class="p-3 border">
                                    <span class="block truncate">{{ $location->name }}</span>
                                </td>
                                <td class="p-3 border">{{ $location->id }}</td>
                                <td class="p-3 border">{{ $location->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="p-3 border flex">
                                    <button
                                        class="text-amber-400 hover:text-amber-300 flex items-center gap-1 font-bold text-xs m-1 cursor-pointer">
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
                                        class="text-amber-700 hover:text-amber-600 flex items-center justify-center gap-1 font-bold text-xs m-1 cursor-pointer">
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
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-center">There's no registered category yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-layouts::app>

<x-layouts::app>
    <div class="py-12">
        <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="absolute right-4 top-4 rounded border bg-green-600 px-4 py-2 font-bold text-white">
                    {{ session('success') }}
                </div>
            @endif

            <a class="text-green-600" href="{{ route('pets.create') }}">Create New Pet</a>

            <div class="p-4 shadow sm:rounded-lg sm:p-8">
                <h3 class="mb-4 text-lg font-medium">Registered Pet</h3>
                <div class="grid grid-cols-4 gap-2">
                    @forelse($pets as $index => $pet)
                        <a href="{{ route('pets.show', $pet->id) }}" class="bg-mist-800 block w-full rounded border p-2">
                            <figure class="flex flex-col gap-2">
                                <img class="aspect-square object-cover" src="{{ asset('storage/' . $pet->photo) }}"
                                    alt="">
                                <figcaption class="font-bold">{{ $pet->name }}</figcaption>
                            </figure>
                        </a>
                    @empty
                        <section>
                            <div class="whitespace-nowrap px-6 py-4 text-center text-sm">There's no
                                registered pet yet</div>
                        </section>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-layouts::app>

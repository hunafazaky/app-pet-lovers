<div class="max-w-3xl mx-auto my-10">
    <div class="space-y-4">
        <a href="/users">Users</a>
        <h1 class="text-2xl font-black text-gray-800">@yield('page_title')</h1>
        @if ($formVisible)
        @if ($formVisible === 'edit')
        @yield('edit')
        <!-- <livewire:users.edit /> -->
        @else
        @yield('create')
        <!-- <livewire:users.create /> -->
        @endif
        @else
        <button wire:click="create" class="btn btn-primary">New</button>
        @endif
    </div>
    <hr class="my-6">
    @yield('content')
</div>
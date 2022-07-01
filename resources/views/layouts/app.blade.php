<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Pet Lovers</title>
    <livewire:styles />
</head>

<body>
    <div class="overflow-x-hidden relative min-h-screen">
        <nav class="bg-white py-4 border-b border-gray-100">
            <div class="container px-8 mx-auto">
                <a class="text-gray-800 uppercase tracking-wider text-xl font-bold" href="#"><span class="font-black text-primary">Pet</span>Lovers</a>
                <a class="text-gray-800 font-bold mx-5" href="/">Home</a>
                <a class="text-gray-800 font-bold mx-5" href="/users">USER</a>
                <a class="text-gray-800 font-bold mx-5" href="/pets">PET</a>
                <a class="text-gray-800 font-bold mx-5" href="/familias">FAMILIA</a>
                <a class="text-gray-800 font-bold mx-5" href="/regions">REGION</a>
            </div>
            <div class="container px-8 mx-auto">
            </div>
        </nav>
        {{ $slot }}
    </div>
    <livewire:scripts />
</body>

</html>
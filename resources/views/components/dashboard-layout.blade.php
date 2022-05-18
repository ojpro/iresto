<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Links Stles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
    {{-- JS Scripts --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
{{-- TODO: refactor the code to check the route for the sidebar --}}
<div class="flex h-screen bg-gray-200 font-roboto" x-data="{sidebarOpen: false,dropdownOpen : false }">
    <x-sidebar></x-sidebar>

    <div class="flex-1 flex flex-col overflow-hidden">
        <x-header></x-header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>
</body>
</html>
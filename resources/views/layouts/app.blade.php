<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bakso Ojolali</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 min-h-screen">
    {{-- <div class="container mx-auto flex"> --}}
        <main class="flex-1">
            @yield('content')
        </main>
    {{-- </div> --}}

    {{-- flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>

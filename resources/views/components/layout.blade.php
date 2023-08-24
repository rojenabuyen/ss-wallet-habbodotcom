<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <title>SS Wallet</title>
    <link rel="icon" type="image/x-icon" href="https://habboss.org/wp-content/uploads/2020/05/cropped-SS-1-32x32.png">
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="dark from-10% via-30% to-90% mx-auto mt-10 max-w-5xl bg-gradient-to-r from-slate-700 to-gray-500 pt-10">
    
    <x-navbar>


    </x-navbar>
            <div x-data="{ flash:true }">
            <div>
                @if(session()->has('success'))
            
                <div x-show="flash" class="relative rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
                    <p class="font-bold">Success!</p>
                    <p>{{ session('success')}}</p>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" @click="flash = false"
                        stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </div>
            @endif
            @if(session()->has('error'))
                <div x-show="flash" class="relative rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
                    <p class="font-bold">Error!</p>
                    <p>{{ session('error')}}</p>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" @click="flash = false"
                        stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </div>
        
        
            @endif
            </div>
            </div>
            {{ $slot }}          
</body>
</html>
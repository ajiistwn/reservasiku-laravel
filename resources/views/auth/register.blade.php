<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body>
    @yield('content')
    @if ($errors->any())
    <div class="fixed top-4 left-1/2 transform -translate-x-1/2 w-full max-w-md z-50" id="alert">
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 bg-red-50 border border-red-200 rounded-lg dark:text-red-400 dark:bg-red-200 dark:border-red-800" role="alert" id="alertBox">
            <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm1-8a1 1 0 0 1-2 0V7a1 1 0 0 1 2 0v3Z" clip-rule="evenodd" />
            </svg>
            <div>
                <span class="font-medium">Perhatian!</span> 
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <div class="flex justify-center items-center min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('ImageLogin/bukit.jpg') }}');">
        <div class="bg-white bg-opacity-60 backdrop-blur-lg p-8 rounded-lg shadow-lg max-w-sm w-full">
            <div class="flex items-center justify-center mb-5">
                <img src="https://cdn-icons-png.flaticon.com/128/159/159037.png" alt="Lock Icon" class="w-6 h-6 mr-2">
                <h2 class="text-center text-2xl font-semibold text-gray-900 dark:text-white">Sign Up</h2>
            </div>
            <form action="/auth/register" method="POST" class="space-y-5">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Username" required />
                    </div> 
                    
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                        <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter phone number" pattern="(\d{3}[-\s]?)?\d{4}[-\s]?\d{3}"
                        required />
                    </div>
                    <div>
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                        <input type="text" id="city" name="city" value="{{ old('city') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="City" required />
                    </div>
                    <div>
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                        <select id="country" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="indonesia">Indonesia</option>
                            <option value="usa">USA</option>
                            <option value="uk">UK</option>
                        </select>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="E-mail" required />
                </div> 
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                </div> 
                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                </div> 
                {{-- <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
                    </div>
                    <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
                </div> --}}
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">
                Already registered?
                <a href="{{ route('login') }}" class="text-blue-700 hover:underline dark:text-blue-500">Sign in</a>
            </p>
        </div>
    </di
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        const alertBox = document.getElementById('alertBox');
        if (alertBox) {
            alertBox.addEventListener('click', function () {
                alertBox.style.display = 'none';
            });
            setTimeout(function () {
                if (alertBox) {
                    alertBox.style.display = 'none';
                }
            }, 2000); 
        }
    </script>
</body>
</html>

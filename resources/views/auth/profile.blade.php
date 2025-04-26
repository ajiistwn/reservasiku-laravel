<x-layouts.app>
    <div class="flex items-center justify-center min-h-screen bg-cover bg-center bg-no-repeat bg-[url('/public/img/homeImage.jpeg')] bg-gray-400 bg-blend-multiply" >
        <div class="w-full max-w-sm p-8 bg-white rounded-lg shadow-lg bg-opacity-60 backdrop-blur-lg">
            <div class="flex flex-col items-center justify-center mb-5">
                <img class="rounded-full w-30" src="{{ Auth::user()->image }}" alt="image description">
            </div>

            <div class="space-y-5">
                <div class="flex flex-col gap-1 mb-5">
                    <p>Nama : {{Auth::user()->name}}</p>
                    <p>Email : {{Auth::user()->email}}</p>
                    <p>Phone : {{Auth::user()->phone}}</p>
                    <p>Address :</p>
                    <p>{{Auth::user()->address}}</p>
                    <br>
                    {{Auth::user()->country}}, {{Auth::user()->city}}
                    </p>
                </div>
                <div class="flex gap-2 mb-5">
                    <a href="{{route('edit') }}">
                        <button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Edit</button>
                    </a>
                    <a href="{{route('logout') }}">
                        <button  class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Logout</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

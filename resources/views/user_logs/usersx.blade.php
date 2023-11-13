<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="w-4/5 mx-auto my-4 sm:w-1/2">
                <h2 class="text-2xl semi-bold mb-10 text-center">All Users</h2>

                @php $users = DB::table('users')->get(); @endphp
                <table class="border-1 shadow-xl w-full">
                    <tr class="bg-gray-300">
                        <th class="py-2 text-center">Name</th>
                        <th class="py-2 text-center">Email</th>
                        <th class= "py-2 text-center">Last Seen</th>
                        <th class="py-2 text-center">Status</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td class="py-2 text-center">{{$user->name}}</td>
                            <td class="py-2 text-center">{{$user->email}}</td>
                            <td class="py-2 text-center">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                            </td>
                            <td class="py-2 text-center">
                                @if(Cache::has('user-online' . $user->id))
                                    <span class="text-green-500">Online</span>
                                @else
                                    <span class="text-gray-500">Offline</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </table>

            </div>

        </div>
    </body>
</html>
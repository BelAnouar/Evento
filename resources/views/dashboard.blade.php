<x-app-layout>
    <div class="w-full mx-w-4xl">
        
        <section class="grid w-full grid-cols-1 gap-4 px-4 mt-4 md:grid-cols-2 xl:grid-cols-3">
            <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">   {{ count($users) }}</span>
                        <h3 class="text-base font-normal text-gray-500">Users</h3>
                    </div>
                
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">  {{ count($events) }}</span>
                        <h3 class="text-base font-normal text-gray-500">Eevents</h3>
                    </div>
                  
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">{{$categorie}}</span>
                        <h3 class="text-base font-normal text-gray-500">Categories</h3>
                    </div>
                   
                </div>
            </div>
        </section>


        <section class="container px-4 mx-auto sm:px-8">
            <div class="py-8">


                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">






                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        User
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Rol
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        email
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Status
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        check
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <div class="flex items-center gap-3">
                                                        <img src="{{ asset('storage/images/' . $event->image->image) }}"
                                                            alt="Spotify"
                                                            class="relative inline-block h-12 w-12 !rounded-full border border-blue-gray-50 bg-blue-gray-50/50 object-contain object-center p-1" />

                                                </div>
                                               
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $event->title }}
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $event->date }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                                                {{ $event->is_approved }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <form action="{{route('Aprouve',['id'=>$event->id])}}" method="post">
                                                <button
                                                    class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                    type="submit">
                                                    @csrf
                                                    @method('PUT')
                                                    <span
                                                        class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                        </svg>


                                                    </span>
                                                </button>
                                                </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </section>


        
    <section class="grid grid-cols-1 p-4 my-4 2xl:grid-cols-2 xl:gap-4">

        <div class="h-full p-4 mb-4 bg-white rounded-lg shadow sm:p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold leading-none text-gray-900">Latest Customers</h3>
                <a href="#"
                    class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">
                    View all
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200">
                    @forelse ($clients as $client)
                        <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full"
                                    src="https://demo.themesberg.com/windster/images/users/neil-sims.png"
                                    alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                   {{$client->name}}
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="17727a767e7b57607e7973646372653974787a"> {{$client->email}}</a>
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                 <form action="{{ route('access') }}" method="POST">
                                    @method("PATCH")
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $client->id }}">
                                   
                                    @if ($client->access === 'Blocked')
                                        <button name="access" value="Blocked"
                                            class="btn blockedbutton">Blocked</button>
                                    @else
                                        <button name="access" value="Accessible"
                                            class="btn Accessiblebutton">Accessible</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </li>
                     
                        
                    @empty
                        
                  
                       Data Notfound
                     @endforelse
                    
                
                </ul>
            </div>
        </div>


    </section>
    <section class="grid grid-cols-1 p-4 my-4 2xl:grid-cols-2 xl:gap-4">

        <div class="h-full p-4 mb-4 bg-white rounded-lg shadow sm:p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold leading-none text-gray-900">Latest Customers</h3>
                <a href="#"
                    class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">
                    View all
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200">
                    @forelse ($organizers as $organizer)
                        <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full"
                                    src="https://demo.themesberg.com/windster/images/users/neil-sims.png"
                                    alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                   {{$organizer->name}}
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="17727a767e7b57607e7973646372653974787a">   {{$organizer->email}}</a>
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                <form action="{{ route('access') }}" method="POST">
                                    @method("PATCH")
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $organizer->id }}">
                                  
                                    @if ($organizer->access === 'Blocked')
                                         <button name="access" value="Accessible"
                                            class="btn Accessiblebutton">Accessible</button>
                                    @else
                                    <button name="access" value="Blocked"
                                            class="btn blockedbutton">Blocked</button>
                                       
                                    @endif
                                </form>
                            </div>
                        </div>
                    </li>
                     
                        
                    @empty
                        
                  
                       Data Notfound
                     @endforelse
                    
                
                </ul>
            </div>
        </div>


    </section>
    </div>
</x-app-layout>

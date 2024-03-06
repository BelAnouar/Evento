<x-app-layout>
    <div class="w-full mx-w-4xl">
        <section class='grid gap-3 p-4 px-4 lg:grid-cols-6'>
            <div class='flex justify-between w-full col-span-1 p-4 bg-green-200 border rounded-lg lg:col-span-2'>
                <div class='flex flex-col w-full pb-4'>
                    <p class='text-2xl font-bold'>{{ count($users) }}</p>
                    <p class='text-gray-600'>Users</p>
                </div>
                <div class='flex items-center justify-center p-4 bg-green-400 rounded-lg'>
                    <span class='text-lg text-green-700'>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                            <path
                                d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                        </svg>

                    </span>
                </div>
            </div>
            <div class='flex justify-between w-full col-span-1 p-4 bg-blue-200 border rounded-lg lg:col-span-2'>
                <div class='flex flex-col w-full pb-4'>
                    <p class='text-2xl font-bold'>k</p>
                    <p class='text-gray-600'>Organisateur</p>
                </div>
                <div class='flex items-center justify-center p-4 bg-blue-400 rounded-lg'>
                    <span class='text-lg text-blue-700'>
                        Icon
                    </span>
                </div>
            </div>
            <div class='flex justify-between w-full col-span-1 p-4 bg-yellow-200 border rounded-lg lg:col-span-2'>
                <div class='flex flex-col w-full pb-4'>
                    <p class='text-2xl font-bold'>{{ count($events) }}
                    </p>
                    <p class='text-gray-600'>Events</p>
                </div>
                <div class='flex items-center justify-center p-4 bg-yellow-400 rounded-lg'>
                    <span class='text-lg text-yellow-700'>
                        icon
                    </span>
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
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $event->title }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $event->description }}
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $event->date }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                                                {{ $event->location }}
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
    </div>
</x-app-layout>

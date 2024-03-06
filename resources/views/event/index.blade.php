<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                @if (session('success'))
                    <div class="relative p-4 px-4 py-3 my-4 text-green-700 bg-green-100 border border-green-400 rounded "
                        role="alert" id="successMessage">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div
                        class="relative flex items-center justify-between p-6 m-0 overflow-hidden text-gray-700 bg-transparent shadow-none bg-clip-border rounded-xl">
                        <h6>Catégories d'événements</h6>


                        <a class="flex select-none items-center gap-3 rounded-lg bg-gray-900 py-3 px-5 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            href="{{ route('event.create') }}">

                            Créer une event</a>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <div
                                class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
                                <div
                                    class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white rounded-none bg-clip-border">
                                    <div class="flex flex-col justify-between gap-8 mb-4 md:flex-row md:items-center">
                                        <div>
                                            <h5
                                                class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                                Recent Events
                                            </h5>
                                            <p
                                                class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                                                These are details about the last transactions
                                            </p>
                                        </div>
                                        {{-- <div class="flex w-full gap-2 shrink-0 md:w-max">
                                            <div class="w-full md:w-72">
                                                <div class="relative h-10 w-full min-w-[200px]">
                                                    <div
                                                        class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            aria-hidden="true" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <input
                                                        class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                        placeholder=" " />
                                                    <label
                                                        class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                                        Search
                                                    </label>
                                                </div>
                                            </div>
                                            <button
                                                class="flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    aria-hidden="true" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3">
                                                    </path>
                                                </svg>
                                                Download
                                            </button>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="p-6 px-0 overflow-scroll">
                                    <table class="w-full text-left table-auto min-w-max">
                                        <thead>
                                            <tr>
                                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                                    <p
                                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                        Transaction
                                                    </p>
                                                </th>
                                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                                    <p
                                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                        Amount
                                                    </p>
                                                </th>
                                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                                    <p
                                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                        Date
                                                    </p>
                                                </th>
                                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                                    <p
                                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                        Status
                                                    </p>
                                                </th>
                                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                                    <p
                                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                        Account
                                                    </p>
                                                </th>
                                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                                    <p
                                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                    </p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($events as $event)
                                                <tr>
                                                    <td class="p-4 border-b border-blue-gray-50">
                                                        <div class="flex items-center gap-3">
                                                            <img src="{{ asset('storage/images/' . $event->image->image) }}"
                                                                alt="Spotify"
                                                                class="relative inline-block h-12 w-12 !rounded-full border border-blue-gray-50 bg-blue-gray-50/50 object-contain object-center p-1" />
                                                            <p
                                                                class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                                                {{ $event->title }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 border-b border-blue-gray-50">
                                                        <p
                                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                                            {{ $event->description }}
                                                        </p>
                                                    </td>
                                                    <td class="p-4 border-b border-blue-gray-50">
                                                        <p
                                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                                            {{ $event->date }}
                                                        </p>
                                                    </td>
                                                    <td class="p-4 border-b border-blue-gray-50">
                                                        <div class="w-max">
                                                            <div
                                                                class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                                                                <span class="">{{ $event->location }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 border-b border-blue-gray-50">
                                                        <div class="flex items-center gap-3">

                                                            <div class="flex flex-col">
                                                                <p
                                                                    class="block font-sans text-sm antialiased font-normal leading-normal capitalize text-blue-gray-900">
                                                                    {{ $event->available_seats }}
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-2 border-b border-blue-gray-50">
                                                        <form class="flex flex-row" action="{{ route('event.destroy', ['event' => $event]) }}"
                                                            method="post">
                                                            <div class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                                            <a 
                                                                href="{{ route('event.edit', ['event' => $event]) }}">
                                                                <span
                                                                    class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="currentColor"
                                                                        aria-hidden="true" class="w-4 h-4">
                                                                        <path
                                                                            d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                            </a>
</div>
                                                            <button
                                                                class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                                type="submit">
                                                                @csrf
                                                                @method('DELETE')
                                                                <span
                                                                    class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class="w-4 h-4">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                    </svg>

                                                                </span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            @empty
                                                no data
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
                                    <button
                                        class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button">
                                        Previous
                                    </button>
                                    <div class="flex items-center gap-2">
                                        <button
                                            class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg border border-gray-900 text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                1
                                            </span>
                                        </button>
                                        <button
                                            class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                2
                                            </span>
                                        </button>
                                        <button
                                            class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                3
                                            </span>
                                        </button>
                                        <button
                                            class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                ...
                                            </span>
                                        </button>
                                        <button
                                            class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                8
                                            </span>
                                        </button>
                                        <button
                                            class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                9
                                            </span>
                                        </button>
                                        <button
                                            class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                10
                                            </span>
                                        </button>
                                    </div>
                                    <button
                                        class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button">
                                        Next
                                    </button>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>

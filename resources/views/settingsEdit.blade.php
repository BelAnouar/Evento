<x-app-layout>
    <div class="w-full mx-w-4xl">
        <section
            class="flex w-4/5 mx-auto mt-2 bg-contain border shadow-lg justify-evenly bg-primary-50 bg-dotted-pattern">
            <div class="grid grid-cols-1 p-5 md:p-10 md:grid-cols-2 2xl:max-w-7xl">

                <img width="1000" height="1000" src="{{ asset('storage/images/' . $event->image->image) }}"
                    alt="hero image" class="h-full min-h-[300px] object-cover object-center" />

                <div class="flex flex-col w-full gap-8 p-5 md:p-10">
                    <div class="flex flex-col gap-6">
                        <h2 class='h2-bold'>{{ $event->title }}</h2>

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                            <div class="flex gap-3">

                                <p class="p-medium-16 rounded-full bg-grey-500/10 px-4 py-2.5 text-grey-500">
                                    {{ $event->category->name }}
                                </p>
                            </div>

                            <p class="mt-2 ml-2 p-medium-18 sm:mt-0">
                                by <span class="text-primary-500">
                                    anw</span>
                            </p>
                        </div>
                    </div>



                    <div class="flex flex-col gap-5">
                        <div class='flex gap-2 md:gap-3'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>


                            <div class="flex flex-wrap items-center p-medium-16 lg:p-regular-20">
                                <p>
                                    {{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }} -
                                    {{ \Carbon\Carbon::parse($event->date)->format('H:i:s') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-regular-20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>


                            <p class="p-medium-16 lg:p-regular-20">{{ $event->location }}</p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <p class="p-bold-20 text-grey-600">What You'll Learn:</p>
                        <p class="p-medium-16 lg:p-regular-18">{{ $event->description }}</p>
                        <p class="underline truncate p-medium-16 lg:p-regular-18 text-primary-500">Number seats :
                            {{ $event->available_seats }}</p>
                    </div>
                </div>
            </div>
        </section>

        <table class="w-full mt-4 text-left table-auto min-w-max">
            <thead>
                <tr>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                        <p
                            class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Member
                        </p>
                    </th>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                        <p
                            class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Function
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
                            Employed
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
                @forelse ($event->reservations as $reservation)
                    <tr>
                        <td class="p-4 border-b border-blue-gray-50">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('storage/images/' . $reservation->user->image) }}" alt="User Image"
                                    class="relative inline-block h-12 w-12 !rounded-full border border-blue-gray-50 bg-blue-gray-50/50 object-contain object-center p-1" />
                                <p
                                    class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                    {{ $reservation->user->name }}
                                </p>
                            </div>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            {{ $reservation->user->email }}
                        </td>
                       

                        <td class="p-4 border-b border-blue-gray-50">
                            <form  class="flex flex-row justify-between w-full gap-8" action="{{ route('checkout.update', ['id' => $reservation->id]) }}" method="post">
                                <select name="status"
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">

                                    <option value="accepted"
                                        {{ $reservation->status == 'accepted' ? 'selected' : '' }}>accepted</option>
                                    <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="rejected"
                                        {{ $reservation->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                                <button
                                    class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all bg-green-500 hover:bg-green-900/10 active:bg-green-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="submit">
                                    @csrf
                                    @method('PUT')
                                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>


                                    </span>
                                </button>

                            </form>
                        </td>


                    </tr>
                @empty

                    <tr>
                        <td colspan="5" class="p-4 border-b border-blue-gray-50">
                            No reservations for this event yet.
                        </td>
                    </tr>
                @endforelse



            </tbody>
        </table>
    </div>


</x-app-layout>

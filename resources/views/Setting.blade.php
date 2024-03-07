<x-app-layout>
    <div class="w-full mx-w-4xl">
        <div class="relative flex flex-col w-full h-full m-2 text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">

            <div class="p-6 px-0 overflow-scroll">
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
                        @forelse ($events as $event)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('storage/images/' . $event->image->image) }}" alt="Spotify"
                                            class="relative inline-block h-12 w-12 !rounded-full border border-blue-gray-50 bg-blue-gray-50/50 object-contain object-center p-1" />
                                        <a href="/settings/{{$event->id}}"
                                            class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                            {{ $event->title }}
                                        </a>
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

                                    <style>
                                        .toggle-checkbox:checked {
                                            @apply: right-0 border-green-400;
                                            right: 0;
                                            border-color: #68D391;
                                        }

                                        .toggle-checkbox:checked+.toggle-label {
                                            @apply: bg-green-400;
                                            background-color: #68D391;
                                        }
                                    </style>

                                         <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <div
                                            class="relative inline-block w-10 mr-2 align-middle transition duration-200 ease-in select-none">
                                            <input value="{{$event->id}}" type="checkbox" name="toggle" id="toggle"
                                                {{ $event->reservationApproval == 'automatic' ? 'checked' : '' }}
                                                class="absolute block w-6 h-6 bg-white border-4 rounded-full appearance-none cursor-pointer toggle-checkbox" />

                                            <label for="toggle"
                                                class="block h-6 overflow-hidden bg-gray-300 rounded-full cursor-pointer toggle-label"></label>
                                        </div>
                                        <label for="toggle" class="text-xs text-gray-700">auto Reserve</label>
                                
                                </td>
                            </tr>

                        @empty
                            no data
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                    Page 1 of 10
                </p>
                <div class="flex gap-2">
                    <button
                        class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button">
                        Previous
                    </button>
                    <button
                        class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const toggleSwitch = document.querySelectorAll('#toggle');
        console.log(toggleSwitch);
        toggleSwitch.forEach(ele => {
            ele.addEventListener('change', function() {
                console.log("Is checked?", this.checked);
                console.log("Is checked?", this.value);
                let isChecked = this.checked
                let valueEvent=this.value
                fetch('http://localhost/settings/update', {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),
                        },
                        body: JSON.stringify({
                            isChecked: isChecked,
                            idEvent:valueEvent
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.message);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        })
    </script>
</x-app-layout>

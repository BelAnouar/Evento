<x-app-layout>
    <div class="w-full mx-w-4xl">
        <div class="h-full m-4 mb-4 bg-white rounded-lg shadow-xl sm:p-6">
            <form class='flex flex-col justify-start gap-10 ' method='POST' action='{{route("event.store")}}' enctype='multipart/form-data'>
                @csrf
                @method('POST')

                <div class='items-center block gap-4 mx-auto '>
                    <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                        <input type="file" name="image" class="hidden" x-ref="photo"
                            x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                    ">

                        <label class="block mb-2 text-sm font-bold text-center text-gray-700" for="image">
                            Image <span class="text-red-600">*</span>
                        </label>

                        <div class="text-center">
                            <div class="mt-2" x-show="! photoPreview">
                                <img src="https://images.unsplash.com/photo-1531316282956-d38457be0993?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80"
                                    class="w-40 h-40 m-auto rounded-full shadow">
                            </div>

                            <div class="mt-2" x-show="photoPreview" style="display: none;">
                                <span class="block w-40 h-40 m-auto rounded-full shadow"
                                    x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                                    photoPreview + '\');'"
                                    style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                </span>
                            </div>
                            <input type="file" name="imageEvent" id="imageEvent">
                            {{-- <button type="button"
                                class="inline-flex items-center px-4 py-2 mt-2 ml-3 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50"
                                x-on:click.prevent="$refs.photo.click()">
                                Select New Photo
                            </button> --}}
                        </div>
                    </div>
                </div>

                <div class='flex flex-col w-full gap-3'>
                    <label for='title' class='text-base-semibold text-light-2'>Title</label>
                    <div class=''>
                        <input type='text' id='title' name='title'
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'
                            value='{{ old('title', $fieldValues['title'] ?? '') }}'>
                    </div>
                </div>

                <div class='flex flex-col w-full gap-3'>
                    <label for='description' class='text-base-semibold text-light-2'>Description</label>
                    <div class=''>
                        <textarea id='description' name='description' rows='5'
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'>{{ old('description', $fieldValues['description'] ?? '') }}</textarea>
                    </div>
                </div>

                <div class='flex flex-col w-full gap-3'>
                    <label for='date' class='text-base-semibold text-light-2'>Date</label>
                    <div class=''>
                        <input type='datetime-local' id='date' name='date'
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'
                            value='{{ old('date', $fieldValues['date'] ?? '') }}'>
                    </div>
                </div>

                <div class='flex flex-col w-full gap-3'>
                    <label for='location' class='text-base-semibold text-light-2'>Location</label>
                    <div class=''>
                        <input type='text' id='location' name='location'
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'
                            value='{{ old('location', $fieldValues['location'] ?? '') }}'>
                    </div>
                </div>

                <div class='flex flex-col w-full gap-3'>
                    <label for='category' class='text-base-semibold text-light-2'>Category</label>
                    <div class=''>
                        <select
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'
                            name="category" id="category">
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class='flex flex-col w-full gap-3'>
                    <label for='available_seats' class='text-base-semibold text-light-2'>Available Seats</label>
                    <div class=''>
                        <input type='number' id='available_seats' name='available_seats'
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'
                            value='{{ old('available_seats', $fieldValues['available_seats'] ?? '') }}'>
                    </div>
                </div>

                <button type='submit'
                    class='px-4 py-2 rounded bg-primary-500 text-light-1 hover:bg-primary-700 focus:outline-none focus:ring focus:border-primary-700'>
                    Submit
                </button>
            </form>
        </div>

    </div>

</x-app-layout>

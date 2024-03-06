<x-app-layout>
   
    <div class="w-full mx-w-4xl">
        <div class="h-full m-4 mb-4 bg-white rounded-lg shadow-xl sm:p-6">
            <form class='flex flex-col justify-start gap-10 ' method='POST' action='{{route("event.update",$event)}}' enctype='multipart/form-data'>
                @csrf
                @method('PUT')

                <div class='flex flex-col w-full gap-3'>
                    <label for='title' class='text-base-semibold text-light-2'>Title</label>
                    <div class=''>
                        <input type='text' id='title' name='title'
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'
                            value='{{ old('title', $event['title'] ?? '') }}'>
                    </div>
                </div>
            
                <div class='flex flex-col w-full gap-3'>
                    <label for='description' class='text-base-semibold text-light-2'>Description</label>
                    <div class=''>
                        <textarea id='description' name='description' rows='5'
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'>{{ old('description', $event['description'] ?? '') }}</textarea>
                    </div>
                </div>
            
                <div class='flex flex-col w-full gap-3'>
                    <label for='date' class='text-base-semibold text-light-2'>Date</label>
                    <div class=''>
                        <input type='datetime-local' id='date' name='date'
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'
                            value='{{ old('date', date('Y-m-d\TH:i:s', strtotime($event['date'] ?? ''))) }}'>
                    </div>
                </div>
            
                <div class='flex flex-col w-full gap-3'>
                    <label for='location' class='text-base-semibold text-light-2'>Location</label>
                    <div class=''>
                        <input type='text' id='location' name='location'
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'
                            value='{{ old('location', $event['location'] ?? '') }}'>
                    </div>
                </div>
            
                <div class='flex flex-col w-full gap-3'>
                    <label for='category' class='text-base-semibold text-light-2'>Category</label>
                    <div class=''>
                        <select
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'
                            name="category" id="category">
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ old('category', $event['category_id'] ?? '') == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class='flex flex-col w-full gap-3'>
                    <label for='available_seats' class='text-base-semibold text-light-2'>Available Seats</label>
                    <div class=''>
                        <input type='number' id='available_seats' name='available_seats'
                            class='w-full px-2 py-1 border-b-2 account-form_input no-focus border-primary-500 focus:outline-none focus:border-light-1'
                            value='{{ old('available_seats', $event['available_seats'] ?? '') }}'>
                    </div>
                </div>
            
                <button type='submit'
                    class='px-4 py-2 rounded bg-primary-500 text-light-1 hover:bg-primary-700 focus:outline-none focus:ring focus:border-primary-700'>
                   Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>

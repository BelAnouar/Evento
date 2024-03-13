<x-app-layout>
    <div class="w-full mx-w-4xl">
        <div id="content" class="col-span-9 p-6 rounded-lg bg-white/10">
            <form id="addMedicineForm" class="flex flex-col gap-4" action="{{ route('category.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="category_name">Category Name:</label>
                    <input type="text"
                        class="form-control border border-[#DBE7C9]  px-2 py-2 rounded-xl focus:outline-none"
                        id="category_name" name="name" required>
                </div>


                <button type="submit"
                    class="bg-[#99BC85] font-semibold text-white text-md px-3 py-1 rounded-full w-fit max-w-sm">Add
                    Category</button>
            </form>
            
        </div>
    </div><main class="w-full mr-10 mx-w-4xl">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Categories :</h3>
               
                </div>
        
                <div class="mt-4"> 
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b">Name</th>
                                <th class="px-4 py-2 border-b">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                                <tr>
                                    <td class="px-4 py-2">
                                        <p class="text-sm text-gray-500">{{ $categorie->name }}</p>
                                    </td>
        
                                    <td class="px-4 py-2">
                                        <a href="/category/{{$categorie->id}}" class="text-blue-500 hover:underline">edit</a>
        
                                        <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this category?')) document.getElementById('deleteCategoryForm{{ $categorie->id }}').submit();" class="text-red-500 hover:underline">delete</a>
        
                                        <form id="deleteCategoryForm{{ $categorie->id }}"
                                            action="{{ route('category.destroy', $categorie->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
            </main>
</x-app-layout>

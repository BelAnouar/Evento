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
                    class="bg-[#99BC85] font-semibold text-white text-md px-3 py-1 rounded-full w-full max-w-sm">Add
                    Category</button>
            </form>
            
        </div>
    </div><main class="main">
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Categories :</h3>
                            <i class='bx bx-search'></i>
                            <i class='bx bx-filter'></i>
                        </div>


                        <div>

                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $categorie)
                                        <tr>
                                            <td>
                                                <p class="text-sm text-gray-500">{{ $categorie->name }}</p>
                                            </td>

                                            <td>
                                                <a href="/category/{{$categorie->id}}">edit</a>



                                                <a href="#"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this medicine?')) document.getElementById('deleteMedicineForm{{ $categorie->id }}').submit();">delete
                                                    <form id="deleteMedicineForm{{ $categorie->id }}"
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

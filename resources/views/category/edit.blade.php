<x-app-layout>
    <div class="w-full mx-w-4xl">
        <div id="content" class="col-span-9 p-6 rounded-lg bg-white/10">
            <form id="addMedicineForm" class="flex flex-col gap-4" action="{{ route('category.update',['category'=>$categorie]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="category_name">Category Name:</label>
                    <input type="text"
                        class="form-control border border-[#DBE7C9]  px-2 py-2 rounded-xl focus:outline-none"
                        id="category_name" value="{{$categorie->name}}" name="name" required>
                </div>


                <button type="submit"
                    class="bg-[#99BC85] font-semibold text-white text-md px-3 py-1 rounded-full w-full max-w-sm">edit
                    Category</button>
            </form>
            
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                @if(session('success'))
                    <div class="relative p-4 px-4 py-3 my-4 text-green-700 bg-green-100 border border-green-400 rounded "
                         role="alert"
                         id="successMessage">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div
                        class="relative flex items-center justify-between p-6 m-0 overflow-hidden text-gray-700 bg-transparent shadow-none bg-clip-border rounded-xl">
                        <h6>Catégories d'événements</h6>
    
    
                        <button modalId="category-create" :styled="true">Créer une catégorie</button>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>nombre des d'événements</th>
                                    <th>actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        {{-- <td>
                                            <img src="{{ asset('storage/'.$category->image->path)}}"
                                                 class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl"
                                                 alt="user1"/>{{ $category->id}} | {{ $category->name }}
                                        </td> --}}
    
                                        <td>{{ $category->description }}</td>
    
                                        <td>{{ $category->name }}</td>
    
                                        <td class="flex items-center gap-2 px-5 py-3 border-b border-blue-gray-50">
                                            <button
                                               
                                                data-name="{{ $category->name }}"
                                                data-description="{{ $category->description }}"
                                                data-modal-target="category-edit"
                                                data-modal-toggle="category-edit"
                                                class="px-4 py-2 font-bold bg-green-500 rounded-full hover:bg-green-700"
                                                type="button">
                                               edit
                                            </button>
                                           
    
                                            <button data-modal-target="category-delete" data-modal-toggle="category-delete"
                                                    data-slug="{{$category->slug}}"
                                                    type="button">
                                             delete
                                            </button>
                                         
                                        </td>
                                    </tr>
                                @empty
                                    no data
                                @endforelse
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
</x-app-layout>
<div class="mt-8">
    <div class="text-2xl">
        <div>Products</div> 
    </div>

    <div class="mt-6">
        <div class="flex justify-between">
            <div>
                <input wire:model.debounce.500ms="q" type="search" placeholder="Search" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <x:tall-crud-generator::button mode="add" wire:click="$emitTo('products-child', 'showCreateForm');">Create New</x:tall-crud-generator::button>
        </div>
        <x:tall-crud-generator::table class="mt-4">
            <x-slot name="header">
                <x:tall-crud-generator::table-column>
                    <div class="flex items-center">
                        <button wire:click="sortBy('id')">Id</button>
                        <x:tall-crud-generator::sort-icon sortField="id" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>
                    <div class="flex items-center">
                        <button wire:click="sortBy('product_category_id')">ProductCategoryId</button>
                        <x:tall-crud-generator::sort-icon sortField="product_category_id" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>ProductCode</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>
                    <div class="flex items-center">
                        <button wire:click="sortBy('name')">Name</button>
                        <x:tall-crud-generator::sort-icon sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>MainImage</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Actions</x:tall-crud-generator::table-column>
            </x-slot>
            @foreach($results as $result)
                <tr class="hover:bg-gray-300">
                    <x:tall-crud-generator::table-column>{{ $result->id}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->product_category_id}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->product_code}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->name}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->main_image}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>
                        <x:tall-crud-generator::button mode="edit" wire:click="$emitTo('products-child', 'showEditForm',  {{ $result->id}});">Edit</x:tall-crud-generator::button>
                        <x:tall-crud-generator::button mode="delete" wire:click="$emitTo('products-child', 'showDeleteForm',  {{ $result->id}});">Delete</x:tall-crud-generator::button>
                    </x:tall-crud-generator::table-column>
               </tr>
            @endforeach
        </x:tall-crud-generator::table>
    </div>

    <div class="mt-4">
        {{ $results->links() }}
    </div>
    @livewire('products-child')
</div>
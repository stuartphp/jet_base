<div class="mt-8">
    <div class="text-2xl">
        <div>Entities</div>
    </div>

    <div class="mt-6">
        <div class="flex justify-between">
            <div>
                <input wire:model.debounce.500ms="q" type="search" placeholder="Search" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <x:tall-crud-generator::button mode="add" wire:click="$emitTo('entities-child', 'showCreateForm');">Create New</x:tall-crud-generator::button>
        </div>
        <x:tall-crud-generator::table class="mt-4">
            <x-slot name="header">
                <x:tall-crud-generator::table-column>
                    <div class="flex items-center">
                        <button wire:click="sortBy('account_number')">Account Number</button>
                        <x:tall-crud-generator::sort-icon sortField="account_number" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>
                    <div class="flex items-center">
                        <button wire:click="sortBy('trading_name')">Trading As</button>
                        <x:tall-crud-generator::sort-icon sortField="trading_name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Telephone</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Fax</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Email</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>IsActive</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Actions</x:tall-crud-generator::table-column>
            </x-slot>
            @foreach($results as $result)
                <tr class="hover:bg-gray-300">
                    <x:tall-crud-generator::table-column>{{ $result->account_number}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->trading_name}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->telephone}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->fax}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->email}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->is_active}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>
                        <x:tall-crud-generator::button mode="edit" wire:click="$emitTo('entities-child', 'showEditForm',  {{ $result->id}});">Edit</x:tall-crud-generator::button>
                        <x:tall-crud-generator::button mode="delete" wire:click="$emitTo('entities-child', 'showDeleteForm',  {{ $result->id}});">Delete</x:tall-crud-generator::button>
                    </x:tall-crud-generator::table-column>
               </tr>
            @endforeach
        </x:tall-crud-generator::table>
    </div>

    <div class="mt-4">
        {{ $results->links() }}
    </div>
    @livewire('entities-child')
</div>

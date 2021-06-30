<div class="mt-8">
    <div class="text-2xl">
        <div>Companies</div> 
    </div>

    <div class="mt-6">
        <div class="flex justify-end">
            <x:tall-crud-generator::button mode="add" wire:click="$emitTo('companies-child', 'showCreateForm');">Create New</x:tall-crud-generator::button>
        </div>
        <x:tall-crud-generator::table class="mt-4">
            <x-slot name="header">
                <x:tall-crud-generator::table-column>
                    <div class="flex items-center">
                        <button wire:click="sortBy('id')">Id</button>
                        <x:tall-crud-generator::sort-icon sortField="id" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>CreatedBy</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>
                    <div class="flex items-center">
                        <button wire:click="sortBy('trading_name')">TradingName</button>
                        <x:tall-crud-generator::sort-icon sortField="trading_name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>
                    <div class="flex items-center">
                        <button wire:click="sortBy('contact_name')">ContactName</button>
                        <x:tall-crud-generator::sort-icon sortField="contact_name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>
                    <div class="flex items-center">
                        <button wire:click="sortBy('contact_number')">ContactNumber</button>
                        <x:tall-crud-generator::sort-icon sortField="contact_number" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>
                    <div class="flex items-center">
                        <button wire:click="sortBy('email')">Email</button>
                        <x:tall-crud-generator::sort-icon sortField="email" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Actions</x:tall-crud-generator::table-column>
            </x-slot>
            @foreach($results as $result)
                <tr class="hover:bg-gray-300">
                    <x:tall-crud-generator::table-column>{{ $result->id}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->created_by}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->trading_name}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->contact_name}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->contact_number}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->email}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>
                        <x:tall-crud-generator::button mode="edit" wire:click="$emitTo('companies-child', 'showEditForm',  {{ $result->id}});">Edit</x:tall-crud-generator::button>
                        <x:tall-crud-generator::button mode="delete" wire:click="$emitTo('companies-child', 'showDeleteForm',  {{ $result->id}});">Delete</x:tall-crud-generator::button>
                    </x:tall-crud-generator::table-column>
               </tr>
            @endforeach
        </x:tall-crud-generator::table>
    </div>

    <div class="mt-4">
        {{ $results->links() }}
    </div>
    @livewire('companies-child')
</div>
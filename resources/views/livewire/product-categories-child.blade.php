<div>
    <x:tall-crud-generator::confirmation-dialog wire:model="confirmingItemDeletion">
        <x-slot name="title">
            Delete Record
        </x-slot>
        <x-slot name="content">
            Are you sure you want to Delete Record?
        </x-slot>
        <x-slot name="footer">
            <x:tall-crud-generator::button wire:click="$set('confirmingItemDeletion', false)">Cancel</x:tall-crud-generator::button>
            <x:tall-crud-generator::button mode="delete" wire:click="deleteItem()">Delete</x:tall-crud-generator::button>
        </x-slot>
    </x:tall-crud-generator::confirmation-dialog>
    <x:tall-crud-generator::dialog-modal wire:model="confirmingItemCreation">
        <x-slot name="title">
            Add Record
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x:tall-crud-generator::label>CompanyId</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.company_id" />
                @error('item.company_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Name</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.name" />
                @error('item.name') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>ParentId</x:tall-crud-generator::label>
                <x:tall-crud-generator::select class="block mt-1 w-1/4" wire:model.defer="item.parent_id">
                <option value="">{{ __('Please Select') }}</option>
                <option value="0">{{ __('Main Category') }}</option>
                @foreach ($categories as $cat)
                    @if ($cat->parent_id==0)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @foreach ($categories as $sub )
                            @if ($sub->parent_id == $cat->id)
                                <option value="{{ $sub->id }}">- {{ $sub->name }}</option>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                </x:tall-crud-generator::select>
                @error('item.parent_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsActive:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_active" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_active') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
        </x-slot>

        <x-slot name="footer">
            <x:tall-crud-generator::button wire:click="$set('confirmingItemCreation', false)">Cancel</x:tall-crud-generator::button>
            <x:tall-crud-generator::button mode="add" wire:click="createItem()">Save</x:tall-crud-generator::button>
        </x-slot>
    </x:tall-crud-generator::dialog-modal>

    <x:tall-crud-generator::dialog-modal wire:model="confirmingItemEdition">
        <x-slot name="title">
            Edit Record
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x:tall-crud-generator::label>CompanyId</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.company_id" />
                @error('item.company_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Name</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.name" />
                @error('item.name') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>ParentId</x:tall-crud-generator::label>
                <x:tall-crud-generator::select class="block mt-1 w-1/4" wire:model.defer="item.parent_id"><option value="1">Yes</option><option value="0">No</option>
                </x:tall-crud-generator::select>
                @error('item.parent_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsActive:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_active" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_active') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
        </x-slot>

        <x-slot name="footer">
            <x:tall-crud-generator::button wire:click="$set('confirmingItemEdition', false)">Cancel</x:tall-crud-generator::button>
            <x:tall-crud-generator::button mode="add" wire:click="editItem()">Save</x:tall-crud-generator::button>
        </x-slot>
    </x:tall-crud-generator::dialog-modal>
</div>

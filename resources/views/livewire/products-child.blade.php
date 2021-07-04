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
                <x:tall-crud-generator::label>ProductCategoryId</x:tall-crud-generator::label>
                <x:tall-crud-generator::select class="block mt-1 w-1/4" wire:model.defer="item.product_category_id"><option value="1">Yes</option><option value="0">No</option>
                </x:tall-crud-generator::select> 
                @error('item.product_category_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>ProductCode</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.product_code" />
                @error('item.product_code') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Name</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.name" />
                @error('item.name') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Description</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.description" />
                @error('item.description') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Keywords</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.keywords" />
                @error('item.keywords') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Barcode</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.barcode" />
                @error('item.barcode') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>IsbnNumber</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.isbn_number" />
                @error('item.isbn_number') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>ProductUnitId</x:tall-crud-generator::label>
                <x:tall-crud-generator::select class="block mt-1 w-1/4" wire:model.defer="item.product_unit_id"><option value="1">Yes</option><option value="0">No</option>
                </x:tall-crud-generator::select> 
                @error('item.product_unit_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>MainImage</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.main_image" />
                @error('item.main_image') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Viewed</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.viewed" />
                @error('item.viewed') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsService:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_service" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_service') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsActive:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_active" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_active') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsFeature:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_feature" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_feature') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
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
                <x:tall-crud-generator::label>ProductCategoryId</x:tall-crud-generator::label>
                <x:tall-crud-generator::select class="block mt-1 w-1/4" wire:model.defer="item.product_category_id"><option value="1">Yes</option><option value="0">No</option>
                </x:tall-crud-generator::select> 
                @error('item.product_category_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>ProductCode</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.product_code" />
                @error('item.product_code') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Name</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.name" />
                @error('item.name') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Description</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.description" />
                @error('item.description') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Keywords</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.keywords" />
                @error('item.keywords') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Barcode</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.barcode" />
                @error('item.barcode') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>IsbnNumber</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.isbn_number" />
                @error('item.isbn_number') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>ProductUnitId</x:tall-crud-generator::label>
                <x:tall-crud-generator::select class="block mt-1 w-1/4" wire:model.defer="item.product_unit_id"><option value="1">Yes</option><option value="0">No</option>
                </x:tall-crud-generator::select> 
                @error('item.product_unit_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>MainImage</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.main_image" />
                @error('item.main_image') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Viewed</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.viewed" />
                @error('item.viewed') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsService:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_service" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_service') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsActive:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_active" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_active') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsFeature:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_feature" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_feature') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
        </x-slot>

        <x-slot name="footer">
            <x:tall-crud-generator::button wire:click="$set('confirmingItemEdition', false)">Cancel</x:tall-crud-generator::button>
            <x:tall-crud-generator::button mode="add" wire:click="editItem()">Save</x:tall-crud-generator::button>
        </x-slot>
    </x:tall-crud-generator::dialog-modal>
</div>

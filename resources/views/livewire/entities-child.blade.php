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
                <x:tall-crud-generator::label>Account Number</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.account_number" />
                @error('item.account_number') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Trading As</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.trading_name" />
                @error('item.trading_name') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Regestered Name</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.registered_name" />
                @error('item.registered_name') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Telephone</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.telephone" />
                @error('item.telephone') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Fax</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.fax" />
                @error('item.fax') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Email</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.email" />
                @error('item.email') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsNewsletter:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_newsletter" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_newsletter') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsSms:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_sms" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_sms') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
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
                <x:tall-crud-generator::label>Account Number</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.account_number" />
                @error('item.account_number') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Trading As</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.trading_name" />
                @error('item.trading_name') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Regestered Name</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.registered_name" />
                @error('item.registered_name') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Telephone</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.telephone" />
                @error('item.telephone') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Fax</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.fax" />
                @error('item.fax') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Email</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.email" />
                @error('item.email') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsNewsletter:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_newsletter" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_newsletter') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            <x:tall-crud-generator::checkbox-wrapper class="mt-4">
                <x:tall-crud-generator::label>IsSms:</x:tall-crud-generator::label><x:tall-crud-generator::checkbox class="ml-2" wire:model.defer="item.is_sms" />
            </x:tall-crud-generator::checkbox-wrapper>
            @error('item.is_sms') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
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

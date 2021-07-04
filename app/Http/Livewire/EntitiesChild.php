<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Entity;

class EntitiesChild extends Component
{
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];

    public $item;

    protected $rules = [
        'item.account_number' => '',
        'item.trading_name' => 'required',
        'item.registered_name' => '',
        'item.telephone' => '',
        'item.fax' => '',
        'item.email' => 'required',
        'item.is_newsletter' => 'boolean',
        'item.is_sms' => 'boolean',
        'item.is_active' => 'boolean',
    ];

    protected $validationAttributes = [
        'item.account_number' => 'Account Number',
        'item.trading_name' => 'Trading As',
        'item.registered_name' => 'Regestered Name',
        'item.telephone' => 'Telephone',
        'item.fax' => 'Fax',
        'item.email' => 'Email',
        'item.is_newsletter' => 'IsNewsletter',
        'item.is_sms' => 'IsSms',
        'item.is_active' => 'IsActive',
    ];

    public $confirmingItemDeletion = false;
    public $primaryKey;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;

    public function render()
    {
        return view('livewire.entities-child');
    }

    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        Entity::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->emitTo('entities', 'refresh');
    }

    public function showCreateForm()
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function createItem()
    {
        $this->validate();
        Entity::create([
            'gcs'=>session()->get('gcs'),
            'account_number' => $this->item['account_number'],
            'trading_name' => $this->item['trading_name'],
            'registered_name' => $this->item['registered_name'],
            'telephone' => $this->item['telephone'],
            'fax' => $this->item['fax'],
            'email' => $this->item['email'],
            'is_newsletter' => $this->item['is_newsletter'],
            'is_sms' => $this->item['is_sms'],
            'is_active' => $this->item['is_active'],
        ]);
        $this->confirmingItemCreation = false;
        $this->emitTo('entities', 'refresh');
    }

    public function showEditForm(Entity $item)
    {
        $this->resetErrorBag();
        $this->item = $item;
        $this->confirmingItemEdition = true;
    }

    public function editItem()
    {
        $this->validate();
        $this->item->save();
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';
        $this->emitTo('entities', 'refresh');
    }

}

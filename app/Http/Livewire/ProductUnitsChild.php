<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductUnit;

class ProductUnitsChild extends Component
{
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];

    public $item;

    protected $rules = [
        'item.company_id' => '',
        'item.name' => '',
    ];

    protected $validationAttributes = [
        'item.company_id' => 'CompanyId',
        'item.name' => 'Name',
    ];

    public $confirmingItemDeletion = false;
    public $primaryKey;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;

    public function render()
    {
        return view('livewire.product-units-child');
    }

    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        ProductUnit::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->emitTo('product-units', 'refresh');
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
        ProductUnit::create([
            'company_id' => $this->item['company_id'], 
            'name' => $this->item['name'], 
        ]);
        $this->confirmingItemCreation = false;
        $this->emitTo('product-units', 'refresh');
    }
 
    public function showEditForm(ProductUnit $item)
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
        $this->emitTo('product-units', 'refresh');
    }

}

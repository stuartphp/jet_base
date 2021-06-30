<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;

class ProductCategoriesChild extends Component
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
        'item.parent_id' => '',
        'item.is_active' => '',
    ];

    protected $validationAttributes = [
        'item.company_id' => 'CompanyId',
        'item.name' => 'Name',
        'item.parent_id' => 'ParentId',
        'item.is_active' => 'IsActive',
    ];

    public $confirmingItemDeletion = false;
    public $primaryKey;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;

    public function render()
    {
        return view('livewire.product-categories-child', [
            'categories'=>$this->getCategories()
        ]);
    }

    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        ProductCategory::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->emitTo('product-categories', 'refresh');
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
        ProductCategory::create([
            'company_id' => $this->item['company_id'],
            'name' => $this->item['name'],
            'parent_id' => $this->item['parent_id'],
            'is_active' => $this->item['is_active'],
        ]);
        $this->confirmingItemCreation = false;
        $this->emitTo('product-categories', 'refresh');
    }

    public function showEditForm(ProductCategory $item)
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
        $this->emitTo('product-categories', 'refresh');
    }

    public function getCategories()
    {
        return ProductCategory::where('company_id', 1)->orderBy('parent_id')->orderBy('name')->get();
    }

}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductsChild extends Component
{
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];

    public $item;

    protected $rules = [
        'item.company_id' => '',
        'item.product_category_id' => '',
        'item.product_code' => 'required',
        'item.name' => 'required|min:3',
        'item.description' => 'required',
        'item.keywords' => '',
        'item.barcode' => '',
        'item.isbn_number' => '',
        'item.product_unit_id' => '',
        'item.main_image' => '',
        'item.viewed' => '',
        'item.is_service' => '',
        'item.is_active' => '',
        'item.is_feature' => '',
    ];

    protected $validationAttributes = [
        'item.company_id' => 'CompanyId',
        'item.product_category_id' => 'ProductCategoryId',
        'item.product_code' => 'ProductCode',
        'item.name' => 'Name',
        'item.description' => 'Description',
        'item.keywords' => 'Keywords',
        'item.barcode' => 'Barcode',
        'item.isbn_number' => 'IsbnNumber',
        'item.product_unit_id' => 'ProductUnitId',
        'item.main_image' => 'MainImage',
        'item.viewed' => 'Viewed',
        'item.is_service' => 'IsService',
        'item.is_active' => 'IsActive',
        'item.is_feature' => 'IsFeature',
    ];

    public $confirmingItemDeletion = false;
    public $primaryKey;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;

    public function render()
    {
        return view('livewire.products-child');
    }

    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        Product::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->emitTo('products', 'refresh');
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
        Product::create([
            'company_id' => $this->item['company_id'], 
            'product_category_id' => $this->item['product_category_id'], 
            'product_code' => $this->item['product_code'], 
            'name' => $this->item['name'], 
            'description' => $this->item['description'], 
            'keywords' => $this->item['keywords'], 
            'barcode' => $this->item['barcode'], 
            'isbn_number' => $this->item['isbn_number'], 
            'product_unit_id' => $this->item['product_unit_id'], 
            'main_image' => $this->item['main_image'], 
            'viewed' => $this->item['viewed'], 
            'is_service' => $this->item['is_service'], 
            'is_active' => $this->item['is_active'], 
            'is_feature' => $this->item['is_feature'], 
        ]);
        $this->confirmingItemCreation = false;
        $this->emitTo('products', 'refresh');
    }
 
    public function showEditForm(Product $item)
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
        $this->emitTo('products', 'refresh');
    }

}

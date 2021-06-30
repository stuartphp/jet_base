<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\ProductCategory;

class ProductCategories extends Component
{
    use WithPagination;

    protected $listeners = ['refresh' => '$refresh'];

    public $sortBy = 'id';
    public $sortAsc = true;


    public function render()
    {
        $results = $this->query()
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate(15);

        return view('livewire.product-categories', [
            'results' => $results,
            'category'=>$this->getCategories()
        ]);
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function query()
    {
        return ProductCategory::query();
    }

    public function getCategories()
    {
        return ProductCategory::where('company_id', 1)->orderBy('parent_id')->orderBy('name')->pluck('name', 'id')->toArray();
    }
}

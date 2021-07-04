<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Product;
use App\Models\ProductCategory;

class Products extends Component
{
    use WithPagination;

    protected $listeners = ['refresh' => '$refresh'];

    public $sortBy = 'id';
    public $sortAsc = true;

    public $q;

    public function render()
    {
        $results = $this->query()
            ->when($this->q, function ($query) {
                return $query->where(function ($query) {
                    $query->where('product_category_id', 'like', '%' . $this->q . '%')
                        ->orWhere('product_code', 'like', '%' . $this->q . '%')
                        ->orWhere('name', 'like', '%' . $this->q . '%');
                });
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate(15);

        return view('livewire.products', [
            'results' => $results,
            'category'=> $this->getCategories()
        ]);
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function updatingQ()
    {
        $this->resetPage();
    }

    public function query()
    {
        return Product::query();
    }

    public function getCategories()
    {
        return ProductCategory::where('company_id', 1)->orderBy('parent_id')->orderBy('name')->pluck('name', 'id')->toArray();
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Entity;

class Entities extends Component
{
    use WithPagination;

    protected $listeners = ['refresh' => '$refresh'];

    public $sortBy = 'account_number';
    public $sortAsc = true;

    public $q;

    public function render()
    {
        $results = $this->query()
        ->where('gcs', session()->get('gcs'))
            ->when($this->q, function ($query) {
                return $query->where(function ($query) {
                    $query->where('account_number', 'like', '%' . $this->q . '%')
                        ->orWhere('trading_name', 'like', '%' . $this->q . '%')
                        ->orWhere('telephone', 'like', '%' . $this->q . '%')
                        ->orWhere('fax', 'like', '%' . $this->q . '%')
                        ->orWhere('email', 'like', '%' . $this->q . '%');
                });
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate(15);

        return view('livewire.entities', [
            'results' => $results
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
        return Entity::query();
    }
}

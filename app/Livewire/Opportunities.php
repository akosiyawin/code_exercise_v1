<?php

namespace App\Livewire;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class Opportunities extends Component
{
    use WithPagination;
    public $perPage = 20; // Default number of items per page
    public $options = [20, 50, 100, 250]; // Options for items per page
    protected $queryString = ['perPage', 'search', 'sortField', 'sortDirection']; // Keep perPage in the URL
    public $search = '';
    public $sortField = 'name'; // Default sort field
    public $sortDirection = 'asc'; // Default sort direction (asc or desc)


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage(); // Reset to the first page when the query (search/perpage) is updated
    }

    public function updatingSortField($field)
    {
        $this->sortField = $field;
        $this->resetPage();
    }

    public function updatingSortDirection($direction)
    {
        $this->sortDirection = $direction;
        $this->resetPage();
    }


    public function render()
    {
        // You can specify which columns you want to select if needed, but since we only have name, the query below should be fine.
        // Item::select('id','name')->paginate();

        $items = Item::when($this->search, fn($query) => $query->where('name', 'like', '%' . $this->search . '%'))
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        // We created ItemResource to make the codebase ergonomic. This is a proper way of throwing data to frontend.
        return view('livewire.opportunities', [
            'items' => ItemResource::collection($items),
        ]);
    }

}

<?php

namespace App\Http\Livewire;

use App\Models\Tenant;
use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    public int $perPage = 10;
    public string $sortField = 'name';
    public bool $sortAsc = true;
    public string $search = '';
    public bool $super = false;
    public array $tenants = [];
    public $selectedTenant;

    public function sortBy(string $field)
    {
        $this->sortAsc = $field == $this->sortField ? !$this->sortAsc : true;

        $this->sortField = $field;
    }

    public function mount()
    {
        if (session()->has('tenant_id')) {
            $this->super = false;
        } else {
            $this->super = true;
            $this->tenants = Tenant::all()->pluck('name', 'id')->toArray();
        }
    }

    public function render()
    {
        $query = User::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        if($this->super && $this->selectedTenant) {
            $query->where('tenant_id', $this->selectedTenant);
        }

        return view('livewire.show-users', [
            'users' => $query->with('documents')->paginate($this->perPage),
        ]);
    }
}

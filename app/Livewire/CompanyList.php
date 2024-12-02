<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;

class CompanyList extends Component
{
    public $companies = [];
    public $nextCursor;
    public $loading = false;

    public function mount()
    {
        $this->loadCompanies();
    }

    public function loadCompanies($cursor = null)
    {
        $this->loading = true;

        $query = Company::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->cursorPaginate(6, ['*'], 'cursor', $cursor);

        $this->companies = $cursor
            ? array_merge($this->companies, $query->items())
            : $query->items();

        $this->nextCursor = $query->nextCursor()?->encode();
        $this->loading = false;
    }

    public function loadMore()
    {
        if ($this->nextCursor) {
            $this->loadCompanies($this->nextCursor);
        }
    }

    public function render()
    {
        return view('livewire.company-list');
    }
}

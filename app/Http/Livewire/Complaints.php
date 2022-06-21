<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Complaints extends Component
{
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';

    public function render()
    {
        // return view('livewire.complaints');
        $users = User::query()
            ->orderBy($this->sortColumnName, $this->sortDirection);

    }

    public function sortBy($columnName)
    {
        // $this->sortDirection = 'asc';

        // $this->sortColumnName = $columnName;
        dd('here');
    }
}

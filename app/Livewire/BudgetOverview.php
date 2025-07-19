<?php

namespace App\Livewire;

use Livewire\Component;

class BudgetOverview extends Component
{

    protected array $months = [];

    public function mount()
    {
        $this->months = [
            'january' => 'Januar',
            'february' => 'Februar',
            'march' => 'März',
            'april' => 'April',
            'may' => 'Mai',
            'june' => 'Juni',
            'july' => 'Juli',
            'august' => 'August',
            'september' => 'September',
            'october' => 'Oktober',
            'november' => 'November',
            'december' => 'Dezember',
        ];

    }

    public function render()
    {
        return view('livewire.budget-overview');
    }
}

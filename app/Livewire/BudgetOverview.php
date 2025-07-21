<?php

namespace App\Livewire;

use App\Models\Entry;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BudgetOverview extends Component
{
    #[Validate('required|string')]
    public string $month = '';
    public array $months = [];

    public float $expensesTimo = 0;
    public float $expensesLina = 0;
    public float $totalExpenses = 0;
    public float $sharedExpenses = 0;


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

    public function loadBudgetData()
    {
        $entriesLina = Entry::where('user_id', 1)
            ->where('month', $this->month)
            ->get();
        $entriesTimo = Entry::where('user_id', 2)
            ->where('month', $this->month)->get();

        $this->expensesLina = $entriesLina->sum('price');
        $this->expensesTimo = $entriesTimo->sum('price');
        $this->totalExpenses = $this->expensesLina + $this->expensesTimo;
        $this->sharedExpenses = (float) $this->totalExpenses / 2;

    }
}

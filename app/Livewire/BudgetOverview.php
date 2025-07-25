<?php

namespace App\Livewire;

use App\Models\Entry;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BudgetOverview extends Component
{
    public int $year;

    #[Validate('required|string')]
    public string $month = '';

    public array $months = [];

    public float $expensesTimo = 0;

    public float $expensesLina = 0;

    public float $totalExpenses = 0;

    public float $sharedExpenses = 0;

    public string $debtMessage = '';

    public array $entriesLina = [];

    public array $entriesTimo = [];

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

        $this->year = now()->year;
    }

    public function render()
    {
        return view('livewire.budget-overview');
    }

    public function loadBudgetData()
    {
        $this->entriesLina = $this->getEntriesForMonth(1, $this->month, $this->year);;
        $this->entriesTimo = $this->getEntriesForMonth(2, $this->month, $this->year);;

        $this->expensesLina = array_sum(array_column($this->entriesLina, 'price'));
        $this->expensesTimo = array_sum(array_column($this->entriesTimo, 'price'));
        $this->totalExpenses = $this->expensesLina + $this->expensesTimo;
        $this->sharedExpenses = (float) $this->totalExpenses / 2;

        $debtor = $this->expensesLina > $this->expensesTimo ? 'Timo' : 'Lina';
        $creditor = $this->expensesLina > $this->expensesTimo ? 'Lina' : 'Timo';
        $amountOwed = abs($this->sharedExpenses - ($debtor === 'Lina' ? $this->expensesLina : $this->expensesTimo));

        $this->debtMessage = "{$debtor} schuldet {$creditor} ".number_format($amountOwed, 2, ',', '.').' €.';
    }
    private function getEntriesForMonth(int $userId, string $month, int $year)
    {
        $entries = Entry::where('user_id', $userId)
            ->where('month', $month)
            ->where('year', $year)
            ->with('tag')
            ->get()->toArray();

        if (!empty($entries)) {
            return $entries;
        }

        // fallback: previous year
        return Entry::where('user_id', $userId)
            ->where('month', $month)
            ->where('year', $year - 1)
            ->with('tag')
            ->get()->toArray();
    }
}

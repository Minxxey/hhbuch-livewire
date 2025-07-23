<div class="budget-overview container block max-w-[90%] mx-auto md:mx-automd:max-w-[800px] my-2"
     x-data="{ month: @entangle('month') }">
    <h1 class="text-text text-center text-lg">Wähle einen Monat aus, um die entsprechende Auswertung anzuzeigen</h1>
    <div class="max-w-[300px] mx-auto">
        <x-form.select name="month" :arrayData="$months" wire:model="month" wire:change="loadBudgetData">
        </x-form.select>
    </div>

    <div class="budget-overview-calc border border-text rounded-md px-[10px] py-1 text-text mb-[15px] max-w-[800px] mx-auto" x-show="month"
         x-transition>
        <h2 class="text-xl font-bold text-left mb-[10px]">Ausgaben insgesamt: </h2>
        <p>Timo: {{number_format($expensesTimo, 2, ',')}} €</p>
        <p>Lina: {{number_format($expensesLina, 2, ',')}} €</p>
        <p>= {{number_format($totalExpenses, 2, ',', '.')}} / 2 = {{number_format($sharedExpenses, 2, ',')}}</p>
        <p>{{$debtMessage}}</p>
    </div>
    <div x-show="month">
        @include('components.budget-analysis-per-person', ['name' => 'Timo', 'entries' => $entriesTimo])
        @include('components.budget-analysis-per-person', ['name' => 'Lina', 'entries' => $entriesLina])
    </div>
</div>

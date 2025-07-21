<div class="budget-overview container block max-w-[90%] mx-auto md:mx-automd:max-w-[800px] my-2" x-data="{ month: @entangle('month') }">
    <h1 class="text-text text-center text-lg">Wähle einen Monat, um die entsprechende Auswertung anzuzeigen</h1>
   <x-form.select name="month" :arrayData="$months" wire:model="month" wire:change="loadBudgetData">
   </x-form.select>

    <div class="budget-overview-calc border border-text rounded-md px-[10px] py-1 text-text"  x-show="month" x-transition>
        <h2 class="text-lg text-left">Ausgaben insgesamt: </h2>
        <p>Timo: {{$expensesTimo}}</p>
        <p>Lina: {{$expensesLina}}</p>
        <p>= {{$totalExpenses}} / 2 = {{$sharedExpenses}}</p>
    </div>
</div>

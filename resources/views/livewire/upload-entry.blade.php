<div>
    <form wire:submit="save" class="w-[90%] mx-auto md:w-[80%] md:mx-0 my-2">
        <x-form.input type="number" label-text="Preis" name="price" wire:model="price"></x-form.input>
        <x-form.select  label-text="Monat" name="month" :arrayData="$months" wire:model="month"></x-form.select>
        <x-form.input type="number" label-text="Notiz" name="note" wire:model="note"></x-form.input>
        <x-form.select  label-text="Tag" name="tag" :arrayData="$tags" wire:model="tag"></x-form.select>
    </form>
</div>

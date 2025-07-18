<div>
    <form wire:submit="save" class="w-[90%] mx-auto md:w-[80%] my-2 md:my-4 md:max-w-[800px]">
        <x-form.input type="number" label-text="Preis" name="price" wire:model="price"></x-form.input>
        <x-form.select label-text="Monat" name="month" :arrayData="$months" wire:model="month"></x-form.select>
        <x-form.input type="string" label-text="Notiz" name="note" wire:model="note"></x-form.input>
        <x-form.select label-text="Tag" name="tag" :arrayData="$tags" wire:model="tag"></x-form.select>
        <button type="submit" class="btn-light-header">Hochladen</button>
    </form>
    <div
        x-data="{ show: false, entryId: null }"
        x-on:entry-uploaded.window="show = true; entryId = $event.detail.id; setTimeout(() => show = false, 2500)"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-full flex justify-center pointer-events-none"
    >
        <template x-if="show">
            <div
                class="bg-green-300 text-green-800 rounded shadow-lg px-4 py-2
                   w-[90%] max-w-[300px] md:max-w-[400px] pointer-events-auto w-full text-center"
            >
                Neuer Eintrag erstellt! (ID: <span x-text="entryId"></span>)
            </div>
        </template>
    </div>
    <div
        x-data="{ show: false, e: null }"
        x-on:entry-upload-failed.window="show = true; e = $event.detail.e; setTimeout(() => show = false, 8000)"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-full flex justify-center pointer-events-none"
    >
        <template x-if="show">
            <div
                class="bg-red-200 text-red-800 px-4 py-2 rounded shadow-lg
                   w-[90%] max-w-[300px] md:max-w-[400px] pointer-events-auto text-center font-medium tracking-wide"
            >
                Etwas ist schiefgegangen: <span x-text="e"></span>
            </div>
        </template>
    </div>

</div>

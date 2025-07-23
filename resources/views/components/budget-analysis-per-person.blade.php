@php use App\Enum\TagEnum; @endphp
<div class="budget-analysis border border-text rounded-md px-[10px] py-1 text-text mb-[15px] max-w-[800px] mx-auto">
    <h3 class="text-xl mb-2 font-bold"> Ausgaben {{ $name }}</h3>
    @foreach($entries as $entry)
        @php
            $tagEnum = collect(\App\Enum\TagEnum::cases())
       ->firstWhere('name', $entry['tag']['name'] ?? null);
        @endphp
        <div class="grid grid-cols-2 mb-1.5">
            <div>{{number_format($entry['price'], 2, ',', '.')}} €</div>
            <div class="flex flex-col">
                <p class="mb-[8px]">{{$entry['note']}}</p>
                @if($tagEnum)
                    <span class="text-sm px-1 py-0.5 rounded-full w-fit text-background"
                          style="background-color: {{ $tagEnum->color() }}">
                    {{ ucfirst($tagEnum->value) }}
                </span>
                @endif
            </div>
        </div>
    @endforeach
</div>

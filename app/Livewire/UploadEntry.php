<?php

namespace App\Livewire;

use App\Models\Entry;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UploadEntry extends Component
{
    #[Validate('required|numeric')]
    public ?float $price = null;
    #[Validate('required|string')]
    public string $month = '';

    #[Validate('nullable|string')]
    public string $note = '';

    #[Validate('required|string')]
    public string $tag = '';

    public array $months = [];

    public array $tags = [];


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

        $this->tags = Tag::all()
            ->mapWithKeys(fn($tag) => [$tag['id'] => ucfirst(strtolower($tag['name']))])
            ->toArray();
    }

    public function save()
    {
        $validated = $this->validate();

        //set all fields that don't require validation
       try {
            $entry = Entry::create(array_merge(
                $validated,
                [
                    'year' => date('Y'),
                    'user_id' => auth()->user()->id,
                    'tag_id' => $validated['tag'],
                ]
            ));

            $this->dispatch('entry-uploaded', id: $entry->id);
            $this->reset('price', 'note');
        } catch (\Exception $e){
            $this->dispatch('entry-upload-failed', e: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.upload-entry')->layout('components.layouts.app');
    }
}

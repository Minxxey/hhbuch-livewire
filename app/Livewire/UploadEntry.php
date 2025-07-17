<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UploadEntry extends Component
{
    #[Validate('required|float')]
    public float $price = 0.0;
    #[Validate('required|string')]
    public string $month = '';

    #[Validate('nullable|int')]
    public int $year = 0;

    #[Validate('nullable|string')]
    public string $note = '';

    public array $months = [];

    public array $tags = [];

    public array $users = [];

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

        $this->users = [
            'lina' => User::where('name', 'Lina')->first()->toArray(),
            'timo' => User::where('name', 'Timo')->first()->toArray(),
        ];
    }

    public function save()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.upload-entry')->layout('components.layouts.app');
    }
}

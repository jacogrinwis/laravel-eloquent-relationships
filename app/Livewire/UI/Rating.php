<?php

namespace App\Livewire\Ui;

use Livewire\Component;

class Rating extends Component
{
    public $rating; // De huidige beoordeling
    public $maxRating = 5; // Maximale beoordeling (standaard: 5 sterren)
    public $readonly = false; // Of het component alleen-lezen is
    public $reviewCount = 0; // Nieuwe property

    public function mount($rating = 0, $readonly = false, $reviewCount = 0)
    {
        $this->rating = $rating; // Stel de initiĆ«le beoordeling in
        $this->readonly = $readonly; // Alleen-lezen modus
        $this->reviewCount = $reviewCount;
    }

    public function setRating($value)
    {
        if (!$this->readonly) {
            $this->rating = $value; // Alleen bijwerken als niet alleen-lezen
        }
    }

    public function render()
    {
        return view('livewire.ui.rating');
    }
}

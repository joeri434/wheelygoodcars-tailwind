<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;


class CarStatusUpdater extends Component
{   
    
    public Car $car;
    public $status;
    public $prijs;
    
    public function mount(Car $car)
    {
        $this->status = $car->status;
        $this->prijs = $car->prijs;
    }
    
    public function updated($field)
    {
        $this->car->update([
            'status' => $this->status,
            'prijs' => $this->prijs,
        ]);
    }
    
    public function render()
    {
        return view('livewire.car-status-updater');
    }
    
}

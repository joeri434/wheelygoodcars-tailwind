<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class CarCreate extends Component
{
    use WithFileUploads;
    public $Image;
    public $step = 1;

    public $license_plate;
    public $brand;
    public $model;
    public $price;

    public $selectedTags = [];
    public $allTags;

    public function mount()
    {
        $this->allTags = Tag::all();
    }

    public function nextStep()
    {
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function submit()
    {
        $this->validate([
            'license_plate' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048', // max 2MB
        ]);

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('car_images', 'public');
        }

        $car = Car::create([
            'user_id' => Auth::id(),
            'license_plate' => $this->license_plate,
            'brand' => $this->brand,
            'model' => $this->model,
            'price' => $this->price,
            'image_path' => $imagePath,
        ]);

        $car->tags()->attach($this->selectedTags);

        session()->flash('success', 'Auto toegevoegd!');
        return redirect()->route('dashboard');
    }
    public function render()
    {
        return view('livewire.car-create');
    }
}

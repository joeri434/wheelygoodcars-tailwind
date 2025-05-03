<?php

namespace App\Livewire;


use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Car;


class CarWizard extends Component
{
   

    public $step = 1;
    public $kenteken, $merk, $model, $bouwjaar, $prijs;


    public function nextStep()
    {
        if ($this->step == 1) {
            $this->loadCarInfoFromRDW();
        } 
        $this->step++;
    }

    public function loadCarInfoFromRDW()
    {
        $cleanPlate = strtoupper(str_replace(' ', '', $this->kenteken));


        $response = Http::get("https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken={$cleanPlate}");


        if ($response->successful() && count($response->json()) > 0) {
            $carData = $response->json()[0];

            $this->merk = $carData['merk'];
            $this->model = $carData['handelsbenaming'];
            $this->bouwjaar = substr($carData['datum_eerste_toelating'], 0, 4);

        } else {
            session()->flash('error', 'Kenteken niet gevonden.');
        }
    }

    public function save()
    {
        Car::create([
            'user_id' => auth()->id(),
            'kenteken' => strtoupper(str_replace('-', '', $this->kenteken)),
            'merk' => $this->merk,
            'model' => $this->model,
            'bouwjaar' => $this->bouwjaar,
            'kilometerstand' => $this->kilometerstand,
            'prijs' => $this->prijs,
        ]);

        session()->flash('success', 'Auto toegevoegd!');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.car-wizard');
    }
}

// Compare this snippet from app/Models/Car.php:
// <?php
// namespace App\Models;
//
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\HasOne;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use Illuminate\Database\Eloquent\Relations\HasManyThrough;       

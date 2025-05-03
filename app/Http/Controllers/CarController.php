<?php
namespace App\Http\Controllers;

use App\Models\Car; // Ensure the Car model exists in this namespace. If not, update the namespace to the correct one.
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $autos = auth()->user()->cars;
        return view('aanbieder.dashboard', compact('autos'));
    }

    public function destroy(Car $car)
    {
        $this->authorize('delete', $car);
        $car->delete();
        return back()->with('message', 'Auto verwijderd');
    }
}
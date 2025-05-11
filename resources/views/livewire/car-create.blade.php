
    <div class="container mt-4">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        

        @if ($step === 1)
            <!-- Progressbar -->
            <div class="progress mb-4" style="height: 25px;">
                <div class="progress-bar" role="progressbar" style="width: {{ $step * 33.33 }}%;" aria-valuenow="{{ $step * 33.33 }}" aria-valuemin="0" aria-valuemax="100">
                    Stap {{ $step }} van 3
                </div>
            </div>
            <h3>Stap 1: Kenteken</h3>
            <input type="text" wire:model="license_plate" class="form-control" placeholder="Kenteken">
            <button wire:click="nextStep" class="btn btn-primary mt-3">Volgende</button>
        @elseif ($step === 2)
            <!-- Progressbar -->
            <div class="progress mb-4" style="height: 25px;">
                <div class="progress-bar" role="progressbar" style="width: {{ $step * 33.33 }}%;" aria-valuenow="{{ $step * 33.33 }}" aria-valuemin="0" aria-valuemax="100">
                    Stap {{ $step }} van 3
                </div>
            </div>
            <h3>Stap 2: Gegevens</h3>
            <input type="text" wire:model="brand" class="form-control mb-2" placeholder="Merk">
            <input type="text" wire:model="model" class="form-control mb-2" placeholder="Model">
            <input type="number" wire:model="price" class="form-control mb-2" placeholder="Prijs (€)">
            <input type="file" wire:model="image" class="form-control mb-2">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="d-flex justify-content-between">
                <button wire:click="previousStep" class="btn btn-secondary">Vorige</button>
                <button wire:click="nextStep" class="btn btn-primary">Volgende</button>
            </div>
        @elseif ($step === 3)
            <!-- Progressbar -->
            <div class="progress mb-4" style="height: 25px;">
                <div class="progress-bar" role="progressbar" style="width: {{ $step * 33.33 }}%;" aria-valuenow="{{ $step * 33.33 }}" aria-valuemin="0" aria-valuemax="100">
                    Stap {{ $step }} van 3
                </div>
            </div>
            <h3>Stap 3: Tags</h3>
            <select wire:model="selectedTags" multiple class="form-control mb-2">
                @foreach ($allTags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
    
            <div class="d-flex justify-content-between">
                <button wire:click="previousStep" class="btn btn-secondary">Vorige</button>
                <button wire:click="submit" class="btn btn-success">Opslaan</button>
            </div>
        @endif
    </div>
    


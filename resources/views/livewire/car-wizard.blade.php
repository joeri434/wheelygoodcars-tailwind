<div class="container mt-5">
    <h2>Auto toevoegen</h2>

    {{-- Progressbar --}}
    <div class="progress mb-4">
        <div class="progress-bar" role="progressbar" style="width: {{ $step * 33.33 }}%">
            Stap {{ $step }} van 3
        </div>
    </div>

    {{-- Step 1: Kenteken --}}
    @if ($step == 1)
        <div>
            <label for="kenteken">Kenteken</label>
            <input type="text" class="form-control" wire:model="kenteken">
        </div>
    @endif

    {{-- Step 2: Gegevens vanuit RDW --}}
    @if ($step == 2)
        <div>
            <div class="mb-2">
                <label>Merk</label>
                <input type="text" class="form-control" wire:model="merk" readonly>
            </div>
            <div class="mb-2">
                <label>Model</label>
                <input type="text" class="form-control" wire:model="model" readonly>
            </div>
            <div class="mb-2">
                <label>Bouwjaar</label>
                <input type="text" class="form-control" wire:model="bouwjaar" readonly>
            </div>
            <div class="mb-2">
                <label>Kilometerstand</label>
                <input type="number" class="form-control" wire:model="kilometerstand">
            </div>
        </div>
    @endif

    {{-- Step 3: Prijs --}}
    @if ($step == 3)
        <div>
            <label>Vraagprijs (€)</label>
            <input type="number" class="form-control" wire:model="prijs">
        </div>
    @endif

    {{-- Navigatieknoppen --}}
    <div class="mt-3 d-flex justify-content-between">
        @if ($step > 1)
            <button class="btn btn-secondary" wire:click="previousStep">Vorige</button>
        @endif

        @if ($step < 3)
            <button class="btn btn-primary" wire:click="nextStep">Volgende</button>
        @else
            <button class="btn btn-success" wire:click="save">Opslaan</button>
        @endif
    </div>
</div>

        
        

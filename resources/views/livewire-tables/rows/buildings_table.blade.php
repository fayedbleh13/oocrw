<x-livewire-tables::bs5.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->slug }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->description }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <button wire:click='$emit("editBuildingModal", "edit-building", {{ json_encode(["id" => $row->id]) }})' type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" >
        Edit
    </button>
</x-livewire-tables::bs5.table.cell>

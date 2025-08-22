<div class="container py-4">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h2 class="mb-0">Editar Programa</h2>
		<a href="{{ route('programas') }}" class="btn btn-outline-secondary">
			<span class="fas fa-arrow-left me-1"></span> Volver
		</a>
	</div>
	<div class="card shadow-sm">
		<div class="card-body">
			@include('livewire.programas._form')
			<div class="mt-3 d-flex gap-2">
				<button wire:click.prevent="save" class="btn btn-success">
					<span class="fas fa-save me-1"></span> Guardar
				</button>
				<a href="{{ route('programas') }}" class="btn btn-secondary">Cancelar</a>
			</div>
		</div>
	</div>
</div>


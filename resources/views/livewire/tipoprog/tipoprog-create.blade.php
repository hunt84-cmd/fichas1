<div>
	<div class="modal-bod">
		<label class="d-none" x-init="$dispatch('set-title', 'Crear')"></label>
		<form>
			<div class="form-floating mb-3">
				<input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="" wire:model.live.debounce="nombre">
				<label for="nombre">Nombre</label>
				@error('nombre')<span class="text-danger">{{ $message }}</span>@enderror
			</div>
			<div class="mb-3">
				<label class="form-label">Grupo</label>
				<select class="form-select @error('grupo_id') is-invalid @enderror" wire:model.live="grupo_id">
					<option value="">Seleccione</option>
					@foreach($grupos as $g)
						<option value="{{ $g->id }}">{{ $g->nombre }}</option>
					@endforeach
				</select>
				@error('grupo_id')<span class="text-danger">{{ $message }}</span>@enderror
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control @error('categoria') is-invalid @enderror" id="categoria" placeholder="" wire:model.live.debounce="categoria">
				<label for="categoria">Categoría</label>
				@error('categoria')<span class="text-danger">{{ $message }}</span>@enderror
			</div>
		</form>
	</div>
	<div class="modal-footer" style="border-top:none; padding:0px">
		<button wire:click.prevent="updatePost()" class="btn btn-success btn-block">Crear</button>
		<button wire:click="$dispatch('closeModal')" class="btn btn-secondary btn-block">Cancel</button>
	</div>
</div>


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
				<label class="form-label">Tipo de guion</label>
				<select class="form-select @error('tipo_guion_id') is-invalid @enderror" wire:model.live="tipo_guion_id">
					<option value="">Seleccione</option>
					@foreach($tipos as $t)
						<option value="{{ $t->id }}">{{ $t->nombre }}</option>
					@endforeach
				</select>
				@error('tipo_guion_id')<span class="text-danger">{{ $message }}</span>@enderror
			</div>
		</form>
	</div>
	<div class="modal-footer" style="border-top:none; padding:0px">
		<button wire:click.prevent="updatePost()" class="btn btn-success btn-block">Crear</button>
		<button wire:click="$dispatch('closeModal')" class="btn btn-secondary btn-block">Cancel</button>
	</div>
</div>


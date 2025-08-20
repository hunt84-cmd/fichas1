<div>

	<div class="modal-bod">
		<label class="d-none" x-init="$dispatch('set-title', 'Crear')">
		</label>
		<form>
			<div class="form-floating mb-3">
				<input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="" wire:model.live.debounce="nombre">
				<label for="nombre">Nombre</label>
				@error('nombre')
				<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div class="mb-3">
				<label class="form-label">Tipo</label>
				<select class="form-select @error('tipo_id') is-invalid @enderror" wire:model.live="tipo_id">
					<option value="">Seleccione</option>
					@foreach(\App\Models\TipoEmisora::all() as $t)
						<option value="{{ $t->id }}">{{ $t->nombre }}</option>
					@endforeach
				</select>
				@error('tipo_id')<span class="text-danger">{{ $message }}</span>@enderror
			</div>
			<div class="form-floating mb-3">
				<input type="date" class="form-control @error('periodo') is-invalid @enderror" id="periodo" wire:model.live="periodo">
				<label for="periodo">Periodo</label>
				@error('periodo')<span class="text-danger">{{ $message }}</span>@enderror
			</div>
			<div class="form-floating mb-3">
				<input type="number" class="form-control @error('user_id') is-invalid @enderror" id="user_id" placeholder="" wire:model.live.debounce="user_id">
				<label for="user_id">Usuario ID</label>
				@error('user_id')<span class="text-danger">{{ $message }}</span>@enderror
			</div>
			<div class="form-floating mb-3">
				<input type="number" class="form-control @error('insp_id') is-invalid @enderror" id="insp_id" placeholder="" wire:model.live.debounce="insp_id">
				<label for="insp_id">Inspector ID</label>
				@error('insp_id')<span class="text-danger">{{ $message }}</span>@enderror
			</div>
			<div class="d-grid gap-2">
			</div>
		</form>
	</div>
	<div class="modal-footer" style="border-top:none; padding:0px">
		<button wire:click.prevent="updatePost()" class="btn btn-success btn-block">Crear</button>
		<button wire:click="$dispatch('closeModal')" class="btn btn-secondary btn-block">Cancel</button>
	</div>
</div>


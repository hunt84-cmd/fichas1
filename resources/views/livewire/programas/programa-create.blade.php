<div>
	<div class="modal-bod">
		<label class="d-none" x-init="$dispatch('set-title', 'Crear Programa')"></label>
		<form>
			<div class="row g-2">
				<div class="col-md-6">
					<div class="form-floating mb-3">
						<input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="" wire:model.live.debounce="nombre">
						<label for="nombre">Nombre</label>
						@error('nombre')<span class="text-danger">{{ $message }}</span>@enderror
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-floating mb-3">
						<input type="text" class="form-control @error('objetivo') is-invalid @enderror" id="objetivo" placeholder="" wire:model.live.debounce="objetivo">
						<label for="objetivo">Objetivo</label>
						@error('objetivo')<span class="text-danger">{{ $message }}</span>@enderror
					</div>
				</div>
				<div class="col-12">
					<div class="form-floating mb-3">
						<textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" style="height: 120px" placeholder="" wire:model.live.debounce="descripcion"></textarea>
						<label for="descripcion">Descripción</label>
						@error('descripcion')<span class="text-danger">{{ $message }}</span>@enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-floating mb-3">
						<input type="date" class="form-control @error('creacion') is-invalid @enderror" id="creacion" wire:model.live="creacion">
						<label for="creacion">Fecha de creación</label>
						@error('creacion')<span class="text-danger">{{ $message }}</span>@enderror
					</div>
				</div>
				<div class="col-md-4">
					<label class="form-label d-block">Origen</label>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="origenI" value="1" wire:model.live="origen">
						<label class="form-check-label" for="origenI">Interno</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="origenE" value="0" wire:model.live="origen">
						<label class="form-check-label" for="origenE">Externo</label>
					</div>
				</div>
				<div class="col-md-4">
					<label class="form-label">Días</label>
					<select multiple class="form-select @error('dias') is-invalid @enderror" wire:model.live="dias">
						@foreach(['L','M','X','J','V','S','D'] as $d)
							<option value="{{ $d }}">{{ $d }}</option>
						@endforeach
					</select>
					@error('dias')<span class="text-danger">{{ $message }}</span>@enderror
				</div>
				<div class="col-md-6">
					<div class="row g-2">
						<div class="col-6">
							<div class="form-floating mb-3">
								<input type="number" class="form-control @error('porciento_musica.0') is-invalid @enderror" id="pmc" min="0" max="100" wire:model.live="porciento_musica.0">
								<label for="pmc">Música cubana %</label>
								@error('porciento_musica.0')<span class="text-danger">{{ $message }}</span>@enderror
							</div>
						</div>
						<div class="col-6">
							<div class="form-floating mb-3">
								<input type="number" class="form-control @error('porciento_musica.1') is-invalid @enderror" id="pme" min="0" max="100" wire:model.live="porciento_musica.1">
								<label for="pme">Música extranjera %</label>
								@error('porciento_musica.1')<span class="text-danger">{{ $message }}</span>@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-floating mb-3">
						<input type="time" class="form-control @error('inicio') is-invalid @enderror" id="inicio" wire:model.live="inicio">
						<label for="inicio">Inicio</label>
						@error('inicio')<span class="text-danger">{{ $message }}</span>@enderror
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-floating mb-3">
						<input type="time" class="form-control @error('final') is-invalid @enderror" id="final" wire:model.live="final">
						<label for="final">Final</label>
						@error('final')<span class="text-danger">{{ $message }}</span>@enderror
					</div>
				</div>
				<div class="col-md-4">
					<label class="form-label">Emisora</label>
					<select class="form-select @error('emisora_id') is-invalid @enderror" wire:model.live="emisora_id">
						<option value="">Seleccione</option>
						@foreach($emisoras as $e)
							<option value="{{ $e->id }}">{{ $e->nombre }}</option>
						@endforeach
					</select>
					@error('emisora_id')<span class="text-danger">{{ $message }}</span>@enderror
				</div>
				<div class="col-md-4">
					<label class="form-label">Función</label>
					<select class="form-select @error('funcion_id') is-invalid @enderror" wire:model.live="funcion_id">
						<option value="">Seleccione</option>
						@foreach($funciones as $f)
							<option value="{{ $f->id }}">{{ $f->nombre }}</option>
						@endforeach
					</select>
					@error('funcion_id')<span class="text-danger">{{ $message }}</span>@enderror
				</div>
				<div class="col-md-4">
					<label class="form-label">Tipo de Programa</label>
					<select class="form-select @error('tipo_id') is-invalid @enderror" wire:model.live="tipo_id">
						<option value="">Seleccione</option>
						@foreach($tipos as $t)
							<option value="{{ $t->id }}">{{ $t->nombre }}</option>
						@endforeach
					</select>
					@error('tipo_id')<span class="text-danger">{{ $message }}</span>@enderror
				</div>
				<div class="col-md-4">
					<div class="form-floating mb-3">
						<input type="text" class="form-control @error('tema') is-invalid @enderror" id="tema" wire:model.live.debounce="tema">
						<label for="tema">Tema</label>
						@error('tema')<span class="text-danger">{{ $message }}</span>@enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-floating mb-3">
						<input type="text" class="form-control @error('especificacion') is-invalid @enderror" id="especificacion" wire:model.live.debounce="especificacion">
						<label for="especificacion">Especificación</label>
						@error('especificacion')<span class="text-danger">{{ $message }}</span>@enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-floating mb-3">
						<input type="text" class="form-control @error('destinatario') is-invalid @enderror" id="destinatario" wire:model.live.debounce="destinatario">
						<label for="destinatario">Destinatario</label>
						@error('destinatario')<span class="text-danger">{{ $message }}</span>@enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-floating mb-3">
						<input type="text" class="form-control @error('tiempo_aproximado') is-invalid @enderror" id="tiempo_aproximado" placeholder="Formato libre" wire:model.live.debounce="tiempo_aproximado">
						<label for="tiempo_aproximado">Tiempo aproximado (JSON)</label>
						@error('tiempo_aproximado')<span class="text-danger">{{ $message }}</span>@enderror
					</div>
				</div>
				<div class="col-md-4 d-flex align-items-center">
					<div class="form-check form-switch mt-3">
						<input class="form-check-input" type="checkbox" id="vivo" wire:model.live="vivo">
						<label class="form-check-label" for="vivo">En vivo</label>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer" style="border-top:none; padding:0px">
		<button wire:click.prevent="updatePost()" class="btn btn-success btn-block">Crear</button>
		<button wire:click="$dispatch('closeModal')" class="btn btn-secondary btn-block">Cancel</button>
	</div>
</div>


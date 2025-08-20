<div>
    @section('message')
        <div class="alert alert-success" role="alert">
            A simple success alert—check it out!
        </div>
    @endsection
    <div>
        <livewire:FuncionesTable theme="bootstrap-5" ref="si"/>
    </div>
</div>


@script
<script>
    $wire.on("closeModal",() =>  {
        document.querySelector('button.btn-close').click();
        // $(".btn-close").trigger("click");
        // alert("");
    })
</script>
@endscript

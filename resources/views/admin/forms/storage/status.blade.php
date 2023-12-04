<div class="modal fade" id="confirmationModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel{{ $item->id }}">Confirmación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de cambiar el estado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="/store/{{$item->id}}/confirm">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <button type="submit" class="btn btn-primary">Sí, cambiar estado</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--begin::status-->
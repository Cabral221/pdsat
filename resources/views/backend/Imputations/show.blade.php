@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            <h3>@lang('Demande d\'imputation')</h3>
            <div class="d-flex mb-2">
                <span class="">Etat de la demande :
                    @if ($imputation->validation == false)
                        <span class="badge badge-secondary">En attente de validation</span>
                    @else
                        @if ($imputation->status == false)
                            <span class="badge badge-warning">En attente de signature</span>
                        @else
                            <span class="badge badge-success">Disponible</span>
                        @endif
                    @endif
                </span>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="border-left p-2">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">N° Demande</span>
                            <Span class="font-weight-bold">{{ $imputation->id }}</Span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Matricule</span>
                            <span class="font-weight-bold">{{ $imputation->registration_number }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Prénom</span>
                            <span class="font-weight-bold">{{ $imputation->first_name }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Nom</span>
                            <span class="font-weight-bold">{{ $imputation->last_name }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Fonction</span>
                            <span class="font-weight-bold">{{ $imputation->fonction }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Service</span>
                            <span class="font-weight-bold">{{ $imputation->service }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Email</span>
                            <span class="font-weight-bold">{{ $imputation->email }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="">Téléphone</span>
                            <span class="font-weight-bold">{{ $imputation->phone }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="border-left  p-2">
                        <diV class="d-flex justify-content-between">
                            <span class="">Nom de la personne Malade</span>
                            <span class="font-weight-bold">{{ $imputation->sick_name }}</span>
                        </diV>
                    </div>
                </div>
            </div>

            <div class="pt-4 text-center">
                @if ($imputation->validation)
                    <a href="{{ route('admin.imputations.print', $imputation) }}" class="btn btn-warning"><span class="cil-print btn-icon mr-2"></span> Imprimer</a>
                    {{-- <a href="#" class="btn btn-secondary"><span class="cil-print btn-icon mr-2"></span> Charger</a> --}}
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#finalImputationModal" data-whatever="@fat">Envoyez l'imputation</button>
                    {{-- Option desactiver demande --}}
                @else
                    <form action="{{ route('admin.imputations.active', $imputation) }}" method="post" style="display: inline">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-primary"><span class="cil-check-circle btn-icon mr-2"></span> Valider</button>
                    </form>
                @endif

                <form action="{{ route('admin.imputations.delete', $imputation) }}" method="post" id="form_delete_imp_{{ $imputation->id }}"  style="display: inline">
                    @csrf
                    @method('DELETE')
                </form>

                <button type="button" class="btn btn-danger" onclick="if(confirm('Etes vous sur de vouloir supprimer cette demande')){document.getElementById('form_delete_imp_{{ $imputation->id }}').submit();}">
                    <span class="cil-trash btn-icon mr-2"></span> Supprimer
                </button>
            </div>

            {{-- Modal de chargement de fichier --}}
            <div class="modal fade" id="finalImputationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form class="form" action="{{ route('admin.imputations.load', $imputation) }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Charger l'imputation et l'envoyer par mail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">A:</label>
                                <input type="email" name="email" class="form-control" id="recipient-name" value="{{ $imputation->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="file">Fichier (PDF)</label>
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
            {{-- End Modal de chargmement de fichiers --}}
        </x-slot>
    </x-backend.card>
@endsection


@section('after-scripts')
<script type="text/javascript">
    $('#exampleModal').on('show.coreui.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    // Update the modal's content.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })
</script>
@endsection

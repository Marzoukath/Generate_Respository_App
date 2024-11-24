@extends('layouts.user_type.auth')

@section('content')
<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Tous les citoyens</h5>
                        </div>
                        <a href="" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Insérer un nouveau Citoyen</a>
                        <button id="approveSelected" class="btn bg-gradient-success btn-sm mb-0" type="button">Approuver les Sélectionnés</button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="citizensTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="selectAll" />
                                    </th>
                                    {{-- <th>Status</th> --}}
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénoms</th>
                                    <th>Email</th>
                                    <th>Quartier</th>
                                    <th>Chef Quartier</th>
                                    <th>Téléphone</th>
                                    <th>Numéro d'identification</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citizens as $citizen)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="selectCitizen" value="{{ $citizen->id }}" />
                                        </td>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $citizen->id }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $citizen->first_name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $citizen->last_name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $citizen->email }}</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $citizen->neighborhood}}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $citizen->chief_neighborhood}}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $citizen->phone}}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $citizen->id_number}}</span>
                                        </td>
                                        {{-- <td class="text-center">
                                            <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit citizen">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span>
                                        </td> --}}
                                        <td class="text-center">
                                            <a href="{{--route('')--}}"><span class="badge badge-sm bg-gradient-secondary">Approuver</span></a>
                                        </td>
                                        {{-- <td>
                                            <div>
                                                <img src="{{ $citizen->photo ?? '/assets/img/default-avatar.png' }}" class="avatar avatar-sm me-3">
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- DataTable --}}
                        
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
$('#citizensTable').DataTable({
responsive: true,
language: {
url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/French.json' // Traduction en français
},
pageLength: 10, // Nombre de lignes par page
order: [[0, 'asc']], // Tri initial sur la première colonne
});
});


$(document).ready(function() {
$('#citizensTable').DataTable({
responsive: true,
processing: true,
serverSide: true,
ajax: "{{ route('citizens.store') }}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'first_name', name: 'first_name' },
{ data: 'last_name', name: 'last_name' },
{ data: 'email', name: 'email' },
{ data: 'neighborhood', name: 'neighborhood' },
{ data: 'chief_neighborhood', name: 'chief_neighborhood' },
{ data: 'phone', name: 'phone' },
{ data: 'id_number', name: 'id_number' },
{ data: 'actions', name: 'actions', orderable: false, searchable: false },
{ data: 'status', name: 'status' }
],
language: {
url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/French.json'
}
});
});
$(document).ready(function () {
    // Sélectionner/Désélectionner toutes les cases
    $('#selectAll').on('click', function () {
        $('.selectCitizen').prop('checked', this.checked);
    });

    // Gestion de l'approbation des citoyens sélectionnés
    $('#approveSelected').on('click', function () {
        // Récupérer les IDs des citoyens sélectionnés
        let selected = [];
        $('.selectCitizen:checked').each(function () {
            selected.push($(this).val());
        });

        // Vérifier si des citoyens sont sélectionnés
        if (selected.length === 0) {
            alert("Veuillez sélectionner au moins un citoyen.");
            return;
        }

        // Envoyer une requête AJAX pour approuver les citoyens
        $.ajax({
            url: "{{ route('citizens.approve') }}", // Route pour approuver les citoyens
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                ids: selected
            },
            success: function (response) {
                alert("Les citoyens sélectionnés ont été approuvés avec succès.");
                location.reload(); // Recharger la page pour mettre à jour les données
            },
            error: function (xhr) {
                alert("Une erreur s'est produite. Veuillez réessayer.");
            }
        });
    });
});

</script>
</section>
@endsection

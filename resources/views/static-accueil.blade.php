@extends('layouts.user_type.any')

@section('content')

<section>
    <div class="page-header section-height-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-info text-gradient">Bienvenue sur CertiMairie</h3>
                            <p class="mb-0">Simplifiez vos démarches administratives avec notre plateforme moderne.</p>
                        </div>
                        <div class="card-body">
                            <p>
                                CertiMairie est un service en ligne dédié à la génération rapide et sécurisée de <strong>certificat de résidence</strong>.
                                Grâce à notre interface intuitive, les citoyens peuvent facilement effectuer leur demande et recevoir leurs documents sous format PDF en quelques clics.
                            </p>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-sm mx-auto">
                                Commencez dès aujourd'hui à profiter de nos services simples et efficaces.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                            style="background-image:url('../assets/img/curved-images/still.jpg')"></div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4 mx-4">
                                <div class="card-header pb-0">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div>
                                            <h2 class="mb-0">Tous les citoyens</h2>
                                        </div>
                                        @auth
                                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Insérer un nouveau Citoyen</a>
                                        @endauth
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table id="citizensTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nom</th>
                                                    <th>Prénoms</th>
                                                    <th>Email</th>
                                                    <th>Quartier</th>
                                                    <th>Chef Quartier</th>
                                                    <th>Téléphone</th>
                                                    <th>Numéro d'identification</th>
                                                    <th>Actions</th>
                                                    {{-- <th>Status</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($citizens as $citizen)
                                                    <tr>
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
                                                        <td class="align-middle text-center text-sm">
                                                            {{ str_repeat('*', strlen($citizen->id_number)) }}
                                                        </td>
                                                        
                                                        
                                                        {{-- <td class="text-center">
                                                            <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit citizen">
                                                                <i class="fas fa-user-edit text-secondary"></i>
                                                            </a>
                                                            <span>
                                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                            </span>
                                                        </td> --}}
                                                        <td class="align-middle text-center text-sm">
                                                            <button class="badge badge-sm bg-gradient-success generate-btn" 
                                                                    data-id="{{ $citizen->id }}" 
                                                                    data-id-number="{{ $citizen->id_number }}">Générer</button>
                                                        </td>
                                                        
                                                        
                                                        {{-- <td class="text-center">
                                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                              Edit
                                                            </a>
                                                        </td> --}}
                                                        {{-- <td>
                                                            <div>
                                                                <img src="{{ $citizen->photo ?? '/assets/img/default-avatar.png' }}" class="avatar avatar-sm me-3">
                                                            </div>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                                <!-- Modal -->
<div class="modal fade" id="generateModal" tabindex="-1" role="dialog" aria-labelledby="generateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="generateModalLabel">Vérification du Numéro d'Identification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="verifyForm">
                    <input type="hidden" id="citizenId">
                    <div class="form-group mb-3">
                        <label for="idNumber">Numéro d'Identification</label>
                        <input type="text" class="form-control" id="idNumber" placeholder="Entrez le numéro d'identification" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Vérifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Gestion du clic sur le bouton "Générer"
    document.querySelectorAll('.generate-btn').forEach(button => {
    button.addEventListener('click', function () {
        const citizenId = this.getAttribute('data-id');
        const idNumber = this.getAttribute('data-id-number');
        document.getElementById('citizenId').value = citizenId; // Ajoute l'ID dans le champ caché
        document.getElementById('idNumber').value = ''; // Réinitialise le champ ID
        const modal = new bootstrap.Modal(document.getElementById('generateModal'));
        modal.show();
    });
});


    // Soumission du formulaire de vérification
    document.getElementById('verifyForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const citizenId = document.getElementById('citizenId').value;
        const idNumber = document.getElementById('idNumber').value;

        if (!idNumber) {
        alert('Veuillez entrer un numéro d\'identification.');
        return;
    }
        fetch('/verify-id', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token de sécurité Laravel
            },
            body: JSON.stringify({
                citizen_id: citizenId,
                id_number: idNumber
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.valid) {
                alert('Numéro valide. Le certificat sera généré.');
                window.location.href = '/generate-certificate/' + citizenId; // Redirection pour générer le certificat
            } else {
                alert('Numéro incorrect.');
            }
        })
        .catch(error => {
            console.error('Erreur :', error);
            alert('Une erreur est survenue. Veuillez réessayer.');
        });
    });
</script>


                                            </tbody>
                                        </table>
                                       
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
            { data: 'id_number', name: 'id_number' ,  render: function (data) {
                    return '*'.repeat(data.length); // Masquage avec des étoiles
                }
            },
            { data: 'actions', name: 'actions', orderable: false, searchable: false },
            // { data: 'status', name: 'status' }
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/French.json'
        }
    });
});


    // Server Side Call using Url
    //var table = $('#example').DataTable({
    //    //"responsive": true,
    //    "processing": true,
    //    "serverSide": true,
    //    "info": true,
    //    "stateSave": true,
    //    "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
    //    "ajax": {
    //        "url": "/DatatableAdvance/AjaxGetJsonData",
    //        "type": "GET"
    //    },
    //    "columns": [
    //        {
    //            "className": 'details-control',
    //            "orderable": false,
    //            "data": null,
    //            "orderable": true,
    //            "defaultContent": ''
    //        },
    //        {
    //            "data": "Inquiry", "orderable": false,
    //            "data": function (data) {
    //                return '<input type="hidden" id="hiddenTextInquiry" name="hiddenTextInquiry" value="' + data.InquiryId + '">' + data.InquiryId
    //            }
    //        },
    //        { "data": "ReferencesDetails", "orderable": false },
    //        { "data": "ReferencesNumber", "orderable": true },
    //        { "data": "Remark", "orderable": true },
    //        { "data": "TelephoneNumber", "orderable": true },
    //        { "data": "Date", "orderable": true },
    //        {
    //            "data": "Inquiry", "bSearchable": false, "bSortable": false, "sWidth": "40px",
    //            "data": function (data) {
    //                return '<button class="btn btn-danger" type="button">' + data.InquiryId + 'Delete</button>'
    //            }
    //        }
    //    ],
    //    "order": [[0, 'asc']]
    //});

    </script>
</section>

@endsection
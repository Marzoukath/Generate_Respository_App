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
                            <p class="mb-3">Simplifiez vos démarches administratives avec notre plateforme moderne.</p>
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($citizens as $citizen)
                                                    <tr>
                                                        <td>{{ $citizen->id }}</td>
                                                        <td>{{ $citizen->first_name }}</td>
                                                        <td>{{ $citizen->last_name }}</td>
                                                        <td>{{ $citizen->email }}</td>
                                                        <td>{{ $citizen->neighborhood }}</td>
                                                        <td>{{ $citizen->chief_neighborhood }}</td>
                                                        <td>{{ $citizen->phone }}</td>
                                                        <td>{{ str_repeat('*', strlen($citizen->id_number)) }}</td>
                                                        <td>
                                                            <button class="btn btn-success generate-btn" 
                                                                    data-id="{{ $citizen->id }}" 
                                                                    data-id-number="{{ $citizen->id_number }}">Générer</button>
                                                        </td>
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
            </div>
        </div>
    </div>

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
                        <div class="mb-3">
                            <label for="idNumber" class="form-label">Numéro d'Identification</label>
                            <input type="text" class="form-control" id="idNumber" placeholder="Entrez le numéro d'identification" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Vérifier</button>
                    </form>
                </div>
            </div>      
        </div>
    </div>

</section>

<script>
    
    document.addEventListener('DOMContentLoaded', () => {
        // Gestion du clic sur le bouton "Générer"
        document.querySelectorAll('.generate-btn').forEach(button => {
            button.addEventListener('click', function () {
                const citizenId = this.getAttribute('data-id');
                const idNumber = this.getAttribute('data-id-number');
                document.getElementById('citizenId').value = citizenId;
                document.getElementById('idNumber').value = ''; // Réinitialise le champ ID
                const modal = new bootstrap.Modal(document.getElementById('generateModal'));
                modal.show();
            });
        });

        // Soumission du formulaire
        document.getElementById('verifyForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const citizenId = document.getElementById('citizenId').value;
            const enteredIdNumber = document.getElementById('idNumber').value;

            if (!enteredIdNumber) {
                alert('Veuillez entrer un numéro d\'identification.');
                return;
            }

            fetch('/verify-id', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    citizen_id: citizenId,
                    id_number: enteredIdNumber
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.valid) {
                    window.location.href = `/pdf/${citizenId}`;
                } else {
                    alert('Numéro incorrect. Veuillez réessayer.');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Une erreur est survenue. Veuillez réessayer.');
            });
        });
    });
</script>

@endsection

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
                                            <h5 class="mb-0">Tous les citoyens</h5>
                                        </div>
                                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Insérer un nouveau Citoyen</a>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        ID
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Nom
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Prénoms
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Email
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Quartier
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Chef Quartier
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Numéro de téléphone
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Numéro d'identification
                                                    </th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Actions
                                                    </th>
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
                                                        <td class="text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $citizen->id_number}}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit citizen">
                                                                <i class="fas fa-user-edit text-secondary"></i>
                                                            </a>
                                                            <span>
                                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <button src="" class="button">Generer </button>
                                                            </div>
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
            </div>
        </div>
    </div>
</section>


@endsection
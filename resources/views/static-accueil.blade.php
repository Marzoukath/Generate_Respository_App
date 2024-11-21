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
            </div>
        </div>
    </div>
</section>


@endsection
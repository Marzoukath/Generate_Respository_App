@extends('layouts.user_type.auth')

@section('content')

  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Salut!</h1>
            <p class="text-lead text-white">Remplissez les champs pour vous enregistrez en tant que citoyens.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>A remplir</h5>
            </div>
            
            <div class="card-body">
                <form role="form text-left" method="POST" action="{{ route('citizens.store') }}">
                    @csrf
                    <!-- Nom -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="first_name" placeholder="Nom" aria-label="Nom" required>
                        @error('first_name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <!-- Prénom -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="last_name" placeholder="Prénom" aria-label="Prénom" required>
                        @error('last_name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <!-- Adresse e-mail -->
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Adresse e-mail" aria-label="Email" required>
                        @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <!-- Quartier de résidence -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="neighborhood" placeholder="Quartier de résidence" aria-label="Quartier de résidence" required>
                        @error('neighborhood')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <!-- Chef de quartier -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="chief_neighborhood" placeholder="Chef de quartier" aria-label="Chef de quartier" required>
                        @error('chief_neighborhood')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <!-- Numéro de téléphone -->
                    <div class="mb-3">
                        <input type="tel" class="form-control" name="phone" placeholder="Numéro de téléphone" aria-label="Numéro de téléphone" required >
                        @error('phone')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <!-- Numéro d'identification -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="id_number" placeholder="Numéro d'identification (ex : pièce d'identité)" aria-label="Numéro d'identification" required>
                        @error('id_number')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                  
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Insérer</button>
                </div>
            
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection


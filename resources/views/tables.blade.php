@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Authors table</h6>
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
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                              {{-- <td class="text-center">
                                  <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit citizen">
                                      <i class="fas fa-user-edit text-secondary"></i>
                                  </a>
                                  <span>
                                      <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                  </span>
                              </td> --}}
                              <td class="text-center">
                                  <a href="{{--route('')--}}"><span class="badge badge-sm bg-gradient-secondary">Demande</span></a>
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
  </main>
  
  @endsection

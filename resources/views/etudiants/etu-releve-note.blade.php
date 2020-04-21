@extends('layouts.layout-etudiant')
@section('contenu-etudiant')
    <div class="container">
        <!-- titre de la page -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2 ">
            <h1 class="mb-3 text-primary mx-auto">Releves de notes <i class="fas fa-file-invoice"></i></h1>
        </div>

        <div class="row my-3">
            <div class="offset-lg-3 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        @if($etat)
                        <p class="text-danger h5 my-3" >
                            Vous avez déjà une demande en cours!
                        </p>
                        @else
                        <p class="text-black h5 my-3" >
                            Veuillez saisir les informations nécessaire à la reclamation de note dans le formulaire ci-dessous!
                        </p>
                        @endif
                        <form action="/releves" method="POST" class="reclam-form">
                            @csrf
                            <div class="form-row my-4">
                                <div class="col-lg-12">
                                    <label for="type_releve">Type de relevé</label>
                                    <select name="type_releve" class="form-control @error('type_releve') is-invalid @enderror" id="type_releve">
                                        <option selected>- Choisir -</option>
                                        <option value="intermediaire">Relevé intermédiaire</option>
                                        <option value="definitif">Relevé définitif</option>
                                    </select>

                                    @error('type_releve')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="col-lg-12">
                                    <label for="type_releve">Année scolaire du relevé</label>
                                    <select name="annee_du_releve" class="form-control @error('annee_du_releve') is-invalid @enderror" id="annee_releve">
                                        <option selected>- Choisir -</option>
                                        <option value="2019-2020">2019-2020</option>
                                        <option value="2018-2019">2018-2019</option>
                                    </select>

                                    @error('annee_du_releve')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success my-2 float-lg-right" @if($etat) disabled  @endif>Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

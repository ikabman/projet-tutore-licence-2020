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
                        <p class="text-black h5 my-3" >
                            Veuillez saisir les information nécessaire à la reclamation de notes dans le formulaire ci-dessous!
                        </p>
                        <form action="/demande" method="POST" class="reclam-form">
                            @csrf
                            <div class="form-row my-4">
                                <div class="col-lg-12">
                                    <label for="type_releve">Type de relevé</label>
                                    <select name="type_releve" class="form-control" id="type_releve">
                                        <option value="intermediaire">Relevé intermédiaire</option>
                                        <option value="definitif">Relevé définitif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="col-lg-12">
                                    <label for="type_releve">Année scolaire du relevé</label>
                                    <select name="annee_releve" class="form-control" id="annee_releve">
                                        <option value="2019-2020">2019-2020</option>
                                        <option value="2018-2019">2018-2019</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success my-2 float-lg-right " >Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

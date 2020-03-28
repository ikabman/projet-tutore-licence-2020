@extends('layouts.layout-etudiant')
@section('contenu-etudiant')
    <div class="container">
        <!-- titre de la page -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2 ">
            <h1 class=" mb-3 text-primary mx-auto">Reclamations de notes</h1>
        </div>

        <!-- formulaire -->
        <div class="row my-3">
            <div class="offset-lg-2 col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <p class="text-black h4 my-3" >
                            Veuillez saisir les information nécessaire à la reclamation de notes dans le formulaire ci-dessous!
                        </p>
                        <form action="/etu/reclamation" method="POST" class="reclam-form">
                            @csrf
                            <div class="form-row my-4">
                                <div class="col-lg-4">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code">
                                    <div class="invalid-feedback">
                                        Saisie invalide
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <label for="code">Libelle</label>
                                    <input type="text" class="form-control" name="libelle">
                                    <div class="invalid-feedback">
                                        Saisie invalide
                                    </div>
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="col-lg-4">
                                    <label for="note_obtenue">Note obtenue</label>
                                    <input type="text" class="form-control" name="note_obtenue" id="note_obtenue">
                                </div>
                                <div class="col-lg-8">
                                    <label for="note_attendue_ue">Note reclamée</label>
                                    <select name="note_reclame" id="note_reclame" class="custom-select">
                                        <option>18-20</option>
                                        <option>16-18</option>
                                        <option>14-16</option>
                                        <option>12-14</option>
                                        <option>10-12</option>
                                        <option>8-10</option>
                                        <option>6-8</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group my-4">
                                <label for="type_note">Evaluation</label>
                                <select name="type_note" id="type_note" class="custom-select">
                                    <option selected>Choisir une évaluation</option>
                                    <option>Devoir</option>
                                    <option>Examen</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary my-2 float-lg-right " >Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



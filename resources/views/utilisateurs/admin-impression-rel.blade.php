@extends("layouts.layout-admin")
@section('contenu-admin')
    <!-- Diapo resume -->
    @include('includes.layout-recap-releve')

    <!-- Page d'impression content -->
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Impression <i class="fas fa-print icon-etape-style"></i></h6>
        </div>
        <div class="card-body">
            <div class="row search-sort-box">
                <!-- Sort box -->
                <div class="col-lg-4">
                    <form class="form-inline">
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                          <option selected>Actions groupés</option>
                          <option value="1">Etape suivante</option>
                          <option value="2">action</option>
                          <option value="3">other action</option>
                        </select>
                    </form>
                </div>
                <!-- Search-box -->
                <div class="col-lg-4 offset-lg-4 col-lg-4">
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                          <input type="text" class="form-control bg-light border-0 small" placeholder="Faire une recherche..." aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                              <i class="fas fa-search fa-sm"></i>
                            </button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive container">
                <table class="table table-striped border-left-primary " id="tableDemandes" width="100%" cellspacing="0">
                    @if($nRel_imprimes > 0)
                        <!--titres du tableau -->
                        <thead class="thead-primary">
                            <tr>
                                <th scope="col" style="width: 1em;">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Année du relevé</th>
                                <th scope="col">Type de relevé</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>

                        <!-- Contenu du tableau -->
                        <tbody>
                            @foreach ($Rel_imprimes as $rel)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck{{$rel->id}}">
                                            <label class="custom-control-label" for="customCheck{{$rel->id}}"></label>
                                        </div>
                                    </td>
                                    <td>{{$rel->name}}</td>
                                    <td>{{$rel->first_name}}</td>
                                    <td>{{$rel->annee_du_releve}}</td>
                                    <td>{{$rel->type_releve}}</td>
                                    <td >
                                        <button type="button" class="btn btn-warning btn-sm float-md-right text-white text-bold">Passer l'etape <i class="fas fa-angle-double-right"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        @include('includes.empty')
                    @endif
                </table>
            </div>
            <div class="row pagin-row float-right ">
                <div class="col-lg-12">
                    <nav aria-label="..." >
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" tabindex="-1">Précédent</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Suivant</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

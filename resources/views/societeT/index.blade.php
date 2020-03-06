
{{-- calling layouts \ app.blade.php --}}
@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Les Sociétes de transport</h1>
        </div>


        <br />

        <div class="row">
            <div class="table table-responsive">
                <table class="table table-bordered" id="table">
                    <tr>

                        <th>No</th>
                        <th>libelle</th>
                        <th>adresse</th>
                        <th>email</th>
                        <th>tel</th>
                        <th>fax</th>
                        <th>code_postal</th>
                        <th>registre_commercial</th>
                        <th>matricule_fiscal</th>
                        <th>Create At</th>
                        <th class="text-center" width="150px">
                            <a href="#" class="create-modal btn btn-success btn-sm">
                                <i class="fa fa-plus"></i>
                            </a>
                        </th>

                    </tr>

                    {{ csrf_field() }}
                    <?php  $no=1; ?>
                    @foreach ($societeT as $value)
                        <tr class="societeT{{$value->id}}">
                            <td>{{ $no++ }}</td>
                            <td>{{ $value->libelle }}</td>
                            <td>{{ $value->adresse }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->tel }}</td>
                            <td>{{ $value->fax }}</td>
                            <td>{{ $value->code_postal }}</td>
                            <td>{{ $value->registre_commercial }}</td>
                            <td>{{ $value->matricule_fiscal }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>
                                <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-libelle="{{$value->libelle}}" data-adresse="{{$value->adresse}}"data-email="{{$value->email}}"
                                   data-tel="{{$value->tel}}"  data-fax="{{$value->fax}}" data-code_postal="{{$value->code_postal}}" data-registre_commercial="{{$value->registre_commercial}}" data-matricule_fiscal="{{$value->matricule_fiscal}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="/societeT/{{ $value->id }}/edit" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-libelle="{{$value->libelle}}" data-adresse="{{$value->adresse}}"data-email="{{$value->email}}"
                                   data-tel="{{$value->tel}}"  data-fax="{{$value->fax}}"
                                   data-code_postal="{{$value->code_postal}}"  data-registre_commercial="{{$value->registre_commercial}}" data-matricule_fiscal="{{$value->matricule_fiscal}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-libelle="{{$value->libelle}}" data-adresse="{{$value->adresse}}"data-email="{{$value->email}}"
                                   data-tel="{{$value->tel}} "  data-fax="{{$value->fax}}"  data-code_postal="{{$value->code_postal}}" data-registre_commercial="{{$value->registre_commercial}}" data-matricule_fiscal="{{$value->matricule_fiscal}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {{$societeT->links()}}
        </div>
        {{-- Modal Form Creer societe --}}
        <div id="create" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group row add">
                                <label class="control-label col-sm-2" for="libelle">libelle :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="li" name="libelle"
                                           placeholder="Your libelle Here" required>
                                    <p class="error text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="adresse">adresse :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ad" name="adresse"
                                           placeholder="Your adresse Here" required>
                                    <p class="error text-center alert alert-danger hidden"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">email :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="em" name="email"
                                           placeholder="Your email Here" required>
                                    <p class="error text-center alert alert-danger hidden"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tel">tel :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="te" name="tel"
                                           placeholder="Your tel Here" required>
                                    <p class="error text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="fax">fax :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fa" name="fax"
                                           placeholder="Your fax Here" required>
                                    <p class="error text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="code_postal">code_postal :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="co" name="code_postal"
                                           placeholder="Your code_postal Here" required>
                                    <p class="error text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="registre_commercial">registre_commercial :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="re" name="registre_commercial"
                                           placeholder="Your registre_commercial Here" required>
                                    <p class="error text-center alert alert-danger hidden"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="matricule_fiscal">matricule_fiscal :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ma" name="matricule_fiscal"
                                           placeholder="Your matricule_fiscal Here" required>
                                    <p class="error text-center alert alert-danger hidden"></p>
                                </div>
                            </div>


                        </form>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="submit" id="add">
                            <span class="glyphicon glyphicon-plus"></span>enregistrer
                        </button>

                        <button class="btn btn-warning" type="button" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remobe"></span>fermer
                        </button>
                    </div>
                </div>
            </div>
        </div></div>

    {{-- Modal Form Detail societe --}}
    <div id="show" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Detail </h3>
                    <h4 class="modal-libelle"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">id :</label>
                        <b id="id"/>
                    </div>
                    <div class="form-group">
                        <label for="">libelle:</label>
                        <b id="lb"/>
                    </div>
                    <div class="form-group">
                        <label for="">adresse:</label>
                        <b id="ar"/>
                    </div>
                    <div class="form-group">
                        <label for="">email:</label>
                        <b id="ea"/>
                    </div>
                    <div class="form-group">
                        <label for="">tel:</label>
                        <b id="tl"/>
                    </div>
                    <div class="form-group">
                        <label for="">fax:</label>
                        <b id="fx"/>
                    </div>
                    <div class="form-group">
                        <label for="">code_postal:</label>
                        <b id="cd"/>
                    </div>

                    <div class="form-group">
                        <label for="">registre_commercial:</label>
                        <b id="rg"/>
                    </div>

                    <div class="form-group">
                        <label for="">matricule_fiscal:</label>
                        <b id="mt"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Form Modifier and Supprimer societe --}}
    <div id="myModal"class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="modal">

                        <div class="form-group">
                            <label class="control-label col-sm-2"for="id">id</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2"for="libelle">libelle</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="l">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2"for="adresse">adresse</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="a">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="email">email</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="e">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="tel">tel</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="t">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="fax">fax</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="f">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="code_postal">code_postal</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="c">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="registre_commercial">registre_commercial</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="r">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2"for="matricule_fiscal">matricule_fiscal</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="m">
                            </div>
                        </div>
                    </form>
                    {{-- Form Supprimer societe--}}
                    <div class="deleteContent">
                        Etes-vous sur de vouloir  supprimer <span class="libelle"></span>?
                        <span class="hidden id"></span>
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>

                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon"></span>Fermer
                    </button>

                </div>
            </div>
        </div>
    </div>

@endsection

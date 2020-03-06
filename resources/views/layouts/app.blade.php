<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Societe de transport</title>




</head>
<body>
<nav class="navbar navbar-default navbar-ststic-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('societeT.index')}}"></a>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
    {{-- ajax Form Add societe--}}
    $(document).on('click','.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add societe');
    });

    $("#add").click(function() {
        $.ajax({
            type: 'POST',
            url: 'addSocieteT',
            data: {
                '_token': $('input[name=_token]').val(),
                'libelle': $('input[name=libelle]').val(),
                'adresse': $('input[name=adresse]').val(),
                'email': $('input[name=email]').val(),
                'tel': $('input[name=tel]').val(),
                'fax': $('input[name=fax]').val(),
                'code_postal': $('input[name=code_postal]').val(),
                'registre_commercial': $('input[name=registre_commercial]').val(),
                'matricule_fiscal': $('input[name=matricule_fiscal]').val(),
                success: function(response) {

                    swal('Deleted!', response.message, response.status);
                },


                success: function(data){
                    if ((data.errors)) {
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors.libelle);
                        $('.error').text(data.errors.adresse);
                        $('.error').text(data.errors.email);
                        $('.error').text(data.errors.tel);
                        $('.error').text(data.errors.fax);
                        $('.error').text(data.errors.code_postal);
                        $('.error').text(data.errors.registre_commercial);
                        $('.error').text(data.errors.matricule_fiscal);

                    }
                    else {
                        $('.error').remove();
                        $('#table').append("<tr class='societeT" + data.id + "'>"+
                            "<td>" + data.id + "</td>"+
                            "<td>" + data.libelle + "</td>"+
                            "<td>" + data.adresse + "</td>"+
                            "<td>" + data.email + "</td>"+
                            "<td>" + data.tel + "</td>"+
                            "<td>" + data.fax + "</td>"+
                            "<td>" + data.code_postal + "</td>"+
                            "<td>" + data.registre_commercial + "</td>"+
                            "<td>" + data.matricule_fiscal + "</td>"+
                            "<td>" + data.created_at + "</td>"+
                            "<td> " +
                            "<button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-libelle='" + data.libelle
                            + "'  data-adresse='" + data.adresse + "'  data-email='" + data.email + "' data-tel='" + data.tel +
                            "' data-fax='" + data.fax + "' data-code_postal='" + data.code_postal + "' data-registre_commercial='"
                            + data.registre_commercial + "' data-matricule_fiscal='" + data.matricule_fiscal + "' ><span class='fa fa-eye'></span>" +
                            "</button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "'  data-libelle='" + data.libelle + "' data-adresse='" + data.adresse
                            + "' data-email='" + data.email + "' data-tel='" + data.tel + "' data-fax='" + data.fax +
                            "' data-code_postal='" + data.code_postal + "' data-registre_commercial='"
                            + data.registre_commercial + "' data-matricule_fiscal='" + data.matricule_fiscal + "'>" +
                            "<span class='glyphicon glyphicon-pencil'></span>" +
                            "</button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-libelle='" + data.libelle
                            + "' data-adresse='" + data.adresse + "' data-email='" + data.email + "'  data-tel='" + data.tel
                            + "' data-fax='" + data.fax + "' data-code_postal='" + data.code_postal
                            + "' data-registre_commercial='" + data.registre_commercial + "' data-matricule_fiscal='" + data.matricule_fiscal + "'>" +
                            "<span class='glyphicon glyphicon-trash'></span></button></td>"+
                            "</tr>");
                    }
                },
            });
        $('#libelle').val('');
        $('#adresse').val('');
        $('#email').val('');
        $('#tel').val('');
        $('#fax').val('');
        $('#code_postal').val('');
        $('#registre_commercial').val('');
        $('#matricule_fiscal').val('');


    });


    // function Modifier Societe
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Modifier Societe");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text(' Modifier Societe');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#l').val($(this).data('libelle'));
        $('#a').val($(this).data('adresse'));
        $('#e').val($(this).data('email'));
        $('#t').val($(this).data('tel'));
        $('#f').val($(this).data('fax'));
        $('#c').val($(this).data('code_postal'));
        $('#r').val($(this).data('registre_commercial'));
        $('#m').val($(this).data('matricule_fiscal'));

        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'POST',
            url: 'editSocieteT',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'libelle': $('#l').val(),
                'adresse': $('#a').val(),
                'email': $('#e').val(),
                'tel': $('#t').val(),
                'fax': $('#f').val(),
                'code_postal': $('#c').val(),
                'registre_commercial': $('#r').val(),
                'matricule_fiscal': $('#m').val()

            },
            success: function(data) {
                $('.societeT' + data.id).replaceWith(" "+
                    "<tr class='societeT" + data.id + "'>"+
                    "<td>" + data.id + "</td>"+
                    "<td>" + data.libelle + "</td>"+
                    "<td>" + data.adresse + "</td>"+
                    "<td>" + data.email + "</td>"+
                    "<td>" + data.tel + "</td>"+
                    "<td>" + data.fax + "</td>"+
                    "<td>" + data.code_postal + "</td>"+
                    "<td>" + data.registre_commercial + "</td>"+
                    "<td>" + data.matricule_fiscal + "</td>"+
                    "<td>" + data.created_at + "</td>"+
                    "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "'  data-libelle='" + data.libelle + "'  data-adresse='" + data.adresse + "' data-tel='" + data.tel + "' data-fax='" + data.fax + "' data-code_postal='" + data.code_postal + "' data-registre_commercial='" + data.registre_commercial + "' data-matricule_fiscal='" + data.matricule_fiscal + "'><span class='fa fa-eye'>" +
                    "</span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-libelle='" + data.libelle + "' data-adresse='" + data.adresse + "' data-tel='" + data.tel + "' data-fax='" + data.fax + "' data-code_postal='" + data.code_postal + "' data-registre_commercial='" + data.registre_commercial + "'  data-matricule_fiscal='" + data.matricule_fiscal + "'>" +
                    "<span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm'  data-id='" + data.id + "' data-libelle='" + data.libelle + "' data-adresse='" + data.adresse + "' data-tel='" + data.tel + "' data-fax='" + data.fax + "' data-code_postal='" + data.code_postal + "' data-registre_commercial='" + data.registre_commercial + "'  data-matricule_fiscal='" + data.matricule_fiscal + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
                    "</tr>");
            }
        });
    });


    // form Delete function
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Supprimer");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Supprimer');
        $('.id').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.title').html($(this).data('title'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.delete', function(){
        $.ajax({
            type: 'POST',
            url: 'deleteSocieteT',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').text()
            },
            success: function(data){
                $('.societeT' + $('.id').text()).remove();
            }
        });
    });

    // Show function
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#id').text($(this).data('id'));
        $('#lb').text($(this).data('libelle'));
        $('#ar').text($(this).data('adresse'));
        $('#ea').text($(this).data('email'));
        $('#tl').text($(this).data('tel'));
        $('#fx').text($(this).data('fax'));
        $('#cd').text($(this).data('code_postal'));
        $('#rg').text($(this).data('registre_commercial'));
        $('#mt').text($(this).data('matricule_fiscal'));

        $('.modal-title').text('Show societe');
    });

</script>

</body>
</html>

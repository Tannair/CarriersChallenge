function getFuncs() {
    $.get('api/allFuncs')
        .done(function (response) {

            var data = [];

            var sexo = '';

            $.each(response, function (i ,d) {
                sexo = 'Não Informado';
                if (d.sexo != null) {
                    sexo = d.sexo == 'M' ? 'Masculino' : 'Feminino';
                }

                data.push([
                    d.nome,
                    d.sobrenome,
                    d.idade,
                    sexo,
                    " <button  data-toggle='modal' data-target='#modalEditaFunc' class='btn btn-sm btn-edit text-info pull-left'\n" +
                    "      title='Editar Funcionario' data-id='" + d.id + "'>\n" +
                    "                                <span class='fa fa-edit'/>\n" +
                    "          </button>  " +
                    "<button class='btn btn-sm btn-trash' title='Excluir Funcionario' data-toggle='modal' data-target='#exclusao' data-id='" + d.id + "'  data-nome='" + d.nome + "'>\n" +
                    "                 <span class='fa fa-trash'/> </button>",
                ])
            });

            var table = $('#tblFuncionarios');

            if ( $.fn.DataTable.isDataTable( '#tblFuncionarios' )) {
                table.dataTable().fnClearTable();
                table.dataTable().fnDestroy();
            }

            table.DataTable({
                data: data,
            });

            $('.tab1-loading').hide();

        })
        .fail(function () {
            console.log('fail');
        });

}

function saveFunc(action) {
    var data = $("#form" + action).serializeArray();

    console.log(data);

    var msg = action == 'CadastroFunc' ? 'Cadastrado' : 'Editado';

    var type = action == 'CadastroFunc' ? 'POST' : 'PUT';
    var url = action == 'CadastroFunc' ? 'api/saveFunc' : 'api/editFunc';

    $.ajax({
        type: type,
        url: url,
        data: data,
        beforeSend: function () {
            $("#form" + action).hide();
            $(".loadModal").show();
        },
        success: function (data) {
            console.log(data);
            if (!data) {
                $("#msgStoreFunc").html('Nao foi possivel cadastrar').show();
                return false;
            }

            getFuncs();

            $(".alert-success i").append("   " + msg + " com Sucesso");
            $(".alert-success").show();
            $(".loadModal").hide();
            $("#modal" + action).modal('hide');

            if (action == 'CadastroFunc') {
                $('#form' +action+' input').each(function() {
                    $(this).val('');
                });
            }


            window.setTimeout(function() {
                $(".alert-success i").html("");
                $(".alert-success").hide();

            }, 2000);


            $("#form" + action).show();
        },
    });
}

function relatorio (val, option) {
    $('#cardResultReport').find('p').html('');

    $('#cardResultReport').find('h4').html('');

    $.ajax({
        type: 'GET',
        url: 'api/relatorio/' + val,
        beforeSend: function () {
            $(".loadModal").show();
        },
        success: function (data) {

            if (val != 'IMN' && val != 'IMV') {
                $('#cardResultReport').find('p').html(data);
                $('#cardResultReport').find('h4').html(option);

            } else {
                $('#cardResultReport').find('h4').html(option);
                $('#cardResultReport').find('h4').append('<br> <b>Idade: </b>' + data.idade);
                $('#cardResultReport').find('h4').append('<br> <b>Nome: </b>' + data.nome);
            }

            $(".loadModal").hide();
            $('#cardResultReport').show();
        },
    });
}



function excluirFuncionario(idFunc)
{
    var data = {};

    data = {
        idFunc: idFunc,
    };


    $.ajax({
        type: 'DELETE',
        url: 'api/deleteFunc',
        data: data,
        beforeSend: function () {
            $(".loadModal").show();
        },
        success: function (data) {
            if (!data) {
                alert('Nao foi possivel cadastrar');
                return false;
            }

            getFuncs();

            $("#exclusao").modal('hide');

            $(".alert-success i").append("   Excluído com Sucesso");
            $(".alert-success").show();

            window.setTimeout(function() {
                $(".alert-success i").html("");
                $(".alert-success").hide();

            }, 2000);
        },
    });
}

/* Controle dos modais */


$("#modalEditaFunc").on('show.bs.modal', function (e) {
    let id = $(e.relatedTarget).attr('data-id');

    let form = $(this).find('form');

    $.ajax({
        type: 'GET',
        url: 'api/oneFunc/' + id,
        beforeSend: function () {
            $(".loadModal").show();
        },
        success: function (data) {

            $.each(data, function (campo, value) {
                form.find('input').each(function(){

                    var type = $(this).prop('type');

                    if ($(this).attr('name') == campo && type != 'radio') {
                        $(this).val(value);
                    }

                    if (type == 'radio' && $(this).val() == value) {
                        $(this).prop('checked', true);
                    } else if (type == 'radio') {
                        $(this).prop('checked', false);
                    }

                });
            });

            $(".loadModal").hide();
        },
    });

});



$('#exclusao').on('show.bs.modal', function (e) {
    let id = $(e.relatedTarget).attr('data-id');
    let nome = $(e.relatedTarget).attr('data-nome');

    $(this).find('p').text(`Tem certeza que deseja excluir o(a) funcionario(a) ${nome} ?`);
    $(this).find('#idFuncionario').attr('value', `${id}`);
});
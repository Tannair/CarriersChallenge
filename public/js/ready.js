$(document).ready(function () {
    /* Imports  */

    var funcionarios = document.createElement('script');
    funcionarios.src = '/js/funcionarios.js';
    document.head.appendChild(funcionarios);


    $(window).on('load', function () {
        getFuncs();
    });

    $(function () {
        $("#idFuncionario").click(function () {
            excluirFuncionario($(this).val());
        });

        $("#selectTiposRelatorio").change(function () {
            relatorio($(this).val(), $("#selectTiposRelatorio :selected").text());

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.extend( true, $.fn.dataTable.defaults, {
            "language": {
                "paginate": {
                    "previous": 'Próximo',
                    "next": 'Anterior',
                },
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "zeroRecords": "Nenhum registro encontrado.",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sSearch": "Pesquisar: ",
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            "columnDefs": [
                {
                    "width": "10%",
                    "targets": 4
                },
                {
                    "orderable": false,
                    "targets": 4
                }
            ],
            "responsive": true,
            "dom": "<'row'<'sm-4 pull-left'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7 text-right'p>>",
        });
    });
});




















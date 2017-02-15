@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form class="form-horizontal" id='form_categoria'>
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Categorias</div>

                <div class="panel-body">
                <!-- <input type="hidden" name="_token" value="{{{ csrf_token() }}}"> -->

                    <table class="table table-responsive table-hover table-striped display compact" id="grid">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Categoria</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <div class="panel-footer">
                        <div class="btn-group btn-group-justified" role='group'>
                            <div class="btn-group btn-group-lg">
                                <a href="/home" class="btn btn-default">
                                    <span class="glyphicon glyphicon-home"></span> Home
                                </a>
                            </div>
                            <div class="btn-group btn-group-lg">
                                <a href="/categorias/new" class="btn  btn-success">
                                    <span class="glyphicon glyphicon-save"></span> Adicionar
                                </a>
                            </div>    
                        </div>
                        <div class="col-sm-12" id='mensagem'></div>
                    </div>
                </div>
        </form>
    </div>
    <div class="col-sm-12" id='mensagem'></div>
</div>
<script>
    $.ajax({
        url: '/categorias/',
        type: 'get',
        contentType: 'application/json;charset=utf-8',
        success: function (data) {
            var lista = [];
            for (var i = 0; i < data.length; i++) {
                lista[i] = [data[i].id, data[i].nome];
            }
            $('#grid').dataTable({
                data: lista,
                language: {
                    lengthMenu: "Exibir _MENU_ registros por página",
                    zeroRecords: "Nada encontrado - desculpe",
                    info: "Mostrando a página _PAGE_ de _PAGES_",
                    infoEmpty: "Nenhum registro disponível",
                    infoFiltered: "(Filtrada de _MAX_ registros totais)",
                    search: "Buscar",
                    paginate: {
                        next: "Próxima",
                        previous: "Anterior"
                    }
                },
                columnDefs: [{
                        targets: -1,
                        data: null,
                        searchable: false,
                        orderable: false,
                        render: function (data, type, row) {
                            var btnEdit = '<a href="/categorias/' + row[0] + '/edit" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>';
                            var nbsp = '&nbsp;';
                            var btnRemove = '<a href="javascript:func()" onclick="apagar('+row[0]+');" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>';
                            return btnEdit + nbsp + btnRemove;
                        }
                    }]

            });
        },
        error: function (data) {
            var data = data.responseText;
            $('#mensagem').html(mensagem_alert(data, 'danger'));
        }
    });
    function apagar(id) {
        var resp = confirm("Deseja excluir esta categoria?");
        if (resp == true) {
            $.ajax({
                url: '/categorias/'+id,
                type: 'delete',
                contentType: 'application/json;charset=utf-8',
                success: function (data) {
                    $('#mensagem').html(mensagem_alert(data.message, 'success'));
                    location.reload();
                },
                error: function (data) {
                    var data = data.responseText;
                    $('#mensagem').html(mensagem_alert(data, 'danger'));
                }
            });
        }
    }
</script>
@endsection
@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form class="form-horizontal" id='form_categoria'>
            <div class="panel panel-default">
                <div class="panel-heading">Formulário Categoria</div>

                <div class="panel-body">
                    <!-- <input type="hidden" name="_token" value="{{{ csrf_token() }}}"> -->
                    <div class="form-group">
                        <label for="inputNome" class="col-sm-2 control-label">Nome: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome" value="{{old('nome')}}">
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="btn-group btn-group-justified" role='group'>
                        <div class="btn-group btn-group-lg">
                            <a href="/categorias/list" class="btn btn-default">
                                <span class="glyphicon glyphicon-th-list"></span> Lista
                            </a>
                        </div>
                        <div class="btn-group btn-group-lg">
                            <button type="reset" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Limpar
                            </button>
                        </div>
                        <div class="btn-group btn-group-lg">
                            <button type="submit" class="btn  btn-success" id='btn_salvar'>
                                <span class="glyphicon glyphicon-save"></span> Salvar
                            </button>
                        </div>    
                    </div>
                    <div class="col-sm-12" id='mensagem'></div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var url = location.href;
    var query = url.split("/");
    var id = query[4];
    var funcao = query[5];

    if (funcao == "edit") {
        $.ajax({
            url: '/categorias/' + id,
            type: 'get',
            contentType: 'application/json;charset=utf-8',
            success: function (data) {
                $('#nome').val(data.nome);
            },
            error: function (data) {
                var data = data.responseText;
                $('#mensagem').html(mensagem_alert(data, 'danger'));
            }
        });
    }

    $('#form_categoria').validate({
        rules: {
            nome: "required"
        },
        messages: {
            nome: {
                required: "Preencha o campo"
            }
        }
    });

    $('#btn_salvar').click(function (event) {
        if ($('#form_categoria').valid()) {
            event.preventDefault();
            var data = serialize('#form_categoria');
            if (funcao == "edit") {
                $.ajax({
                    url: '/categorias/'+id+'/edit',
                    type: 'put',
                    contentType: 'application/json;charset=utf-8',
                    data: data,
                    success: function (data) {
                        $('#mensagem').html(mensagem_alert('Categoria Atualizada com sucesso!', 'success'));
                        $('#btn_salvar').attr("disabled", "disabled");
                        $('#nome').attr("disabled", "disabled");
                    },
                    error: function (data) {
                        var data = data.responseText;
                        $('#mensagem').html(mensagem_alert(data, 'danger'));
                    }
                });
            } else {
                $.ajax({
                    url: '/categorias/',
                    type: 'post',
                    contentType: 'application/json;charset=utf-8',
                    data: data,
                    success: function (data) {
                        $('#mensagem').html(mensagem_alert('Categoria criada com sucesso!', 'success'));
                    },
                    error: function (data) {
                        var data = data.responseText;
                        $('#mensagem').html(mensagem_alert(data, 'danger'));
                    }
                });
            }
        }
    });
</script>
@endsection
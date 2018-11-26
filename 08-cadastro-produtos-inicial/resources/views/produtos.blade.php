@extends('layout.app', ["current" => "produtos" ])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>

                <table class="table table-ordered table-hover" id="tabela-produtos">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome do produto</th>
                        <th>quantidade</th>
                        <th>preço</th>
                        <th>departamento</th>
                        <th>ações</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                    </div>
        <div class="card-footer">
            <a href="#" class="btn btn-sm btn-primary" role="button"  onclick="novoProduto();">Nova produto</a>
        </div>
    <div class="modal" tabindex="-1" role="dialog" id="CadastroProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h5 class="modal-title">

                        </h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="nome" class="control-label">Nome do produto</label>
                            <div class="input-group">
                                <input type="text" name="nome" placeholder="nome do produto" class="form-control" id="nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantidade" class="control-label">quantidade do produto</label>
                            <div class="input-group">
                                <input type="text" name="quantidade" placeholder="quantidade do produto" class="form-control" id="quantidade">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="preco" class="control-label">preço do produto</label>
                            <div class="input-group">
                                <input type="text" name="preco" placeholder="preço do produto" class="form-control" id="preco">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departamento" class="control-label">departamento do produto</label>
                            <div class="input-group">
                                <select class="form-control" id="departamento">

                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                        <button class="btn btn-danger" type="cancel" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
            <script type="text/javascript">
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : "{{ csrf_token() }}"
                    }
                });
                function novoProduto() {
                    $('#id').val('');
                    $('#preco').val('');
                    $('#nome').val('');
                    $('#quantidade').val('');
                    $('#departamento').val('');
                    $('#CadastroProdutos').modal('show')
                }
                function CarregarCategorias() {
                    $.getJSON('/api/categorias' , function (data) {
                        console.log(data);
                        for(i=0;i<data.length;i++){
                          opcao = '<option value="' + data[i].id + '">' + data[i].nome +                                           '</option>';
                $('#departamento').append(opcao);
                        }
                    });
                }

                
                function montarLinha(p) {
                    var linha = "<tr>" +
                        "<td>" + p.id + "</td>" +
                        "<td>" + p.nome + "</td>" +
                        "<td>" + p.preco + "</td>" +
                        "<td>" + p.estoque + "</td>" +
                        "<td>" + p.categoria_id + "</td>"+
                        "<td>" + '<button class="btn btn-sm btn-primary" onclick="editar('+ p.id+');">Editar</button>'
                        + '<button class="btn btn-sm btn-danger" onclick="deletar('+p.id+')">Deletar</button>'+"</td>"+
                        "</tr>";
                    return linha;
                }
                
                function carregarProdutos() {
                    $.getJSON('/api/produtos', function (produtos) {
                        for(i=0;i<produtos.length; i++){
                            linha = montarLinha(produtos[i]);
                            $('#tabela-produtos>tbody').append(linha);

                        }
                    })
                }
                
                function criarProdutos() {
                    prod = {
                        nome: $('#nome').val(),
                        quantidade: $('#quantidade').val(),
                        preco: $('#preco').val(),
                        departamento: $('#departamento').val()
                    };
                    $.post("/api/produtos", prod, function (data) {
                        produto = JSON.parse(data);
                        linha = montarLinha(prod);
                        $('#tabela-produtos>tbody').append(linha);
                    });
                }
                function salvarProduto() {
                    prod = {
                        id : $('#id').val(),
                        nome: $('#nome').val(),
                        quantidade: $('#quantidade').val(),
                        preco: $('#preco').val(),
                        departamento: $('#departamento').val()
                    };
                    $.ajax({
                        type: "put",
                        url: "/api/produtos/"+prod.id,
                        context:this,
                        success:function () {
                            alert('teste')
                        },
                        error:function () {
                            alert('Não editado');
                        }
                    });
                }

                $('#formProduto').submit(function () {
                    salvarProduto();

                });
                function editar(id) {
                    $.getJSON('/api/produtos/'+id, function (data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#preco').val(data.preco);
                        $('#nome').val(data.nome);
                        $('#quantidade').val(data.estoque);
                        $('#departamento').val(data.categoria_id);
                        $('#CadastroProdutos').modal('show')
                    })
                }

                function deletar(id) {
                    $.ajax({
                        type:"delete",
                        url:"/api/produtos/" + id,
                        context:this,
                        success:function(){

                            linhas = $("#tabela-produtos>tbody>tr");
                             e = linhas.filter(function (i, elemento) {
                                return elemento.cells[0].textContent == id;
                            });
                             if (e)
                                 e.remove();

                      },
                        error: function (error) {
                            console.log(error)
                        }

                    })
                }
                $(function () {
                    CarregarCategorias();
                    carregarProdutos();
                });
            </script>
@endsection
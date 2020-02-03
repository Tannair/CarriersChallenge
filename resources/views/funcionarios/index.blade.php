@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Funcionários</h1>
                    </div>
                    <!-- /.col -->
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header" style="min-height: 50px;">
                                <div class="alert alert-success" role="alert">
                                    <i class='fa fa-check-circle text-green'></i>
                                </div>
                                <div class="card-tools">
                                    <h3>
                                        <button class="btn btn-tool" data-toggle="modal" data-target="#modalFiltrarFuncs" title="Filtro Avancado">
                                            <i class="fas fa-filter"></i>
                                        </button>
                                        <button class="btn btn-tool" data-toggle="modal" data-target="#modalCadastroFunc" title="Adicionar Funcionario">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover" id="tblFuncionarios">
                                            <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Sobrenome</th>
                                                <th>Idade</th>
                                                <th>Sexo</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.Left col -->
                </div>
                <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('funcionarios.modais.cadastro')
    @include('funcionarios.modais.editar')
    @include('funcionarios.modais.exclusao')
    @include('funcionarios.modais.filtros')
@endsection

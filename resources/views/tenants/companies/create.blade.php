@extends('adminlte::page')

@section('content')

<div class="content-header">

</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h1 class="card-title">
                    <strong>
                    Cadastro de Empresa
                    </strong>
                </h1>
            </div>

            <div class="card-body">

                <form class="form" method="POST" action="{{ url('tenants/company/store') }}">

                {{csrf_field()}}

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Empresa</label>
                            <input type="text" name="name" placeholder="Empresa" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Domínio</label>
                            <input type="text" name="domain" placeholder="www" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Database</label>
                            <input type="text" name="db_database" placeholder="Banco de dados" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Hostname</label>
                            <input type="text" name="db_hostname" placeholder="Hostname" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Usuário</label>
                            <input type="text" name="db_username" placeholder="Usuário do BD" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="db_password" placeholder="*****" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Deseja criar Database?</label>
                            <input type="checkbox" name="create_database" checked/>
                        </div>
                    </div>
                        
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Salvar</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
@endsection
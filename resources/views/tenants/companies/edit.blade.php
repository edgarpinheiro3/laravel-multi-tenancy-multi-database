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

                <form class="form" method="POST" action="{{url("tenants/company/edit/$company->id")}}">

                {{csrf_field()}}

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Empresa</label>
                            <input type="text" name="name" placeholder="Empresa" class="form-control" value="{{$company->name}}" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Domínio</label>
                            <input type="text" name="domain" placeholder="www" class="form-control" value="{{$company->domain}}" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Database</label>
                            <input type="text" name="db_database" placeholder="Banco de dados" class="form-control" value="{{$company->db_database}}" readonly />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Hostname</label>
                            <input type="text" name="db_hostname" placeholder="Hostname" class="form-control" value="{{$company->db_hostname}}" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Usuário</label>
                            <input type="text" name="db_username" placeholder="Usuário do BD" class="form-control" value="{{$company->db_username}}" readonly />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="db_password" placeholder="*****" class="form-control" value="{{$company->db_password}}" readonly/>
                        </div>
                    </div>
                        
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Atualizar</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
@endsection
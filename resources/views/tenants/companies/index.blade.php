@extends('adminlte::page')

@section('content')
<div class="content-header">
    <div class="col-md-1">
        <a href="{{ url('tenants/company/create') }}" title="Nova" class="btn btn-block btn-info btn-lg">Nova</a>
    </div>
    <div class="col-md-3">
        <form class="form" method="POST" action="{{url("tenants/company/search")}}" style="margin: 15px 0 15px 0;">

            {{csrf_field()}}

            <label>Pesquisar: </label>

            <div class="input-group" >
                <input type="text" name="pesquisar" placeholder="Nome da Empresa" class="form-control" style="padding:25px 15px;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <button class="btn" type="submit"><i class="fa fa-search"></i> </button>
                    </div>
                </div>
            </div>            

        </form>
    </div>
    <div class="col-md-12">
         <h1 class="text-dark">Listagem de Empresas</h1>
    </div>
</div>
<div class="col-md-12">
    <table class="table table-bordered bg-light">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Domínio</th>
                <th>Database</th>
                <th>Hostname</th>
                <th>Username</th>
                <th>Password</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
        @forelse( $companies as $company)
            <tr>
                <td>{{$company->name}}</td>
                <td>{{$company->domain}}</td>
                <td>{{$company->db_database}}</td>
                <td>{{$company->db_hostname}}</td>
                <td>{{$company->db_username}}</td>
                <td>{{$company->db_password}}</td>

                    <td>
                    <a href="{{url("tenants/company/edit/$company->domain")}}" title="Editar" class="btn btn-block btn-warning btn-sm">Editar</a>
                    </td>
                    <td>
                    <a href="{{url("tenants/company/delete/$company->id")}}" title="Deletar" class="btn btn-block btn-danger btn-sm">Deletar</a>
                    </td>

            </tr>
        @empty
            <tr>
                <td colspan="7">Não Existem Empresas Cadastradas</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    
</div>
@endsection
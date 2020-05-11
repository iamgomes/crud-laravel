@extends('templates.base')

@section('title') Lista de Cliente @endsection

@section('content')

    <div id="line-one">   
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="center"> 
                    <h1><b>Clientes</b></h1>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Painel</a></li>                  
                        <li class="active">Clientes</li>
                    </ol>
                    <br>
                    <a href="{{route('cliente.create')}}" 
                    class="btn btn-default btn-sm pull-right">
                        <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
                    <a href="" 
                    class="btn btn-default btn-sm pull-right">
                        <i class="fa fa-book"></i> Relatório</a>
                    <div id="pesquisa" class="pull-right">
                        <form class="form-group" method="post" 
                            action="#">                                   
                            <input type="text" name="pesquisar" 
                                class="form-control input-sm pull-left" 
                                placeholder="Pesquisar por nome..." required> 
                            <button class="btn btn-default btn-sm pull-right" 
                                    id="color"> 
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </form>
                    </div>
                </div>           
            </div>
            <div class="row">
                <div class="col-md-12">   
                    <br />
                    <h4 id="center"><b>CLIENTES CADASTRADOS ({{$total}})</b></h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th id="center">Código</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Nascimento</th>                
                                    <th id="center">Ações</th>                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $c)
                                <tr>
                                    <td id="center">{{$c->id}}</td>
                                    <td title="Nome">{{$c->nome}}</td>
                                    <td title="Email">{{$c->email}}</td>
                                    <td title="Nascimento">{{$c->nascimento}}</td>
                                    <td id="center">
                                        <a href="{{route('cliente.edit', $c->id)}}" 
                                        data-toggle="tooltip" 
                                        data-placement="top"
                                        title="Alterar"><i class="fa fa-pencil"></i></a>
                                        &nbsp;<form style="display: inline-block;" method="POST" 
                                                    action="{{route('cliente.destroy', $c->id)}}"                                                        
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Excluir" 
                                                    onsubmit="return confirm('Confirma exclusão?')">
                                            {{method_field('DELETE')}}{{ csrf_field() }}                                                
                                            <button type="submit" style="background-color: #fff">
                                                <a><i class="fa fa-trash-o"></i></a>                                                    
                                            </button></form></td>               
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
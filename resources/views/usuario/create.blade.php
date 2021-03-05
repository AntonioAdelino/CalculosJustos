@extends('templates.template')

@section('conteudo')
<div class="jumbotron text-center">
  <h1>Cadastrar Novo Usuário</h1>
</div>

<div class="container">
    @if(isset($errors) && count($errors)>0)
      <div class="text-center alert-danger">
        @foreach($errors->all() as $erro)
          {{$erro}}<br>
        @endforeach
      </div>
    @endif

    @if(isset($usuario))
      <form action name="edit" id="create" method="post" action="{{url('usuario.update')}}">
      @method('PUT')
    @else
      <form action name="create" id="create" method="post" action="{{url('usuario.store')}}">

    @endif  
    
      @csrf
      <div class="form-group">
        <label class="form-control-label col-sm-2" for="nome" >Nome:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nome" name= "nome" placeholder="Digite o nome" value="{{$usuario->name ?? ''}}">
        </div>
      </div>
      
      <div class="form-group t-10">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name= "email" placeholder="Digite o email" value="{{$usuario->email ?? ''}}">
        </div>
      </div>
      
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Senha:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="senha" name= "senha" placeholder="Digite a senha" value="{{$usuario->password ?? ''}}">
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
      </div>
    </form>
</div>


@endsection
@extends('templates.template')

@section('conteudo')
  <div class="jumbotron text-center">
    <h1>Usuários</h1>
  </div>

  <div class="container">  
    @csrf    
    <!-- Tabela com os usuários -->      
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Identificador</th>
          <th>Nome</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
      @foreach($usuarios as $usuario)
          <tr>
              <th scope="row">{{$usuario->id}}</th>
              <td>{{$usuario->name}}</td>
              <td>{{$usuario->email}}</td>
              <td>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-toggle="modal" data-target="#excluirPopUp" data-id={{$usuario->id}}>Excluir</button>
              </td>
              <td>
                <a href="{{url('usuario/'.$usuario->id.'/edit')}}" style="text-decoration:none">
                  <button type="button" class="btn btn-primary">Editar</button>
                </a>
              </tr>
      @endforeach
      </tbody>
    </table>
  </div>

  <br>

  <div class="container">
      <a href="{{url('usuario/create')}}" style="text-decoration:none">
      <button type="button" class="btn btn-success btn-block">Novo Usuário</button>
      </a>
  </div>

  <!-- Pop-up para confirmação de exclusão -->
  <div class="modal fade" id="excluirPopUp" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Excluir usuário</h4>
          </div>
          <div class="modal-body">
            <p>Tem certeza que você deseja excluir esse usuário?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a class= "botaoExcluir" style="text-decoration:none">
              <button type="button" class="btn btn-danger">Excluir usuário</button>
            </a>
          </div>
        </div>
    </div>
  </div>

  <!-- Script em JS que passa o rapâmetr para o modal -->
  <script type="text/javascript">
    $('#excluirPopUp').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botão que acionou o modal
      var recipient = button.data('id') // Extrai informação do atributos data-*
      var modal = $(this)
      var url = 'usuario/' + recipient
      modal.find('.botaoExcluir').attr('href', url)   
    })
  </script>

@endsection
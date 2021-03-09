@extends('templates.template')

@section('conteudo')
    <div class="jumbotron text-center">
        <h1>Cálculos Justos</h1>
        <h4>Sistema voltado a apuração de valores inerentes às contas do <br>Programa de Formação do Patrimônio do Servidor Público - PASEP.</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="container">
                <form id="form" class="needs-validation">
                    <table id="calculos" class="table table-striped">
                        <thead>
                            <th>Extrato</th>
                            <th>Data</th>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Observação</th>
                            <th>Valor</th>
                            <th>Saldo</th>
                        </thead>
                        <tbody id="corpo-tabela">
                            <tr id="linha-0" class="draggable" draggable="true">
                                <td><input type="text" name="extrato" class="form-control" required></td>
                                <td><input type="text" id="data-0" name="data" class="form-control data" required></td>
                                <td>
                                    <select id="codigos" name="codigos" class="form-control">
                                            @forelse($codigos as $codigo)
                                                <option>{{ $codigo }}</option>
                                            @empty
                                                <option>ERRO NA SOLICITAÇÃO</option>
                                            @endforelse
                                    </select>
                                </td>
                                <td><span>Aqui vai a descrição</span></td>
                                <td><input type="text" id="obsercavao-0" name="valor" class="form-control obsercavao"></td>
                                <td><input type="text" id="dinheiro-0" name="valor" class="form-control dinheiro" required></td>
                                <td><span>Aqui vai o saldo</span></td>
                                <td style="text-align: center"><button type="button" onclick="adicionarLinha(this)">+</button></td>
                                <td style="text-align: center"><button type="button" onclick="apagarLinha(this)">-</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit">Calcular</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/tela-inicial.js') }}"  type="text/javascript"></script>
@endsection
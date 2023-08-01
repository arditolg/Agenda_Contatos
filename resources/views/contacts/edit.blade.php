@extends('layouts.app')

@section('content')
    <div>
        <h1>Editar Contato</h1>
        <form action="{{ route('contacts.update', $contact->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" class="form-control" value="{{ $contact->cep }}" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="">Selecione um estado</option>
                    @foreach ($estados as $sigla => $estado)
                        <option value="{{ $sigla }}"{{ $contact->estado === $sigla ? ' selected' : '' }}>{{ $estado }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="form-control" value="{{ $contact->cidade }}" required>
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" class="form-control" value="{{ $contact->bairro }}" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="form-control" value="{{ $contact->endereco }}" required>
            </div>
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="number" name="numero" id="numero" class="form-control" value="{{ $contact->numero }}" required>
            </div>
            <div class="form-group">
                <label for="nome_de_contato">Nome de Contato</label>
                <input type="text" name="nome_de_contato" id="nome_de_contato" class="form-control" value="{{ $contact->nome_de_contato }}" required>
            </div>
            <div class="form-group">
                <label for="email_de_contato">Email de Contato</label>
                <input type="email" name="email_de_contato" id="email_de_contato" class="form-control" value="{{ $contact->email_de_contato }}" required>
            </div>
            <div class="form-group">
                <label for="telefone_de_contato">Telefone de Contato</label>
                <input type="text" name="telefone_de_contato" id="telefone_de_contato" class="form-control" value="{{ $contact->telefone_de_contato }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            function fetchAddressData(cep) {
                $.ajax({
                    url: 'https://cep.awesomeapi.com.br/json/' + cep,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#estado').val(data.state);
                        $('#cidade').val(data.city);
                        $('#bairro').val(data.district);
                        $('#endereco').val(data.address);
                    },
                    error: function () {
                        alert('Erro ao obter os dados do CEP.');
                    }
                });
            }

            $('#cep').on('blur', function () {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep.length === 8) {
                    fetchAddressData(cep);
                }
            });
        });
    </script>
@endsection

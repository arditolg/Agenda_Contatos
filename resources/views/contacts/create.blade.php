@extends('layouts.app')

@section('content')
    <div>
        <h1>Novo Contato</h1>
        <form action="{{ route('contacts.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" class="form-control @error('cep') is-invalid @enderror" required value="{{ old('cep') }}">
                @error('cep')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" required>
                    <option value="">Selecione um estado</option>
                    @foreach ($estados as $sigla => $estado)
                        <option value="{{ $sigla }}"{{ old('estado') === $sigla ? ' selected' : '' }}>{{ $estado }}</option>
                    @endforeach
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="form-control @error('cidade') is-invalid @enderror" required value="{{ old('cidade') }}">
                @error('cidade')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" class="form-control @error('bairro') is-invalid @enderror" required value="{{ old('bairro') }}">
                @error('bairro')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="form-control @error('endereco') is-invalid @enderror" required value="{{ old('endereco') }}">
                @error('endereco')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="number" name="numero" id="numero" class="form-control @error('numero') is-invalid @enderror" required value="{{ old('numero') }}">
                @error('numero')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nome_de_contato">Nome de Contato</label>
                <input type="text" name="nome_de_contato" id="nome_de_contato" class="form-control @error('nome_de_contato') is-invalid @enderror" required value="{{ old('nome_de_contato') }}">
                @error('nome_de_contato')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email_de_contato">Email de Contato</label>
                <input type="email" name="email_de_contato" id="email_de_contato" class="form-control @error('email_de_contato') is-invalid @enderror" required value="{{ old('email_de_contato') }}">
                @error('email_de_contato')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="telefone_de_contato">Telefone de Contato</label>
                <input type="text" name="telefone_de_contato" id="telefone_de_contato" class="form-control @error('telefone_de_contato') is-invalid @enderror" required value="{{ old('telefone_de_contato') }}">
                @error('telefone_de_contato')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
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

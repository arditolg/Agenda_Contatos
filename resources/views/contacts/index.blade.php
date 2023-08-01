@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
        <h1>Lista de Contatos</h1>
        <a href="{{ route('contacts.createEstado') }}" class="btn btn-primary mb-2">Novo Contato</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome de Contato</th>
                    <th>Email de Contato</th>
                    <th>Telefone de Contato</th>
                    <th>CEP</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Endereço</th>
                    <th>Número</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                <tr>
                        <td>{{ $contact->nome_de_contato }}</td>
                        <td>{{ $contact->email_de_contato }}</td>
                        <td>{{ $contact->telefone_de_contato }}</td>
                        <td>{{ $contact->cep }}</td>
                        <td>{{ $contact->estado }}</td>
                        <td>{{ $contact->cidade }}</td>
                        <td>{{ $contact->bairro }}</td>
                        <td>{{ $contact->endereco }}</td>
                        <td>{{ $contact->numero }}</td>
                        <td>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhum contato encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

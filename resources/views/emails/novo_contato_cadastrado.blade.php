<!DOCTYPE html>
<html>
<head>
    <title>Novo Contato Cadastrado</title>
</head>
<body>
    <h1>Novo Contato Cadastrado</h1>
    <p>Um novo contato foi cadastrado com os seguintes detalhes:</p>
    <ul>
        <li>CEP: {{ $contact->cep }}</li>
        <li>Estado: {{ $contact->estado }}</li>
        <li>Cidade: {{ $contact->cidade }}</li>
        <li>Bairro: {{ $contact->bairro }}</li>
        <li>Endereco: {{ $contact->endereco }}</li>
        <li>Numero: {{ $contact->numero }}</li>
        <li>Nome do Contato: {{ $contact->nome_de_contato }}</li>
        <li>Email do Contato: {{ $contact->email_de_contato }}</li>
        <li>Telefone do Contato: {{ $contact->telefone_de_contato }}</li>
    </ul>
</body>
</html>

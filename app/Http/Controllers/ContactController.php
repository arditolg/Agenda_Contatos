<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller  
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cep' => 'required|string|max:10',
            'estado' => 'required|string|max:2',
            'cidade' => 'required|string',
            'bairro' => 'required|string',
            'endereco' => 'required|string|max:255',
            'numero' => 'required|integer',
            'nome_de_contato' => 'required|string',
            'email_de_contato' => 'required|email|max:100',
            'telefone_de_contato' => 'required|string|max:20',
        ]);

        Contact::create($data);

        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso!');
    }

    public function edit(Contact $contact)
    {
        $estados = $this->getEstadosBrasileiros();

        return view('contacts.edit', compact('contact', 'estados'));
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'cep' => 'required|string|max:10',
            'estado' => 'required|string|max:2',
            'cidade' => 'required|string',
            'bairro' => 'required|string',
            'endereco' => 'required|string|max:255',
            'numero' => 'required|integer',
            'nome_de_contato' => 'required|string',
            'email_de_contato' => 'required|email|max:100',
            'telefone_de_contato' => 'required|string|max:20',
        ]);

        $contact->update($data);

        return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contato excluído com sucesso!');
    }

    public function createEstado()
    {
    $estados = [
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins',
        'DF' => 'Distrito Federal',
    ];

    return view('contacts.create', compact('estados'));
    }

    public function getEstadosBrasileiros()
{
    $estados = [
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins',
        'DF' => 'Distrito Federal',
    ];

    return $estados;
}
}

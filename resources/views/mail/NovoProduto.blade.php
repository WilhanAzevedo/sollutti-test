@component('mail::panel')
<h1>
    Olá, {{ $loja->nome }}
</h1>

<p>Um novo produto foi adicionado a loja</p>

<h1>Detalhes</h1>

@component('mail::table')

    <table>
        <thead>
            <tr>
                <th></th>
                <th>Dados</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align:center">Nome</td>
                <td style="text-align:center">{{ $produto->nome }}</td>
            </tr>
            <tr>
                <td style="text-align:center">Valor</td>
                <td style="text-align:center">{{ $produto->valor }}</td>
            </tr>
            <tr>
                <td style="text-align:center">Ativo</td>
                <td style="text-align:center">{{ $produto->ativo }}</td>
            </tr>
        </tbody>
    </table>


@endcomponent
@endcomponent


@component('mail::panel')
<h1>
    Olá, {{ $loja->nome }}
</h1>

<p>Um produto foi atualizado</p>

<h1>Detalhes</h1>

@component('mail::table')
<table>
    <thead>
        <tr>
            <th></th>
            <th>Dados antigos</th>
            <th>Dados atualizados</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align:center">Nome</td>
            <td style="text-align:center">{{ $oldProduct->nome }}</td>
            <td style="text-align:center">
                @if ($produto->nome != $oldProduct->nome)
                    <span style="background-color: #e78787;">{{ $produto->nome }}</span>
                @else
                    {{ $produto->nome }}
                @endif
            </td>
        </tr>
        <tr>
            <td style="text-align:center">Valor</td>
            <td style="text-align:center">{{ $oldProduct->valor }}</td>
            <td style="text-align:center">
                @if ($produto->valor != $oldProduct->valor)
                    <span style="background-color: #e78787;">{{ $produto->valor }}</span>
                @else
                    {{ $produto->valor }}
                @endif
            </td>
        </tr>
        <tr>
            <td style="text-align:center">Ativo</td>
            <td style="text-align:center">{{ $oldProduct->ativo }}</td>
            <td style="text-align:center">
                @if ($produto->ativo != $oldProduct->ativo)
                    <span style="background-color: #e78787;">{{ $produto->ativo }}</span>
                @else
                    {{ $produto->ativo }}
                @endif
            </td>
        </tr>
    </tbody>
</table>
@endcomponent
@endcomponent


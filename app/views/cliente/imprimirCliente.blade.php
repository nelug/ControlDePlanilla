<table width="100%">
    <tr>
        <td>
            DPI: {{ $cliente->dpi }}
        </td>
        <td rowspan="6">
            <img src="fotos/{{$cliente->dpi}}.jpg">
        </td>
    </tr>
    <tr>
        <td>
            Nombre: {{ $cliente->nombre }}
        </td>
    </tr>
    <tr>
        <td>
            Apellido: {{ $cliente->apellido }}
        </td>
    </tr>
    <tr>
        <td>
            Direccion: {{ $cliente->direccion }}
        </td>
    </tr>
    <tr>
        <td>
            Direccion Actual: {{ $cliente->direccion_actual }}
        </td>
    </tr>
    <tr>
        <td>
            Telefono: {{ $cliente->telefono }}
        </td>
    </tr>
    <tr>
        <td>
            Deuda: {{ $cliente->saldo }}
        </td>
    </tr>
</table>
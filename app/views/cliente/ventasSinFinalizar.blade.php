<table width="100%" class="table table-theme">
  <thead>
    <tr>
      <th>Total</th>
      <th>Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($ventas as $dt)
    <tr>
      <td>{{$dt->total}}</td>
      <td>
        <button type="button" name="button" onclick="asignarVenta({{$dt->id}}, {{$dt->total}})">Agregar</button>.
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<table class="table" width="100%">
	<thead>
		<tr>
			<th width="70%">
				Descripcion
			</th>
			<th width="30%">
				Cantidad
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Total de clientes:</td>
			<td>{{$data ['totalClientes']}}</td>
		</tr>
		<tr>
			<td>Clientes deudores:</td>
			<td>{{$data ['totalClientesDeudores']}}</td>
		</tr>	
		<tr>
			<td>Clientes deudores mayores a Q1000</td>
			<td>{{$data ['totalClientesDeudoresPasados']}}</td>
		</tr>	
		<tr>
			<td>Total Deuda:</td>
			<td>Q {{$data ['totalDeuda']}}</td>
		</tr>		
	</tbody>
</table>





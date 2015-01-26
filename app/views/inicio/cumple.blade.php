<div class="panel panel-success">
	<div class="panel-heading text-center">
		Cumpleañeros del mes
	</div>
   	<div class="panel-body">
	   	<table class="table table-striped">
			<tr>
				<th>
					Nombre
				</th>
				<th>
					Fecha
				</th>
			</tr>

			@foreach($birthdays as $birth)
				<tr>
					<td> {{$birth->nombre}} </td>
					<td> {{$birth->nacimiento}}</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>
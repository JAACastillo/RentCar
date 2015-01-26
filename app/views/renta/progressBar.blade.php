
<?php
	$pasos = array('Crear solicitud', 'Seleccionar carro', 'Seleccionar Extras', 'Revisar');
?>


<div id="progress-bar">
	<div id="progress-bar-steps">

		@foreach($pasos as $key => $step)
			<?php $key++ ?>
			<div class="progress-bar-step @if($key < $paso) done @endif @if($key == $paso) current @endif">
				<div class="step_number">{{$key}}</div>
				<div class="step_name">{{$step}}</div>
			</div>
		@endforeach
	</div>
	<div class="clear"></div>
</div>				
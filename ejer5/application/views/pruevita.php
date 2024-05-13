<div id="container">
	
	<div id="body">
	<a class="navbar-brand p-4 text-light" style="font-size: 25px;">Banco Grinshow 2024 <i class="fa-solid fa-cat"></i></a>
	
	</div>

	
</div>
<div id="container2">
	<h1 class="navbar-brand p-4 text-light" style="font-size: 25px;">Roles</h1>
</div>
<div id="container3">
	<table style="font-size: 11px;">
		<tr>	
            <th>ID Persona</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>ID Cuenta</th>
            <th>Número de Cuenta</th>
            <th>Saldo</th>
            <th>ID Transacción</th>
            <th>Tipo</th>
            <th>Monto</th>
            <th>Fecha</th>
        </tr>
	
	<?php
		foreach ($personas as $persona){
			echo "<tr>";
			echo "<td>$persona->ID_Persona</td>";
			echo "<td>$persona->Nombre</td>";
			echo "<td>$persona->Apellido</td>";
			foreach ($cuentas as $cuenta) {
				if ($cuenta->ID_Persona == $persona->ID_Persona) { 
					echo "<td> $cuenta->ID_Cuenta </td>";
					echo "<td> $cuenta->NumeroCuenta</td>";
					echo "<td> $cuenta->Saldo</td>";
				foreach ($transacciones as $transaccion) {
					if ($transaccion->ID_Cuenta == $cuenta->ID_Cuenta) { 
						echo "<td>  $transaccion->ID_Transaccion </td>";
						echo "<td>  $transaccion->Tipo</td>";
						echo "<td>  $transaccion->Monto </td>";
						echo "<td>  $transaccion->Fecha </td>";
						
					}
				
			}
			}
			
		}
			
		}
		
	?>
	
</div>

public function index()
	{
        $this->load->model("BDLeonel_model");
        $personas = $this->BDLeonel_model->personas();
        $cuentas = $this->BDLeonel_model->cuentabancarias();
        $transacciones = $this->BDLeonel_model->transacions();
    
        // Pasar los datos a la vista
        $datos = array(
            'personas' => $personas,
            'cuentas' => $cuentas,
            'transacciones' => $transacciones
        );
    
        $this->load->view('view_BDLeonel1', $datos);
	}
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#tract">Montos de Tracto</a></li>
  <li><a data-toggle="tab" href="#generated">Ingresos Generados</a></li>
  <li><a data-toggle="tab" href="#surplus">Superávit</a></li>
</ul>


<div class = "row text-center">
	<div class = "col-xs-12">
		<?php 
			echo "<h1>".$association_name[0]['name']."</h1>";
		?>
		
		<h2 id = "tract_date"></h2>
	</div>
</div>



<div class="tab-content">
  <div id="tract" class="tab-pane fade in active">

<div class="row text-center">
	
	<div class="col-xs-12 col-md-6 col-md-offset-3">
	  <?php
		echo "<label><h4><strong>Elegí el tracto</strong></h4></label>";
   		echo "<select class='form-control' id= 'tracts_id' name = 'type' onchange='getAmounts(0,0,0);'>";



        foreach ($dates as $key => $value) {
        	echo $key;
            echo "<option>".$value['tract']['date']."</option>"."<br>";
        }
        
    	echo "</select>";
    	?>
	</div>	

</div>



<br>
<br>
<div class="row text-center">
	<div class="col-xs-12">
		<h3><strong>Facturas</strong></h3>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Número de Factura</th>
				<th>Detalle</th>
				<th>Proveedor</th>
				<th>Monto</th>
				<th>Encargado</th>
				<th>Aclaraciones</th>
			</tr>
		</thead>

		<tbody>
			<?php
				/**
				$invoices = $data['invoices'];

				$counter = 0;

				foreach ($invoices as $key) {
					echo "<tr>";
						echo "<td>".$counter."</td>";
						echo "<td>".$key['date']."</td>";
						echo "<td>".$key['number']."</td>";
						echo "<td>".$key['detail']."</td>";
						echo "<td>".$key['provider']."</td>";
						echo "<td>".$key['amount']."</td>";
						echo "<td>".$key['attendant']."</td>";
						echo "<td>".$key['clarifications']."</td>";
					echo "</tr>";

					++$counter;
					$total_gastos = $total_gastos + $key['amount'];
				}
			**/
			?>
		</tbody>
	</table>	
</div>

<div class="row">
	<div class="col-xs-12">
		<?php //echo "<strong style='font-size:20px;'>Total: ".$total_gastos."</strong>";?>
	</div>
</div>

<br>
<hr>

<br>
<br>



<div class="row">

	<div class="col-xs-12 col-md-6 text-center">
		<h3>Cuadro de Ingresos</h3>

		<table class="table table-striped">
			<tr>
				<th>Monto de Tracto</th>
				<td id="tract_amount"></td>
			</tr>

			<tr>
				<th>Monto de Ahorro</th>
				<td><?php //echo $monto_ahorro?></td>
			</tr>

			<tr>
				<th>Total</th>
				<td class = "tract_saving_total" ></td>
			</tr>
									
		</table>
	</div>

	<div class="col-xs-12 col-md-6 text-center">
		<h3>Cajas</h3>

		<table class="table table-striped">
			<tr>
				<th>Caja Fuerte</th>
				<td id="big_amount_tract"></td>
			</tr>

			<tr>
				<th>Caja Chica</th>
				<td id="little_amount_tract"></td>
			</tr>

			<tr>
				<th>Total</th>
				<td class="boxes_total_tract"></td>
			</tr>
									
		</table>		
	</div>

</div>

<br>

<div class="row">
	<div class="col-xs-12 text-center">
		<h3>Estado General del Tracto</h3>

		<table class="table table-striped">
			<tr>
				<th>Saldo inicial de cajas</th>
				<td id="tract_initial_amount"></td>
			</tr>

			<tr>
				<th>Ahorro del período anterior</th>
				<td><?php //echo $monto_ahorro ?></td>
			</tr>

			<tr>
				<th>Ingresos del período</th>
				<td class = "tract_saving_total" ></td>
			</tr>
				
			<tr>
				<th><u>Total de ingresos</u></th>
				<td id = "total_income"></td>
			</tr>

			<tr>
				<th>Total de gastos</th>
				<td id="total_spent"></td>
			</tr>

			<tr>
				<th><u>Saldo final</u></th>
				<td id="tract_final_balance"></td>
			</tr>

			<tr>
				<th>Total de cajas</th>
				<td class="boxes_total_tract"></td>
			</tr>

			<tr>
				<th><u>Cuenta</u></th>
				<td id = "tract_count"></td>
			</tr>												
		</table>			
	</div>	
</div>






  </div>



  <!--************************************************ Superavit ********************** -->




  <div id="surplus" class="tab-pane fade">
  	
<div class="row text-center">
	
	<div class="col-xs-12 col-md-6 col-md-offset-3">
	  <?php
		echo "<label><h4><strong>Elegí el tracto</strong></h4></label>";
   		echo "<select class='form-control' id= 'tracts_id' name = 'type' onchange='getAmounts(2,2,2);'>";



        foreach ($dates as $key => $value) {
        	echo $key;
            echo "<option>".$value['tract']['date']."</option>"."<br>";
        }
        
    	echo "</select>";
    	?>
	</div>	

</div>
  	
  	
  	
  	
  	
  	
<br>
<br>
<div class="row text-center">
	<div class="col-xs-12">
		<h3><strong>Facturas</strong></h3>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Número de Factura</th>
				<th>Detalle</th>
				<th>Proveedor</th>
				<th>Monto</th>
				<th>Encargado</th>
				<th>Aclaraciones</th>
			</tr>
		</thead>

		<tbody>
			<?php
				/**
				$invoices = $data['invoices'];

				$counter = 0;

				foreach ($invoices as $key) {
					echo "<tr>";
						echo "<td>".$counter."</td>";
						echo "<td>".$key['date']."</td>";
						echo "<td>".$key['number']."</td>";
						echo "<td>".$key['detail']."</td>";
						echo "<td>".$key['provider']."</td>";
						echo "<td>".$key['amount']."</td>";
						echo "<td>".$key['attendant']."</td>";
						echo "<td>".$key['clarifications']."</td>";
					echo "</tr>";

					++$counter;
					$total_gastos = $total_gastos + $key['amount'];
				}
			**/
			?>
		</tbody>
	</table>	
</div>

<div class="row">
	<div class="col-xs-12">
		<?php //echo "<strong style='font-size:20px;'>Total: ".$total_gastos."</strong>";?>
	</div>
</div>

<br>
<hr>

<br>
<br>



<div class="row">

	<div class="col-xs-12 text-center">
		<h3>Cuadro de Ingresos</h3>

		<table class="table table-striped">
			<tr>
				<th>Monto de Superávit</th>
				<td id="tract_amount"></td>
			</tr>


			<tr>
				<th>Total</th>
				<td class = "tract_saving_total" ></td>
			</tr>
									
		</table>
	</div>


</div>

<br>

<div class="row">
	<div class="col-xs-12 text-center">
		<h3>Estado General del Tracto</h3>

		<table class="table table-striped">

			<tr>
				<th>Monto Asignado</th>
				<td class = "tract_saving_total" ></td>
			</tr>
				

			<tr>
				<th>Total de gastos</th>
				<td id="total_spent"></td>
			</tr>

			<tr>
				<th><u>Saldo final</u></th>
				<td id="final_balance"></td>
			</tr>

		</table>			
	</div>	
</div>
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  </div>
  
  
  <!--************************************************ INGRESOS GENERADOS ********************** -->
  <div id="generated" class="tab-pane fade">
  	
  	
  	<div class="row text-center">
	
	<div class="col-xs-12 col-md-6 col-md-offset-3">
	  <?php
		echo "<label><h4><strong>Elegí el tracto</strong></h4></label>";
   		echo "<select class='form-control' id= 'tracts_id' name = 'type' onchange='getAmounts(1,1,1);'>";



        foreach ($dates as $key => $value) {
        	echo $key;
            echo "<option>".$value['tract']['date']."</option>"."<br>";
        }
        
    	echo "</select>";
    	?>
	</div>	

</div>
  	
  	
  	
  	
  	
  	
<br>
<br>
<div class="row text-center">
	<div class="col-xs-12">
		<h3><strong>Facturas</strong></h3>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Número de Factura</th>
				<th>Detalle</th>
				<th>Proveedor</th>
				<th>Monto</th>
				<th>Encargado</th>
				<th>Aclaraciones</th>
			</tr>
		</thead>

		<tbody>
			<?php
				/**
				$invoices = $data['invoices'];

				$counter = 0;

				foreach ($invoices as $key) {
					echo "<tr>";
						echo "<td>".$counter."</td>";
						echo "<td>".$key['date']."</td>";
						echo "<td>".$key['number']."</td>";
						echo "<td>".$key['detail']."</td>";
						echo "<td>".$key['provider']."</td>";
						echo "<td>".$key['amount']."</td>";
						echo "<td>".$key['attendant']."</td>";
						echo "<td>".$key['clarifications']."</td>";
					echo "</tr>";

					++$counter;
					$total_gastos = $total_gastos + $key['amount'];
				}
			**/
			?>
		</tbody>
	</table>	
</div>

<div class="row">
	<div class="col-xs-12">
		<?php //echo "<strong style='font-size:20px;'>Total: ".$total_gastos."</strong>";?>
	</div>
</div>

<br>
<hr>

<br>
<br>



<div class="row">

	<div class="col-xs-12 col-md-6 text-center">
		<h3>Cuadro de Ingresos</h3>

		<table class="table table-striped">
			<tr>
				<th>Monto de Tracto</th>
				<td id="tract_amount"></td>
			</tr>

			<tr>
				<th>Monto de Ahorro</th>
				<td><?php// echo $monto_ahorro?></td>
			</tr>

			<tr>
				<th>Total</th>
				<td class = "tract_saving_total" ></td>
			</tr>
									
		</table>
	</div>

	<div class="col-xs-12 col-md-6 text-center">
		<h3>Cajas</h3>

		<table class="table table-striped">
			<tr>
				<th>Caja Fuerte</th>
				<td><?php //echo $caja_fuerte?></td>
			</tr>

			<tr>
				<th>Caja Chica</th>
				<td><?php //echo $caja_chica?></td>
			</tr>

			<tr>
				<th>Total</th>
				<td><?php //echo ($caja_chica+$caja_fuerte)?></td>
			</tr>
									
		</table>		
	</div>

</div>

<br>

<div class="row">
	<div class="col-xs-12 text-center">
		<h3>Estado General del Tracto</h3>

		<table class="table table-striped">
			<tr>
				<th>Saldo inicial de cajas</th>
				<td><?php //echo ($caja_fuerte+$caja_chica) ?></td>
			</tr>


			<tr>
				<th>Ingresos del período</th>
				<td class = "tract_saving_total" ></td>
			</tr>
				
			<tr>
				<th><u>Total de ingresos</u></th>
				<td id = "total_income"></td>
			</tr>

			<tr>
				<th>Total de gastos</th>
				<td id="total_spent"></td>
			</tr>

			<tr>
				<th><u>Saldo final</u></th>
				<td id="final_balance"></td>
			</tr>

			<tr>
				<th>Total de cajas</th>
				<td><?php //echo ($caja_chica+$caja_fuerte)?></td>
			</tr>

			<tr>
				<th><u>Cuenta de ahorro</u></th>
				<td><?php //echo (($caja_fuerte+$caja_chica+$monto_ahorro+$monto_tracto)-$total_gastos)-($caja_chica+$caja_fuerte)?></td>
			</tr>												
		</table>			
	</div>	
</div>
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  </div>
</div>




<script>
$(document).ready( function ()
    {
        getAmounts(0,0,0);
    });

    function getAmounts(amount_type, box_type, invoice_type)
    {
        var xhttp = new XMLHttpRequest();
    
        xhttp.onreadystatechange = function()
        {
    
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {

            	setValues(xhttp.responseText);
    			/**
                var html = "";
                var obj = JSON.parse(xhttp.responseText);

                for(var key in obj)
                {
                    html += "<option>"+obj[key].name+"</option>";
                }
                
                
                document.getElementById("associations").innerHTML = html;
                
                changeAssociation();
                **/
            }
            else
            {
                if( xhttp.status == 404)
                {
    /**
                   document.getElementById("callback").innerHTML = "Error: Se envió un nombre de sede que no coincide con nuestros registros.";
                   document.getElementById("callback").style.color = "red";
                   setTimeout(function(){document.getElementById("callback").innerHTML = "";}, 9000);
               **/
                } 
    
                
            }          
               
        };
    
    	var path = location.pathname;

    	path = path.replace('detailed_information','getAmounts');

    	path = path+"/"+amount_type+"/"+box_type+"/"+"/"+invoice_type+"/"+document.getElementById("tracts_id").value;

        xhttp.open("GET",path,true);
        //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
       
    }
    
    function setValues(json)
    {
    	object = JSON.parse(json);




    	var total_boxes = 0;
    	var little_amount_tract = 0;
    	var big_amount_tract = 0;

    	var boxes_classes = document.getElementsByClassName("boxes_total_tract");


    	if(object.boxes.length > 0)
    	{
	    	little_amount_tract = object.boxes[0].little_amount;
	    	big_amount_tract = object.boxes[0].big_amount;
	    	total_boxes = (object.boxes[0].little_amount + object.boxes[0].big_amount);   		
    	}

    	boxes_classes[0].innerHTML = total_boxes; 
    	boxes_classes[1].innerHTML = total_boxes;  
    	document.getElementById("little_amount_tract").innerHTML = little_amount_tract;
    	document.getElementById("big_amount_tract").innerHTML = big_amount_tract;


//*******************************END BOXES****************************//

		var tract_amount = 0;
		var tract_saving_total = 0;
		var total_income = 0;
		var total_spent = 0;
		var tract_initial_amount = 0;
		var final_balance = 0;
		var tract_final_balance = 0;
		var tract_count = 0;
		var date = "";

		if(object.amount.length > 0)
		{
			 tract_amount = object.amount[0].amount;
			 tract_saving_total = object.amount[0].amount;
			 total_income = (object.amount[0].initial_amount + object.amount[0].amount); 
			 total_spent = object.amount[0].spent;
			 tract_initial_amount = object.amount[0].initial_amount;
			 tract_final_balance = ((object.amount[0].initial_amount + object.amount[0].amount) - object.amount[0].spent);
			 tract_count = (tract_final_balance - total_boxes);
			 date = "Periodo del tracto: <br><br>"+document.getElementById("tracts_id").value + " - " +object.amount[0].tract.deadline+"<br><br>";			
		}

		amount_classes = document.getElementsByClassName("tract_saving_total");
    	document.getElementById("tract_amount").innerHTML = tract_amount;
    	
    	amount_classes[0].innerHTML =  tract_amount; //TODO:Hacer la suma del monto de ahorro y el de tracto 
    	amount_classes[1].innerHTML =  tract_amount ; //TODO:Hacer la suma del monto de ahorro y el de tracto 
    	
    	document.getElementById("tract_date").innerHTML = date;
    	document.getElementById("total_income").innerHTML = total_income;//TODO: Sumar el saldo incial de cajas y el monto de ahorro
    	document.getElementById("total_spent").innerHTML = total_spent;
    	document.getElementById("tract_initial_amount").innerHTML = tract_initial_amount;
 
    	document.getElementById("tract_final_balance").innerHTML =  tract_final_balance; //TODO: El amount no es el correcto, lo correcto es sumar el ahorro, las cajas y el ingreso de tracto

    	document.getElementById("tract_count").innerHTML = tract_count;
    }
</script>







<br>

<div class="row text-center">
  <div class="col-xs-12">
     <?php echo $this->Html->link('Atrás', '/associations/show_associations/5', ['class'=>'btn btn-primary']);?>
  </div>
</div>
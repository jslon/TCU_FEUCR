<div class="row text-center">
	<div class="col-xs-12">
		<h1>¡Agregá un nuevo <strong>Tracto</strong>!</h1>
	</div>
</div>
<br>

<?php

	echo $this->Form->create($tract, ['id'=>'submit_add_tract']);
		echo "<div class='form-group'>";




	    echo "<div class = 'row'>";

	    echo "<div class = 'col-xs-12'>";
	     echo "<h4>".$this->Form->input('number', ['class' => 'form-control','label'=>'Número de Tracto', 'placeholder'=>'Posibles valores: 1,2,3,4'])."</h4>";
	    echo "</div >";


	    echo "<div class = 'col-xs-12'>";
	     //echo "<h4>".$this->Form->input('date', ['label'=>'Fecha de Inicio', 'type'=>'date', 'value'=>$tract['dates']['date']])."</h4>";
	     echo "<h4><label for='#date'>Fecha de Inicio</label>"."<br><input name='date' type='date' id = 'date' class='form-control date' required value=".$tract['dates']['date'].">"."</h4>";
	    echo "</div >";

	    echo "<div class = 'col-xs-12'>";
	     //echo "<h4>".$this->Form->input('deadline', ['class' => 'form-control','label'=>'Fecha Final', 'type'=>'date', 'value'=>$tract['dates']['deadline']])."</h4>";
	     echo "<h4><label for='#date'>Fecha de Final</label>"."<br><input name='deadline' type='date' id = 'deadline' class='form-control date' required value=".$tract['dates']['deadline'].">"."</h4>";	    
	    echo "</div >";						    					    

	    echo "</div >";


	    echo "<div class = 'row'>";
	        echo "<div class = 'col-xs-12'>";    echo "<h4>".$this->Form->submit('Guardar Tracto', ['class' => 'form-control', 'id' => 'asso_id'])."</h4>";
	        echo "</div>";
	    echo "</div>";

	    echo "</div >";

	echo $this->Form->end();


?>

<?= $this->Flash->render('addTractSuccess') ?>

<div class="row text-left">
    <div class="col-xs-12">
        <h4 id="callback"></h4>   
    </div>

</div>

<br>

<div class="row text-center">
  <div class="col-xs-12">
     <?php echo $this->Html->link('Atrás', '/associations/', ['class'=>'btn btn-primary']);?>
  </div>
</div>
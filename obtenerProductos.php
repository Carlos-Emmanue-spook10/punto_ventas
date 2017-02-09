<?php
require("conexion.php");
$conn=conectar();

$query="SELECT count(producto),producto,compania,marca,modelo,clasificacion,color,precio 
                    	 from productos
                    	 group by producto,compania,marca,modelo,color"; 
            		 $result = mysql_query($query,$conn);
          	$r=1;
          	echo '<table id="table1" class="table text-center">';
          	echo '<caption><p>PRODUCTOS DISPONIBLES</p></caption>
          	<tr class="success">
          		<th class="text-center"> Cantidad </th>
          		<th class="text-center"> Producto </th>
          		<th class="text-center"> Compañia </th>
          		<th class="text-center"> Marca </th>
          		<th class="text-center"> Modelo </th>
          		<th class="text-center"> Clasificacion </th>
          		<th class="text-center"> Color </th>
          		<th class="text-center"> Precio </th>
          		<th> </th>
          	</tr>';
          	       while ($row= mysql_fetch_row($result)){
    	
            			echo '
		                <tr>
		                <td name="cantidad">'.$row[0].'</td>
		                <td name="produc">'.$row[2].'</td>
		                <td name="compa">'.$row[3].'</td>
		                <td name="marc">'.$row[4].'</td>
		                <td name="mod">'.$row[5].'</td>
		                <td name="clasif">'.$row[6].'</td>
		                <td name="col">'.$row[7].'</td>
		                <td name="prec">'.$row[8].'</td>
		                <td><input type="submit" value="Anexar" onclick="Anexar(\''.$r++.'\');"></td>
		                </tr> 
		            	';
		            }
echo '</table>';
?>
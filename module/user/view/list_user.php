<div id="contenido">
    <div class="container">
    	<div class="row">
    			<h3>LISTA DE HABITACIONES</h3>
    	</div>
    	<div class="row">
    		<p><a href="index.php?page=controller_user&op=create"><img src="view/img/anadir.png"></a><a href="index.php?page=controller_user&op=delete_all"><img src="view/img/trash.png"></a></p>

    		<table id="table_crud">
            <thead>
                <tr>
                    <td width=125><b>Numero de habitacion</b></th>
                    <th width=125><b>Tipo de habitacion</b></th>
                    <th width=125><b>Fecha de entrada</b></th>
                    <th></th>   
                    
                </tr>
            </thead>    
            <tbody>
                <?php
                    if ($rdo->num_rows === 0){
                        echo '<tr>';
                        echo '<td align="center"  colspan="3">NO HAY NINGUNA HABITACION</td>';
                        echo '</tr>';
                    }else{
                        foreach ($rdo as $row) {
                       		echo '<tr>';
                            echo '<td width=125>'. $row['Numero_habitacion'] . '</td>';
                            echo '<td width=125>'. $row['Tipo_habitacion'] . '</td>';
                            echo '<td width=125>'. $row['Fecha_entrada'] . '</td>';
                            echo '<td whidth=125'."<div class='habitacion' id='".$row['Numero_habitacion']."'>Read</div>".'</td>'; 
                    	   	echo '</td>';
                    	   	echo '</tr>';
                        }
                    }
                ?>
                </tbody>    
            </table>
    	</div>
    </div>
		<section id="modalcontent"></section>
</div>


<!-- modal window -->
<!-- <section id="habitacion_modal">
    <div id="details_habitacion" hidden>
        <div id="details">
            <div id="container">
                Numero de habitacion: <div id="num_habitacion"></div></br>
                Tipo de habitacion: <div id="Tipo_habitacion"></div></br>
                Tipo de comida: <div id="tipo_comida"></div></br>
                Piscina: <div id="piscina"></div></br>
                Mayordomo: <div id="mayordomo"></div></br>
                email: <div id="email"></div></br>
                Contraseña: <div id="pass"></div></br>
                Fecha de entrada: <div id="f_ini"></div></br>
                Fechad de salida: <div id="f_fin"></div></br>
            </div>
        </div>
    </div>
</section> -->
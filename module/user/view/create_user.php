<div id="contenido">
    <form autocomplete="on" method="post" name="alta_habitacion" id="alta_habitacion" > <!-- action="index.php?page=controller_user&op=create" onsubmit="return validate1();-->
    <?php
		if(isset($error)){
			print ("<BR><span CLASS='styerror'>" . "* ".$error . "</span><br/>");
	}?>

        <h1>Habitacion nueva</h1>
        <table border='0'>
            <tr>
                <td>Numero de habitacion: </td>
                <td><input type="text" id="num_habitacion" name="num_habitacion" placeholder="xxx" value=""/></td>
                <td><font color="red">
                    <span id="error_num_habitacion" class="error">
                        <?php
                            echo "$error_num_habitacion";
                        ?>
                    </span>
                </font></font></td>
            </tr>
        
            
            
            <tr>
                <td>Tipo de habitacion: </td>
                <td><input type="text" id="tipo_habitacion" name="tipo_habitacion" placeholder="Tipo" value=""/></td>
                <td><font color="red">
                    <span id="error_tipo_habitacion" class="error">
                        <?php
                            echo "$error_tipo_habitacion";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Ciudad: </td>
                <td><input type="text" id="ciudad" name="ciudad" placeholder="ciudad" value=""/></td>
                <td><font color="red">
                    <span id="error_ciudad" class="error">
                        <?php
                            echo "$error_ciudad";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Valoracion: </td>
                <td><input type="text" id="valoracion" name="valoracion" placeholder="Tipo" value=""/></td>
                <td><font color="red">
                    <span id="error_valoracion" class="error">
                        <?php
                            echo "$error_valoracion";
                        ?>
                    </span>
                </font></font></td>
            </tr>





            
            <tr>
                <td>Tipo comida: </td>
                <select id="tipo_comida" name="tipo_comida">
                    <option value="espaguetis">Espaguetis</option>
                    <option value="macarrones">Macarrones</option>
                    <option value="lasagna">Lasagna</option>
                    <option value="puchero">Puchero</option>
                </select>
                <!--<td><input type="text" id= "tipo_comida" name="tipo_comida" placeholder="Tipo de comida" value=""/></td>-->
                <td><font color="red">
                    <span id="error_tipo_comida" class="error">
                        <?php
                            echo "$error_tipo_comida";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr><td>Piscina</td>
                <td><input type="radio" id="piscina" name="piscina" value="Si"/>Si
                    <input type="radio" id="piscina2" name="piscina" value="No"/>No</td> 
                <td><font color="red">
                    <span id="error_piscina" class="error">
                        <?php
                            echo "$error_piscina";
                        ?>
                    </span>
                    </font></font></td>
            </tr>

            <tr>
                <td>Mayordomo</td>
                <td><input type="checkbox" id="mayordomo" name="mayordomo" value="Si" checked/></td>
                <td><font color="red">
                    <span id="error_mayordomo" class="error">
                        <?php
                            echo "$error_mayordomo";
                        ?>
                    </span>
                    </font></font></td>
            </tr>





            
            <tr>
                <td>Email: </td>
                <td><input type="text" id="email" name="email" placeholder="email" value=""/>
                    <!--<input type="radio" id="sexo" name="sexo" placeholder="sexo" value="Mujer"/>Mujer</td>-->
                <td><font color="red">
                    <span id="error_email" class="error">
                        <?php
                            echo "$error_email";
                        ?>
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Contrasenya: </td>
                <td><input type="password" id="pass" name="pass" placeholder="contraseña" value=""/></td>
                <td><font color="red">
                    <span id="error_pass" class="error">
                        <?php
                            echo "$error_pass";
                        ?>
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Fecha de entrada: </td>
                <td><input id="f_ini" type="text" name="f_ini" readonly="readonly" placeholder="yyyy/mm/dd" value=""/></td>
                <td><font color="red">
                    <span id="error_f_ini" class="error">
                        <?php
                            echo "$error_f_ini";
                        ?>
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Fecha de salida: </td>
                <td><input id="f_fin" type="text" name="f_fin" readonly="readonly" placeholder="yyyy/mm/dd" value=""/></td>
                <td><font color="red">
                    <span id="error_f_fin" class="error">
                        <?php
                            echo "$error_f_fin";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Imagen: </td>
                <td><input type="text" id="img" name="img" placeholder="img" value=""/></td>
                <td><font color="red">
                    <span id="error_imagen" class="error">
                        <?php
                            echo "$error_imagen";
                        ?>
                    </span>
                </font></font></td>
            </tr>

            <tr>  
                <!-- <input type="submit" name="create" id="create" href="index.php?page=controller_user&op=create"/>Enviar -->
                <td><input type="button" name="create" id="create" value="Añadir" onclick="validate1(0)" /></td>
                <td align="right"><a href="index.php?page=controller_user&op=list">Volver</a></td>
            </tr>
        </table>
    </form>
</div>
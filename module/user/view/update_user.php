<div id="contenido">
    <form autocomplete="on" method="post" name="update_hab" id="update_hab"> <!--onsubmit="return validateUP();" action="index.php?page=controller_user&op=update" -->
    <?php
		if(isset($error)){
			print ("<BR><span CLASS='styerror'>" . "* ".$error . "</span><br/>");
	}?>    
    
    <h1>Modificar usuario</h1>
        <table border='0'>
            <tr>
                <td>Numero de habitacion: </td>
                <td><input type="text" id="num_habitacion" name="num_habitacion" placeholder="Numero" value="<?php echo $user['Numero_habitacion'];?>" readonly/></td>
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
                <td><input type="text" id="tipo_habitacion" name="tipo_habitacion" placeholder="tipo_habitacion" value="<?php echo $user['Tipo_habitacion'];?>"/></td>
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
                <td><input type="text" id="ciudad" name="ciudad" placeholder="ciudad" value="<?php echo $user['Ciudad'];?>"/></td>
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
                <td><input type="text" id="valoracion" name="valoracion" placeholder="Tipo" value="<?php echo $user['Valoracion'];?>"/></td>
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
                <td><input type="text" id="email" name="email" placeholder="email" value="<?php echo $user['email'];?>"/></td>
                <td><font color="red">
                    <span id="error_email" class="error">
                        <?php
                            echo "$error_email";
                        ?>
                    </span>
                </font></font></td>
                
            </tr>

            <tr>
                <td>Contraseña: </td>
                <td><input type="password" id="pass" name="pass" placeholder="contraseña" value="<?php echo $user['Contrasenya'];?>"/></td>
                <td><font color="red">
                    <span id="error_pass" class="error">
                        <?php
                            echo "$error_pass";
                        ?>
                    </span>
                </font></font></td>
            </tr>
            
            
            
            
            
            <!-- <tr>
                <td>Sexo: </td>
                <td>
                    <?php
                        //if ($user['sex']==="Hombre"){
                    ?>
                        <input type="radio" id="sexo" name="sexo" placeholder="sexo" value="Hombre" checked/>Hombre
                        <input type="radio" id="sexo" name="sexo" placeholder="sexo" value="Mujer"/>Mujer
                    <?php    
                        //}else{
                    ?>
                        <input type="radio" id="sexo" name="sexo" placeholder="sexo" value="Hombre"/>Hombre
                        <input type="radio" id="sexo" name="sexo" placeholder="sexo" value="Mujer" checked/>Mujer
                    <?php   
                        //}
                    ?>
                </td>
                <td><font color="red">
                    <span id="error_sexo" class="error">
                        <?php
                            //echo "$error_sexo";
                        ?>
                    </span>
                </font></font></td>
            </tr> -->
            
            <tr>
                <td>Fecha de entrada: </td>
                <td><input id="f_ini" type="text" name="f_ini" placeholder="fecha de entrada" value="<?php echo $user['Fecha_entrada'];?>"/></td>
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
                <td><input id="f_fin" type="text" name="f_fin" placeholder="fecha de salida" value="<?php echo $user['Fecha_salida'];?>"/></td>
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
                <td><input type="text" id="img" name="img" placeholder="img" value="<?php echo $user['imagen'];?>"/></td>
                <td><font color="red">
                    <span id="error_imagen" class="error">
                        <?php
                            echo "$error_imagen";
                        ?>
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td><input type="button" name="update_hab" id="update_hab" value="update_hab" onclick="validate1(1)"/></td>
                <td align="right"><a href="index.php?page=controller_user&op=list">Volver</a></td>
            </tr>
        </table>
    </form>
</div>
<div id="contenido">
    <form autocomplete="on" method="post" name="update_user" id="update_user" onsubmit="return validate();" action="index.php?page=controller_user&op=update">
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
                <td>Tipo de comida: </td>
                <td><input type="text" id= "tipo_comida" name="tipo_comida" placeholder="Tipo de comida" value="<?php echo $user['Tipo_comida'];?>"/></td>
                <td><font color="red">
                    <span id="error_DNI" class="error">
                        <?php
                            echo "$error_DNI";
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
            
            <!-- <tr>
                <td>Pais: </td>
                <td><select id="pais" name="pais" placeholder="pais">
                    <?php
                        //if($user['country']==="España"){
                    ?>
                        <option value="España" selected>España</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Francia">Francia</option>
                    <?php
                        //}elseif($user['country']==="Portugal"){
                    ?>
                        <option value="España">España</option>
                        <option value="Portugal" selected>Portugal</option>
                        <option value="Francia">Francia</option>
                    <?php
                        //}else{
                    ?>
                        <option value="España">España</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Francia" selected>Francia</option>
                    <?php
                        //}
                    ?>
                    </select></td>
                <td><font color="red">
                    <span id="error_pais" class="error">
                        <?php
                          //  echo "$error_pais";
                        ?>
                    </span>
                </font></font></td>
            </tr> -->
            
            <!-- <tr>
                <td>Idioma: </td>
                <?php
                    //$lang=explode(":", $user['language']);
                ?>
                <td><select multiple size="3" id="idioma[]" name="idioma[]" placeholder="idioma">
                    <?php
                      //  $busca_array=in_array("Español", $lang);
                        //if($busca_array){
                    ?>
                        <option value="Español" selected>Español</option>
                    <?php
                        //}else{
                    ?>
                        <option value="Español">Español</option>
                    <?php
                        //}
                    ?>
                    <?php
                        //$busca_array=in_array("Ingles", $lang);
                        //if($busca_array){
                    ?>
                        <option value="Ingles" selected>Ingles</option>
                    <?php
                        //}else{
                    ?>
                        <option value="Ingles">Ingles</option>
                    <?php
                        //}
                    ?>
                    <?php
                        //$busca_array=in_array("Portugues", $lang);
                        //if($busca_array){
                    ?>
                        <option value="Portugues" selected>Portugues</option>
                    <?php
                        //}else{
                    ?>
                        <option value="Portugues">Portugues</option>
                    <?php
                        //}
                    ?>
                    <?php
                        //$busca_array=in_array("Frances", $lang);
                        //if($busca_array){
                    ?>
                        <option value="Frances" selected>Frances</option>
                    <?php
                        //}else{
                    ?>
                        <option value="Frances">Frances</option>
                    <?php
                        //}
                    ?>
                    </select></td>
                <td><font color="red">
                    <span id="error_idioma" class="error">
                        <?php
                            //echo "$error_idioma";
                        ?>
                    </span>
                </font></font></td>
            </tr><tr> -->
                <!-- <td>Pais: </td>
                <td><select id="pais" name="pais" placeholder="pais">
                    <?php
                        //if($user['country']==="España"){
                    ?>
                        <option value="España" selected>España</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Francia">Francia</option>
                    <?php
                        //}elseif($user['country']==="Portugal"){
                    ?>
                        <option value="España">España</option>
                        <option value="Portugal" selected>Portugal</option>
                        <option value="Francia">Francia</option>
                    <?php
                        //}else{
                    ?>
                        <option value="España">España</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Francia" selected>Francia</option>
                    <?php
                        //}
                    ?>
                    </select></td>
                <td><font color="red">
                    <span id="error_pais" class="error">
                        <?php
                          //  echo "$error_pais";
                        ?>
                    </span>
                </font></font></td>
            </tr> -->
            
            <!-- <tr>
                <td>Observaciones: </td>
                <td><textarea cols="30" rows="5" id="observaciones" name="observaciones" placeholder="observaciones"><?php echo $user['comment'];?></textarea></td>
                <td><font color="red">
                    <span id="error_observaciones" class="error">
                        <?php
                            //echo "$error_observaciones";
                        ?>
                    </span>
                </font></font></td>
            </tr> -->
            
            <!-- <tr>
                <td>Aficiones: </td>
                <?php
                    //$afi=explode(":", $user['hobby']);
                ?>
                <td>
                    <?php
                      //  $busca_array=in_array("Informatica", $afi);
                        //if($busca_array){
                    ?>
                        <input type="checkbox" id= "aficion[]" name="aficion[]" value="Informatica" checked/>informatica
                    <?php
                        //}else{
                    ?>
                        <input type="checkbox" id= "aficion[]" name="aficion[]" value="Informatica"/>informatica
                    <?php
                        //}
                    ?>
                    <?php
                        //$busca_array=in_array("Alimentacion", $afi);
                        //if($busca_array){
                    ?>
                        <input type="checkbox" id= "aficion[]" name="aficion[]" value="Alimentacion" checked/>alimentacion
                    <?php
                        //}else{
                    ?>
                        <input type="checkbox" id= "aficion[]" name="aficion[]" value="Alimentacion"/>alimentacion
                    <?php
                        //}
                    ?>
                    <?php
                        //$busca_array=in_array("Automovil", $afi);
                        //if($busca_array){
                    ?>
                        <input type="checkbox" id= "aficion[]" name="aficion[]" value="Automovil" checked/>automovil</td>
                    <?php
                        //}else{
                    ?>
                    <input type="checkbox" id= "aficion[]" name="aficion[]" value="Automovil"/>automovil</td>
                    <?php
                        //}
                    ?>
                </td>
                <td><font color="red">
                    <span id="error_aficion" class="error">
                        <?php
                            //echo "$error_aficion";
                        ?>
                    </span>
                </font></font></td>
            </tr> -->
            
            <tr>
                <td><input type="submit" name="update" id="update"/></td>
                <td align="right"><a href="index.php?page=controller_user&op=list">Volver</a></td>
            </tr>
        </table>
    </form>
</div>
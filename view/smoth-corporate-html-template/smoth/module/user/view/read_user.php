<div id="contenido">
    <h1>Informacion de la habitacion</h1>
    <p>
    <table border='2'>
        <tr>
            <td>Numero de habitacion: </td>
            <td>
                <?php
                    echo $user['Numero_habitacion'];
                ?>
            </td>
        </tr>
    
        <tr>
            <td>Tipo de habitacion: </td>
            <td>
                <?php
                    echo $user['Tipo_habitacion'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Tipo de comida: </td>
            <td>
                <?php
                    echo $user['Tipo_comida'];
                ?>
            </td>
        </tr>

        <tr>
            <td>Piscina: </td>
            <td>
                <?php
                    echo $user['Piscina'];
                ?>
            </td>
        </tr>

        <tr>
            <td>Mayordomo: </td>
            <td>
                <?php
                    echo $user['Mayordomo'];
                ?>
            </td>
        </tr>




        
        <tr>
            <td>Email: </td>
            <td>
                <?php
                    echo $user['email'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Password: </td>
            <td>
                <?php
                    echo $user['Contrasenya'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Fecha de entrada: </td>
            <td>
                <?php
                    echo $user['Fecha_entrada'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Fecha de salida: </td>
            <td>
                <?php
                    echo $user['Fecha_salida'];
                ?>
            </td>
            
        </tr>
        
        <!-- <tr>
            <td>Pais: </td>
            <td>
                <?php
                    //echo $user['country'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Idioma: </td>
            <td>
                <?php
                    //echo $user['language'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Observaciones: </td>
            <td>
                <?php
                    //echo $user['comment'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Aficiones: </td>
            <td>
                <?php
                    //echo $user['hobby'];
                ?>
            </td>
        </tr> -->
    </table>
    </p>
    <p><a href="index.php?page=controller_user&op=list">Volver</a></p>
</div>
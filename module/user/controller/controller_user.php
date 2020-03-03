<?php
//poner lo del path
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Programacion/Tema5_1.0/Tema5_1.0/8_MVC_CRUD/';  //no me esta pillando bien el path y en consecuencia el include de despues
    include ($path . "/module/user/model/DAOUser.php");
    //include ("module/user/model/DAOUser.php");
    session_start();
    
    switch($_GET['op']){

        case 'list';
    
            try{
                $daouser = new DAOUser();
                $rdo = $daouser->select_all_user();
                
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
    			$callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/user/view/list_user.php");
    		}
            break;
            
        case 'create';
            //echo "dentro del create";
            include("module/user/model/validate.php");
            //echo "despues del include"; 
            
            //<script type="text/javascript" src="module/lang/translate.js"></script>

            //$check2=validate1();
            //echo "validate1();";
            $check = true;
            
            if ($_POST){
                
                
                //script="text/javascript" src="module/lang/translate.js";
                //include ("validate_user.js");
                //$check1=validate1();
                //echo "dentro del post create";
                $check=validate();
                // print_r ("$check");
                // echo "$check";
                    
                    if($check){

                        //print_r ("$check");
                        $_SESSION['user']=$_POST;
                        try{
                            // echo "intento de creacion";
                            $daouser = new DAOUser();
                            $rdo = $daouser->insert_user($_POST);
                            //echo "insert hecho";
                        }catch (Exception $e){
                            //echo "fallo en el insert";
                            $callback = 'index.php?page=503';
                            die('<script>window.location.href="'.$callback .'";</script>');
                        }
                        
                        if($rdo){
                            echo '<script language="javascript">alert("Registrado en la base de datos correctamente")</script>';
                            $callback = 'index.php?page=controller_user&op=list';
                            die('<script>window.location.href="'.$callback .'";</script>');
                        }else{
                            $callback = 'index.php?page=503';
                            die('<script>window.location.href="'.$callback .'";</script>');
                        }
                    

                        
                }
            }
            include("module/user/view/create_user.php");
            break;
            
        case 'update';
            include("module/user/model/validate.php");
            $check = true;
            print_r("dentro del controller");
            
            
            
            if ($_POST){   //if (isset($_POST['update'])){
                $check=validate_up();
                
                if ($check){
                    $_SESSION['user']=$_POST;
                    try{
                        $daouser = new DAOUser();
    		            $rdo = $daouser->update_user($_POST);
                    }catch (Exception $e){
                        $callback = 'index.php?page=503';
        			    die('<script>window.location.href="'.$callback .'";</script>');
                    }
                    
		            if($rdo){
            			echo '<script language="javascript">alert("Actualizado en la base de datos correctamente")</script>';
            			$callback = 'index.php?page=controller_user&op=list';
        			    die('<script>window.location.href="'.$callback .'";</script>');
            		}else{
            			$callback = 'index.php?page=503';
    			        die('<script>window.location.href="'.$callback .'";</script>');
            		}
                }
            }

            echo("FUERA");
            
            try{
                $daouser = new DAOUser();
            	$rdo = $daouser->select_user($_GET['id']);
            	$user=get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
    			$callback = 'index.php?page=503';
    			die('<script>window.location.href="'.$callback .'";</script>');
    		}
                
            include("module/user/view/update_user.php");
    		
            break;
            
        case 'read';
            try{
                $daouser = new DAOUser();
            	$rdo = $daouser->select_user($_GET['id']);
            	$user=get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            if(!$rdo){
    			$callback = 'index.php?page=503';
    			die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/user/view/read_user.php");
    		}
            break;
            case 'delete_all';
                if (isset($_POST['delete_all'])){
                    try{
                        $daouser = new DAOUser();
                        $rdo = $daouser->delete_all();
                    }catch(Exception $e){
                        $callback = 'index.php?page=503';
                        die('<script>window.location.href="'.$callback .'";</script>');
                    }


                    if($rdo){
                        echo '<script language="javascript">alert("Todas las habitaciones borradas correctamente")</script>';
                        $callback = 'index.php?page=controller_user&op=list';
                        die('<script>window.location.href="'.$callback .'";</script>');
                    }else{
                        $callback = 'index.php?page=503';
			        die('<script>window.location.href="'.$callback .'";</script>');
                    }
                }

                include("module/user/view/deleteAll.php");
            break;
            
        case 'delete';
            if (isset($_POST['delete'])){
                try{
                    $daouser = new DAOUser();
                	$rdo = $daouser->delete_user($_GET['id']);
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
    			    die('<script>window.location.href="'.$callback .'";</script>');
                }
            	
            	if($rdo){
        			echo '<script language="javascript">alert("Borrado en la base de datos correctamente")</script>';
        			$callback = 'index.php?page=controller_user&op=list';
    			    die('<script>window.location.href="'.$callback .'";</script>');
        		}else{
        			$callback = 'index.php?page=503';
			        die('<script>window.location.href="'.$callback .'";</script>');
        		}
            }
            
            include("module/user/view/delete_user.php");
            break;

        case 'read_modal';
             try{
                 $daouser = new DAOUser();
                 $rdo = $daouser->select_user($_GET['modal']);   
             }catch (Exception $e){
                 echo json_encode("error");
                 exit;
             }//end try
             if(!$rdo){
                 echo json_encode("error");
                 exit;
             }else{
                 //$habitacion ?
                 echo json_encode($rdo);
                 exit;
             }
            
        break;//end read modal
        default;
            include("view/inc/error404.php");
            break;
    }
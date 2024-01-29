<?php
require_once("DataSource.php");
require_once(__DIR__."/../entidad/Persona.php");

class PersonaDAO {

    public function registrarPersona(Persona $persona){

        $data_source = new DataSource();

        $data_table=$data_source->ejecutarConsulta("SELECT * FROM personas WHERE correo=:correo", array( ':correo'=>$persona->getCorreo() ) );

        if(count($data_table)!=0){

            return -1;

        }

        $data_source = new DataSource();

        $actualizacion = "INSERT INTO personas VALUES(NULL,:nombre,:apellido,:correo,:password,:imagen,CURRENT_DATE, NULL)";

        $resultado = $data_source->ejecutarActualizacion($actualizacion,array(
            ':nombre' => $persona->getNombre(),
            ':apellido' => $persona->getApellido(),
            ':correo' => $persona->getCorreo(),
            ':password' => $persona->getPassword(),
            ':imagen'=> $persona->getImagen()
            )
        );

        return $resultado;


    }

    public function autenticarPersona($correo, $password){
        
        $data_source = new DataSource();

        $data_table= $data_source->ejecutarConsulta("SELECT * FROM personas WHERE correo =:correo",array(':correo'=>$correo));

        $persona=null;

        if(count($data_table)==1 && password_verify($password,$data_table[0]["password"])){
            
            foreach($data_table as $indice => $valor){

                $persona = new Persona(
                        
                        $data_table[$indice]["idpersonas"],
                        $data_table[$indice]["nombre"],
                        $data_table[$indice]["apellido"],
                        $data_table[$indice]["correo"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["imagen"],
                        $data_table[$indice]["fecharegistro"],
                        $data_table[$indice]["administrador"]
                        
                        );
            }
        }
        return $persona;
    }

    public function verpersonas(){

        $data_source = new DataSource();

        $data_table= $data_source->ejecutarConsulta("SELECT * FROM personas WHERE administrador IS NULL", NULL);
        $persona=null;
        $personas=array();

        foreach($data_table as $indice => $valor){
            $persona = new Persona(
                $data_table[$indice]["idpersonas"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["apellido"],
                $data_table[$indice]["correo"],
                $data_table[$indice]["password"],
                $data_table[$indice]["imagen"],
                $data_table[$indice]["fecharegistro"],
                $data_table[$indice]["administrador"]
                    );
            array_push($personas,$persona);
        }
        
    return $personas;
    }

    public function eliminarPersona($idpersonas){

        $data_source = new DataSource();

        $data_table= $data_source->ejecutarConsulta("DELETE FROM personas WHERE idpersonas =:idpersonas",array(':idpersonas'=>$idpersonas));

        $persona=count($data_table);
        
        return $persona;

    }

    public function editarPersona(Persona $persona){

        $data_source = new DataSource();

        $actualizacion = "UPDATE personas SET nombre =:nombre, apellido =:apellido, correo =:correo WHERE idpersonas=:id";

        $resultado = $data_source->ejecutarActualizacion($actualizacion,array(
            ':nombre' => $persona->getNombre(),
            ':apellido' => $persona->getApellido(),
            ':correo' => $persona->getCorreo(),
            ':id'=>$persona->getIdpersona()
            )
        );

        return $resultado;
    }

    public function registrarPersonaConGoogle(Persona $persona){

        $data_source = new DataSource();

        $data_table=$data_source->ejecutarConsulta("SELECT * FROM personas WHERE correo=:correo", array( ':correo'=>$persona->getCorreo() ) );

        if(count($data_table)!=0){

            return ;

        }
        $data_source = new DataSource();

        $actualizacion = "INSERT INTO personas VALUES(NULL,:nombre,:apellido,:correo,:password,:imagen,CURRENT_DATE, NULL)";

        $resultado = $data_source->ejecutarActualizacion($actualizacion,array(
            ':nombre' => $persona->getNombre(),
            ':apellido' => $persona->getApellido(),
            ':correo' => $persona->getCorreo(),
            ':password' => $persona->getPassword(),
            ':imagen'=> $persona->getImagen()
            )
        );

    }
    public function consultarPersonaCorreo($email){

        $data_source = new DataSource();

        $data_table=$data_source->ejecutarConsulta("SELECT * FROM personas WHERE correo=:correo", array( ':correo'=>$email ) );

        if(count($data_table)!=0){

            foreach($data_table as $indice => $valor){

                $persona = new Persona(
                        
                        $data_table[$indice]["idpersonas"],
                        $data_table[$indice]["nombre"],
                        $data_table[$indice]["apellido"],
                        $data_table[$indice]["correo"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["imagen"],
                        $data_table[$indice]["fecharegistro"],
                        $data_table[$indice]["administrador"]
                        
                        );
            }

            return $persona;

        }

    }

    public function actualizarFotoPerfil($nombre_imagen, $usuario){

        $data_source = new DataSource();
        $actualizacion="UPDATE personas SET imagen=:imagen WHERE idpersonas=:usuario";

        $data_table= $data_source->ejecutarActualizacion($actualizacion, array(
            ':imagen'=>$nombre_imagen,
            ':usuario'=>$usuario
        ));
        return $data_table;
    }

    public function verPersonaPorId($id){




    }
    public function CambiarClave($idpersona,$password){
        $data_source = new DataSource();
        $actualizacion="UPDATE personas SET password=:password WHERE idpersonas=:usuario";

        $data_table= $data_source->ejecutarActualizacion($actualizacion, array(
            ':password'=>$password,
            ':usuario'=>$idpersona
        ));
        return $data_table;
    }







    
}
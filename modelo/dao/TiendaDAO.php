<?php
require_once("DataSource.php");
require_once(__DIR__."/../entidad/Tienda.php");

class TiendaDAO {

    public function registrarTinda(Tienda $tienda){

        $data_source = new DataSource();

        $data_table=$data_source->ejecutarConsulta("SELECT * FROM tiendas WHERE nombre=:nombre", array( ':nombre'=>$tienda->getNombre()) );

        if(count($data_table)!=0){

            return -1;

        }

        $data_source = new DataSource();

        $actualizacion = "INSERT INTO tiendas VALUES(NULL,:nombre,:categoria,:id)";

        $resultado = $data_source->ejecutarActualizacion($actualizacion,array(
            ':nombre' => $tienda->getNombre(),
            ':categoria' => $tienda->getCategoria(),
            ':id' => $tienda->getIdpersona()
            )
        );

        return $resultado;

    }

    public function vertiendas(){

        $data_source = new DataSource();

        $data_table= $data_source->ejecutarConsulta("SELECT * FROM tiendas", NULL);
        $persona=null;
        $tiendas=array();

        foreach($data_table as $indice => $valor){
            $tienda = new Tienda(
                $data_table[$indice]["idtiendas"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["categoria"],
                $data_table[$indice]["idpersona"]
                    );
            array_push($tiendas,$tienda);
        }
        
    return $tiendas;
    }


    public function eliminarTienda($idtienda){

            $data_source = new DataSource();
    
            $data_table= $data_source->ejecutarConsulta("DELETE FROM tiendas WHERE idtiendas =:idtienda",array(':idtienda'=>$idtienda));
    
            $tienda=count($data_table);
            
            return $tienda;
    
        
    }

    public function editartienda($nombre, $id){

        $data_source = new DataSource();

        $actualizacion = "UPDATE tiendas SET nombre =:nombre WHERE idtiendas=:id";

        $resultado = $data_source->ejecutarActualizacion($actualizacion,array(
            ':nombre' => $nombre,
            ':id'=>$id
            )
        );

        return $resultado;
    
    }
}
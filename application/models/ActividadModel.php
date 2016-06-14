<?php
/**
 *
 */
class ActividadModel extends CI_Model
{
  /*
  function __construct(argument)
  {
    # code...
  }*/
  function getAll($id){

     $this -> db -> select('*');
     $this-> db-> from('actividad');
     $this-> db-> where('id_sprint', $id);
     //$this -> db -> limit(1);

     $query = $this->db-> get();

     if($query -> num_rows() >= 1)
     {
       return $query->result();
     }
     else
     {
       return false;
     }
  }

  function crearActividad($nombre,$descripcion,$id_responsable,$id_sprint){
    $data = array(
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'prioridad' => 0,
        'avanze' => 100,
        'estado' => "",
        'id_responsable' => $id_responsable,
        'id_sprint' => $id_sprint
    );

    $this->db->insert('actividad', $data);

    $id_actividad = $this->db->insert_id();



    return  $id_actividad;
  }

  function getActividadById($id){
    $this -> db -> select('*');
    $this-> db-> from('actividad');
    $this-> db-> where('id', $id);
    $this -> db -> limit(1);

    $query = $this->db->get();

    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

  function actualizarProyecto($numero,$descripcion,$avanze,$id_proyecto,$fecha_inicial,$fecha_final,$id){

    $data = array(
        'numero' => $numero,
        'descripcion' => $descripcion,
        'avanze' => $avanze,
        'id_proyecto' => $id_proyecto,
        'fecha_inicial' => $fecha_inicial,
        'fecha_final' => $fecha_final,
    );

    $this->db->where('id', $id);
    $rowAfects  = $this->db->update('sprint', $data);
    return $rowAfects;
  }

  function updateEstadoActividad($id_actividad,$estado){
    $data = array(
        'estado' => $estado  
    );

    $this->db->where('id', $id_actividad);
    $rowAfects  = $this->db->update('actividad', $data);
    return $rowAfects;

  }

  function actualizarActividad($id,$nombre,$descripcion){
    $data = array(
        'nombre' => $nombre,
        'descripcion' => $descripcion  
    );

    $this->db->where('id', $id);
    $rowAfects  = $this->db->update('actividad', $data);
    return $rowAfects;
  }

  function eliminarActividad($id){
    return $this->db->delete('actividad', array('id' => $id));
  }

  function actualizarResponsable ($id,$id_responsable){
    $data = array(
        'id_responsable' => $id_responsable,
    );

    $this->db->where('id', $id);
    $rowAfects  = $this->db->update('actividad', $data);
    return $rowAfects;
  }
}

 ?>

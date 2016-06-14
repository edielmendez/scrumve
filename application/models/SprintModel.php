<?php
/**
 *
 */
class SprintModel extends CI_Model
{
  /*
  function __construct(argument)
  {
    # code...
  }*/
  function getAll($id){

     $this -> db -> select('*');
     $this-> db-> from('sprint');
     $this-> db-> where('id_proyecto', $id);
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

  function crearSprint($numero,$descripcion,$fecha_inicial,$fecha_final,$id_proyecto){
    $data = array(
        'numero' => $numero,
        'descripcion' => $descripcion,
        'avanze' => 0,
        'id_proyecto' => $id_proyecto,
        'fecha_inicial' => $fecha_inicial,
        'fecha_final' => $fecha_final,
    );
    $this->db->insert('sprint', $data);

    $id_nuevosprint = $this->db->insert_id();



    return  $id_nuevosprint;
  }

  function getOneSprint($id){
    $this -> db -> select('*');
    $this-> db-> from('sprint');
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

  function delete($id){
    return $this->db->delete('sprint', array('id' => $id));
  }
}

 ?>

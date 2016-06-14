<?php
/**
 *
 */
class PersonalModel extends CI_Model
{
  /*
  function __construct(argument)
  {
    # code...
  }*/
  function getAll(){

     $this -> db -> select('*');
     $this-> db-> from('personal');
     //$this-> db-> where('id_proyecto', $id);
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

  function getOnePersonal($id){
    $this -> db -> select('*');
    $this-> db-> from('personal');
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
}

 ?>

<?php
/**
 *
 */
class Proyecto extends CI_Model
{
  /*
  function __construct(argument)
  {
    # code...
  }*/
  function getAll($id){

     $this -> db -> select('*');
     $this-> db-> from('proyecto');
     $this-> db-> where('id_user', $id);
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

  function crearProyecto($nombre,$descripcion,$fecha_inicial,$fecha_final,$id_user){
    $data = array(
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'estado' => 0,
        'id_user' => $id_user
    );
    $this->db->insert('proyecto', $data);

    $id_nuevoproyecto = $this->db->insert_id();
    $calendario = array(
        'fecha_inicial' => $fecha_inicial,
        'fecha_final' => $fecha_final,
        'id_proyecto' => $id_nuevoproyecto

    );

    $this->db->insert('calendario', $calendario);


    return  $id_nuevoproyecto;
  }

  function getOneProject($id){
    $this -> db -> select('*');
    $this-> db-> from('proyecto');
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

  function actualizarProyecto($nombre,$descripcion,$id){
    $data = array(
          'nombre' => $nombre,
          'descripcion' => $descripcion
    );

    $this->db->where('id', $id);
    $nose  = $this->db->update('proyecto', $data);
    return $nose;
  }


  function delete($id){
    return $this->db->delete('proyecto', array('id' => $id));
  }
}

 ?>

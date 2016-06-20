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

  function nuevoPersonal($nombre,$email,$habilidades){
    $data = array(
        'nombre' => $nombre,
        'email' => $email,
        'habilidades' => $habilidades
    );
    $this->db->insert('personal', $data);

    $id_personal= $this->db->insert_id();



    return  $id_personal;
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

  function actualizarPersonal($nombre,$email,$habilidades,$id){

    $data = array(
        'nombre' => $nombre,
        'email' => $email,
        'habilidades' => $habilidades
    );

    $this->db->where('id', $id);
    $rowAfects  = $this->db->update('personal', $data);
    return $rowAfects;
  }

  function delete($id){
    return $this->db->delete('personal', array('id' => $id));
  }
}

 ?>

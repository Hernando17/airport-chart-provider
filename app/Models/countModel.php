<?php



namespace App\Models;



use CodeIgniter\Model;



class countModel extends Model

{
    public function tot_user()

    {

        return $this->db->table('user')->countAll();
    }

    public function tot_chart()

    {

        return $this->db->table('chart')->countAll();
    }
}

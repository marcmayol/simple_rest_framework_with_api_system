<?php

use MVC\Model;

class ModelsExample extends Model
{

    public function get()
    {
        return $this->db->query("SELECT * FROM example ");
    }
}
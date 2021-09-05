<?php

namespace App\Controllers;

use Config\Database;

class DatabaseConnector extends BaseController{
    public function store($data){
        $builder = $this->makeBuilder('leads');
        $builder->insert($data);
    }
    public function isEmailRegistered($email){
        $builder = $this->makeBuilder('leads');
        $lead = $builder->where('email', $email);
        return (!empty($lead));
    }

    public function makeBuilder($table){
        return Database::connect()
        ->table($table);
    }
}
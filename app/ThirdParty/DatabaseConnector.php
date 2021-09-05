<?php

namespace App\ThirParty;

use Config\Database;

class DatabaseConnector{

    public static function store($data = []){
        $builder = self::makeBuilder('leads');
        $builder->insert($data);
    }

    public static function update($data, $target, $value){
        $builder = self::makeBuilder('leads');
        $builder->where($target, $value);
        $builder->update($data);
    }

    public static function updateByEmail($data, $email){
        $builder = self::makeBuilder('leads');
        $builder->where('email', $email);
        $builder->update($data);
    }

    public static function isEmailRegistered($email){
        $builder = self::makeBuilder('leads');
        $lead = $builder->where('email', $email);
        return (!empty($lead));
    }

    public static function makeBuilder($table){
        return Database::connect()
        ->table($table);
    }
}
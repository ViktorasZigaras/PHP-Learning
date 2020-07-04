<?php
namespace App\DB;
 
interface DataBase
{
    static function create(array $customerData) : void;
 
    static function update(string $customerUUID, array $customerData) : void;
 
    static function delete(string $customerUUID) : void;
 
    static function show(string $customerUUID) : array;
    
    static function showAll() : array;
}

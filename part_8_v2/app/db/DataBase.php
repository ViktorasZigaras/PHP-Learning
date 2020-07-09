<?php
namespace App\DB;
 
interface DataBase
{
    function create(array $customerData) : void;
 
    function update(string $customerUUID, array $customerData) : void;
 
    function delete(string $customerUUID) : void;
 
    function show(string $customerUUID) : array;
    
    function showAll() : array;
}

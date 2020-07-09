<?php
namespace App\DB;

use Ramsey\Uuid\Uuid;

class JsonDb implements DataBase {

    private static $data = [];

    public function __construct() {
        if (!file_exists('./../db/data.json')) file_put_contents('./../db/data.json', json_encode([]));
        self::$data = json_decode(file_get_contents('./../db/data.json'), 1);
    }
    
    public function create(array $customerData) : void {
        self::$data[(string) Uuid::uuid4()] = $customerData;
        self::$save(self::$data);
    }
 
    public function update(string $customerUUID, array $customerData) : void {
        self::$data[$customerUUID] = $customerData;
        self::$save(self::$data);
    }
 
    public function delete(string $customerUUID) : void {
        unset(self::$data[$customerUUID]);
        self::$save(self::$data);
    }
 
    public function show(string $customerUUID) : array {
        return self::$data[$customerUUID];
    }
    
    public function showAll() : array {
        return self::$data;
    }

    private function save(array $data = []) : void {
        file_put_contents('./../db/data.json', json_encode($data));
    }

}
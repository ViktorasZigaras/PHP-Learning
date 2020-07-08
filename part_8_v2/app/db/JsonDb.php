<?php
namespace App\DB;

use Ramsey\Uuid\Uuid;

class JsonDb implements DataBase {
    
    public static function create(array $customerData) : void {
        $data = self::open();
        $data[(string) Uuid::uuid4()] = $customerData;
        self::save($data);
    }
 
    public static function update(string $customerUUID, array $customerData) : void {
        $data = self::open();
        $data[$customerUUID] = $customerData;
        self::save($data);
    }
 
    public static function delete(string $customerUUID) : void {
        $data = self::open();
        unset($data[$customerUUID]);
        self::save($data);
    }
 
    public static function show(string $customerUUID) : array {
        $data = self::open();
        return $data[$customerUUID];
    }
    
    public static function showAll() : array {
        return self::open();
    }

    private function open() : array {
        if (!file_exists('./../db/data.json')) file_put_contents('./../db/data.json', json_encode([]));
        return json_decode(file_get_contents('./../db/data.json'), 1);
    }

    private function save(array $data = []) : void {
        file_put_contents('./../db/data.json', json_encode($data));
    }

}
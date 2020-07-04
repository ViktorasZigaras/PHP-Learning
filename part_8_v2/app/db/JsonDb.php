<?php
namespace App\DB;

use App\DB\DataBase;
use Ramsey\Uuid\Uuid;

class JsonDb implements DataBase {
    
    public static function create(array $customerData) : void {
        $data = $this->open();
        $data[(string) Uuid::uuid4()] = $customerData;
        $this->save($data);
    }
 
    public static function update(string $customerUUID, array $customerData) : void {
        $data = $this->open();
        $data[$customerUUID] = $customerData;
        $this->save($data);
    }
 
    public static function delete(string $customerUUID) : void {
        $data = $this->open();
        unset($data[$customerUUID]);
        $this->save($data);
    }
 
    public static function show(string $customerUUID) : array {
        $data = $this->open();
        return $data[$customerUUID];
    }
    
    public static function showAll() : array {
        $data = $this->open();
        return $data;
    }

    private function open() : array {
        if (!file_exists('./../db/data.json')) file_put_contents('./../db/data.json', json_encode([]));
        return json_decode(file_get_contents('./../db/data.json'), 1);
    }

    private function save(array $data = []) : void {
        file_put_contents('./../db/data.json', json_encode($data));
    }

}
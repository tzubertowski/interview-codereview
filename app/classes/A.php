<?php

namespace Lenstore\classes;

use Illuminate\Support\Collection;
use mysqli;

class A
{
    const SERVER = 'db';
    private const USERNAME = 'root';
    const PASSWORD = 'example';

    private static function delete_Order($conn, string $orderId)
    {
        $result = $conn->query("
            DELETE FROM orders WHERE orderId = {$orderId}"
        );
        if (!$result) {
            throw new \Exception(
                "could not remove the order"
            );
        }

        return $result;
    }

    function fcnA($file_name): void
    {
        $removed = new Collection();
        if (($h = fopen($file_name, "r")) !== FALSE) {
            while (($data = fgetcsv($h, 1000, ",")) !== FALSE) {
                $conn = new mysqli(self::SERVER, self::USERNAME, self::PASSWORD);
                $deletedId = self::delete_Order($conn, $data[0]);
                $removed->add($deletedId);
            }
            fclose($h);
        }

        var_dump("Removed: " . json_encode($removed->toArray()));
    }
}

<?php
namespace App\Imports;

use App\Order;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    public function model(array $row)
    {
        return new Order([
            'name' => $row[0],
            'genres' => $row[1],
            'author' => $row[2],
            'cost' => $row[3],
            'score' => 0
        ]);
    }
}
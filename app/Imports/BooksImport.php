<?php
namespace App\Imports;

use App\Tmp;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    public function model(array $row)
    {
        return new Tmp([
            'name' => $row[0],
            'genres' => $row[1],
            'author' => $row[2],
            'cost' => $row[3]
        ]);
    }
}
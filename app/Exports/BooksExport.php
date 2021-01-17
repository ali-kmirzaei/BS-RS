<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksExport implements FromCollection {
    private $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function collection()
    {
        return Users::whereYear('created_at', $this->year)->get();
    }
}
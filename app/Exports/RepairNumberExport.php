<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class RepairNumberExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $query;
    public function __construct($query)
    {
        $this->query=$query;
    }
    public function collection()
    {


        return   $this->query;
    }
}

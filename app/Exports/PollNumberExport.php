<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class PollNumberExport implements FromArray
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

    }

    public function array(): array
    {
        $ar=[    [' mobile'],];

        foreach ($this->query as $query){
            $mobile=array();
            $mobile[]=  $query->user->mobile;;
            $ar[]=$mobile;
        }



        return  $ar;



        // TODO: Implement array() method.
    }
}

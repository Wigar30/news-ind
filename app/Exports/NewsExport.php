<?php

namespace App\Exports;

use App\Models\NewsInd;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NewsInd::all()->take(20);
    }
}

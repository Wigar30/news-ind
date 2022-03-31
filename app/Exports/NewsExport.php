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

        if(request('from') && request('to')) {
            // $berita->where('title', 'like', '%'.request('search'). '%')->orWhere('content', 'like', '%'.request('search'). '%');
            $from = request('from');
            $to = request('to');
        }
        return NewsInd::whereBetween('tanggal_berita', [$from, $to])->get();
    }
}

<?php

namespace App\Imports;

use App\Article;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ArticlesImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $articles = [];
        // dd($rows[1]);
        foreach ($rows as $row)
        {
            $articles[]= $row;
        }
        return view('dashboard');
    }
}

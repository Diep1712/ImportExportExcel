<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\RepositoryInterface;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
class ProductRepository implements RepositoryInterface
{
       public function all()
    {
        return Product::all();
    }
    public function importExcel($file)
    {
        $import = new ProductImport();
        Excel::import($import, $file);
    }

    public function exportExcel()
    {
        $export = new ProductExport();
        return Excel::download($export, 'products.xlsx');
    }


}

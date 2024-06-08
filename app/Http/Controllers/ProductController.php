<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use App\Exports\ProductExport;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();
        return view('index', compact('products'));
    }
    public function export()
    {
        $export = new ProductExport();
        return Excel::download($export, 'products.xlsx');
    }
  
   
    public function import(Request $request)
{
    $file = $request->file('excelFile');

 
    $this->productRepository->importExcel($file);

    return redirect()->route('products.index')->with('success', 'Products imported successfully.');
}

}

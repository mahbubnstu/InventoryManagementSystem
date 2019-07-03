<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('product_name', 'product_garage','product_code','buying_price','selling_price','buy_date','expire_date','cat_id','sup_id','product_route','product_image')->get();
    }

    public function export()
    {
    	return excel::download(new ProductsExport,'products.xlsx');
    }
}

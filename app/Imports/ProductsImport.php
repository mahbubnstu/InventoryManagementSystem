<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
          'product_name' => $row[2],
          'cat_id' => $row[0],
          'sup_id' => $row[1],
          'product_code' => $row[4],
          'product_garage' => $row[3],
          'product_route' => $row[5],
          'product_image' => $row[6],
          'buy_date' => $row[9],
          'expire_date' =>$row[10],
          'buying_price' => $row[7],
          'selling_price' => $row[8]
        ]);
    }
}

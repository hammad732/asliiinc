<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\RProduct;
use App\Models\DProduct;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
      //   dd($rows);
        $category_id = request()->category;
        $sub_category_id = request()->sub_category_id;

        foreach ($rows as $row)
        {
            // if($row['bar_code'] != null)
            // {
            //     $product = DProduct::create([
            //         'sub_category_id' => $sub_category_id,
            //         'item_id' => $row['bar_code'],
            //         'name' => $row['product_name'],
            //         'no_of_cases' => $row['no_of_cases_for_distributer'],
            //         'no_of_units' => $row['no_of_units_for_distributer'],
            //         'd_price' => $row['distributer_price'],
            //         'd_weight' => $row['distributor_weight'],
            //         'desc' => $row['discription'],
            //     ]);
            // }

            
            if($row['bar_code'] != null)
            {
                $product = RProduct::create([
                    'sub_category_id' => $sub_category_id,
                    'item_id' => $row['bar_code'],
                    'name' => $row['product_name'],
                    'unit' => $row['units_for_retailer'],
                    'r_price' => $row['retailer_price'],
                    'r_weight' => $row['retailer_weight'],
                    'desc' => $row['discription'],
                ]);   
            }
        }
    }
}

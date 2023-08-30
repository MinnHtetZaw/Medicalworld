<?php

namespace App\Imports;

use App\Colour;
use App\Design;
use App\Fabric;
use App\FabricCosting;
use App\Gender;
use App\Item;
use App\Size;
use App\SubCategory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FabricCostingImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)
    {

        foreach($rows as $row)
        {
            dd($row->toArray());

            $design = Design::where('design_name','Like','%'.$row['design'].'%')->first();
            // dd($design->toArray());
            $fabric = Fabric::where('fabric_name','Like','%'.$row['fabric'].'%')->first();

            $color = Colour::where('colour_name','Like','%'.$row['color'].'%')->first();
            $size = Size::where('size_name','Like','%'.$row['size'].'%')->first();
            $subcategory = SubCategory::where('subcategory_code','Like','%'.$row['subcategory_code'].'%')->first();
            $gender = Gender::whereIn('gender_name',['M/F','un'],'Like','%'.$row['gender'].'%')->first();

            if($design && $fabric && $color && $size && $row['yards'] && $row['pricing'] && $subcategory && $gender != null)
            {
                FabricCosting::create([
                    'design_id' =>$design->id,
                    'fabric_id' =>$fabric->id,
                    'color_id' =>$color->id,
                    'size_id' =>$size->id,
                    'yards' =>$row['yards'],
                    'pricing' =>$row['pricing'],
                    'subcategory_id'=>$subcategory->id,
                    'gender_id'=>$gender->id

                 ]);
                 
            }
        }
    }
}


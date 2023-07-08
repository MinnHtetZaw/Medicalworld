<?php

namespace App\Imports;

use App\Colour;
use App\Design;
use App\Fabric;
use App\FabricCosting;
use App\Item;
use App\Size;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FabricCostingImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)
    {

        foreach($rows as $row)
        {

            $design = Design::where('design_name','Like','%'.$row['design'].'%')->first();
            $fabric = Fabric::where('fabric_name','Like','%'.$row['fabric'].'%')->first();

            $color = Colour::where('colour_name','Like','%'.$row['color'].'%')->first();
            $size = Size::where('size_name','Like','%'.$row['size'].'%')->first();

            if($design && $fabric && $color && $size && $row['yards'] && $row['pricing'] != null)
            {
                FabricCosting::create([
                    'design_id' => $design->id,
                    'fabric_id' =>$fabric->id,
                    'color_id' =>$color->id,
                    'size_id' =>$size->id,
                    'yards' =>$row['yards'],
                    'pricing' =>$row['pricing'],
                 ]);
            }
        }
    }
}


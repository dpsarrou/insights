<?php
/**
 * Created by PhpStorm.
 * User: dimitrios
 * Date: 03/07/15
 * Time: 14:29
 */

namespace Insights\Models;


use Illuminate\Database\Eloquent\Model;

class MapData extends Model
{

    public static function all($columns = ['*'])
    {
        return file_get_contents('data/mock_map_data.json');
    }

    public static function generateMockData()
    {
        $random = mt_rand(0, 40);
        $data = [
            "geometry"=>[
                "type"=>"Point",
                "coordinates"=>[-16.336521490434635 + $random, 48.813858069300295 + $random]
            ],
            "type"=>"Feature",
            "properties"=>[]
        ];
        return $data;
    }

}
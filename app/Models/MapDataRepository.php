<?php
/**
 * Created by PhpStorm.
 * User: dimitrios
 * Date: 03/07/15
 * Time: 14:30
 */

namespace Insights\Models;


class MapDataRepository
{

    public function all()
    {
        return MapData::all();
    }

    public function mock()
    {
        return MapData::generateMockData();
    }

}
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
   
        $coordinates = [
            [52.3702157, 4.895167899999933],
            [37.983917, 23.729359899999963],
            [3.751667, 24.870832999999948],
            [38.4284603, 20.676487700000052],
            [52.3702157, 4.895167899999933],
            [-38.416097, -63.616671999999994]
        ];
        shuffle($coordinates);
        $coordinate = [$coordinates[0][1], $coordinates[0][0]];

        $candidates = [
            ["name"=>'Stef'],
            ["name"=>'Alexandra'],
            ["name"=>'Leonard'],
            ["name"=>'Complainer']
        ];
        shuffle($candidates);
        $candidate = $candidates[0];

        $departments = [
            ["name"=>'Fish Department'],
            ["name"=>'Foosball design'],
            ["name"=>'Complains'],
            ["name"=>'Sales and bullshit bingo'],
            ["name"=>'Project tyrants'],
        ];
        shuffle($departments);
        $department = $departments[0];

        $vacancies = [
            ["name"=>'Beer bottle opener', 'url'=>'https://workingatbooking.com/vacancies/perl-developer-2'],
            ["name"=>'Annoyer', 'url'=>'https://workingatbooking.com/vacancies/perl-developer-2'],
            ["name"=>'Event organizer', 'url'=>'https://workingatbooking.com/vacancies/perl-developer-2'],
            ["name"=>'No-life developer', 'url'=>'https://workingatbooking.com/vacancies/perl-developer-2'],
        ];
        shuffle($vacancies);
        $vacancy = $vacancies[0];

        $locations = [
            'London', 'Your room', 'The beach'
        ];
        shuffle($locations);
        $location = $locations[0];

        $data = [
            "geometry"=>[
                "type"=>"Point",
                "coordinates"=>$coordinate
            ],
            "type"=>"Feature",
            "properties"=>[],
            "application"=>[
                "timestamp"=>date('d-m-Y H:i:s'),
                "vacancy"=>$vacancy,
                "candidate"=>$candidate,
                "department"=>$department
            ]
        ];
        return $data;
    }

}
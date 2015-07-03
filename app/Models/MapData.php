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
        ];
        shuffle($departments);
        $department = $departments[0];

        $vacancies = [
            ["name"=>'Beer bottle opener', 'url'=>'https://workingatbooking.com/vacancies/perl-developer-2'],
            ["name"=>'Annoyer', 'url'=>'https://workingatbooking.com/vacancies/perl-developer-2'],
            ["name"=>'Event organizer', 'url'=>'https://workingatbooking.com/vacancies/perl-developer-2'],
            ["name"=>'No-life developer', 'url'=>'https://workingatbooking.com/vacancies/perl-developer-2']
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
                "coordinates"=>[-16.336521490434635 + $random, 48.813858069300295 + $random]
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
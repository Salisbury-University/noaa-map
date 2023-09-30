<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddNamesToGridTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("grid")->where("gridID","01a")->update(["name"=>"Vermont"]);
        DB::table("grid")->where("gridID","03")->update(["name"=>"New York"]);
        DB::table("grid")->where("gridID","06")->update(["name"=>"Charlotte"]);
        DB::table("grid")->where("gridID","07")->update(["name"=>"Jacksonville"]);
        DB::table("grid")->where("gridID","08")->update(["name"=>"Bahamas"]);
        DB::table("grid")->where("gridID","09")->update(["name"=>"Jamaica"]);
        DB::table("grid")->where("gridID","15")->update(["name"=>"Gulf of Mexico"]);
        DB::table("grid")->where("gridID","19")->update(["name"=>"Tijuana"]);
        DB::table("grid")->where("gridID","19b")->update(["name"=>"Los Angles"]);
        DB::table("grid")->where("gridID","19c")->update(["name"=>"San Jose"]);
        DB::table("grid")->where("gridID","19d")->update(["name"=>"East Pacific Ocean"]);
        DB::table("grid")->where("gridID","1b")->update(["name"=>"Mainse"]);
        DB::table("grid")->where("gridID","20a")->update(["name"=>"Southern Oregon"]);
        DB::table("grid")->where("gridID","20b")->update(["name"=>"Portlan"]);
        DB::table("grid")->where("gridID","20c")->update(["name"=>"Vancouver"]);
        DB::table("grid")->where("gridID","21")->update(["name"=>"Offshore British Colombia"]);
        DB::table("grid")->where("gridID","22a")->update(["name"=>"Prince of Wales Island"]);
        DB::table("grid")->where("gridID","22b")->update(["name"=>"Kuiu Island"]);
        DB::table("grid")->where("gridID","23a")->update(["name"=>"Sitka"]);
        DB::table("grid")->where("gridID","23b")->update(["name"=>"Juneau"]);
        DB::table("grid")->where("gridID","27")->update(["name"=>"Northen Alaska"]);
        DB::table("grid")->where("gridID","2a")->update(["name"=>"Massachusetts"]);
        DB::table("grid")->where("gridID","2b")->update(["name"=>"Boston Coast"]);
        DB::table("grid")->where("gridID","4")->update(["name"=>"Maryland"]);
        DB::table("grid")->where("gridID","5")->update(["name"=>"Virginia"]);






    }
}

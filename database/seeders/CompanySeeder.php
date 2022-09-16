<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::first();

        Company::create([
            "category_id" => $category->id,
            "name" =>  "Comercial Alex",
            "phone" =>  "5592985994452",
            "whatsapp" =>  "5592985994452",
            "email" =>  "comercial.alex@gmail.com",
            "facebook" =>  "comercial_alex",
            "instagram" =>  "comercial_alex",
            "youtube" =>  "comercial_alex",
        ]);
    }
}

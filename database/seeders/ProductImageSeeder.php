<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductImage::create([
            "product" => "biji-kopi-arabika-wanoja-extended-natural-(100gr)",
            "image" => "p-1.png"
        ]);
        ProductImage::create([
            "product" => "biji-kopi-arabika-wanoja-extended-natural-(100gr)",
            "image" => "k-1.png"
        ]);
        ProductImage::create([
            "product" => "biji-kopi-apel-manggarai-(100gr)",
            "image" => "p-2.png"
        ]);
        ProductImage::create([
            "product" => "biji-kopi-apel-manggarai-(100gr)",
            "image" => "k-2.png"
        ]);
        ProductImage::create([
            "product" => "biji-kopi-arabika-flores-tura-jaji-mewangi-(100gr)",
            "image" => "p-3.png"
        ]);
        ProductImage::create([
            "product" => "biji-kopi-arabika-flores-tura-jaji-mewangi-(100gr)",
            "image" => "k-3.png"
        ]);
        ProductImage::create([
            "product" => "biji-kopi-arabika-west-java-puntang-(100gr)",
            "image" => "p-4.png"
        ]);
        ProductImage::create([
            "product" => "biji-kopi-arabika-west-java-puntang-(100gr)",
            "image" => "k-4.png"
        ]);
        ProductImage::create([
            "product" => "biji-kopi-arabika-yellow-catura-manglayang-(100gr)",
            "image" => "p-5.png"
        ]);
        ProductImage::create([
            "product" => "biji-kopi-arabika-yellow-catura-manglayang-(100gr)",
            "image" => "k-5.png"
        ]);
        ProductImage::create([
            "product" => "biji-kopi-arabika-west-java-cibecek-(100gr)",
            "image" => "p-6.png"
        ]);
        ProductImage::create([
            "product" => "biji-kopi-arabika-west-java-cibecek-(100gr)",
            "image" => "k-6.png"
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model Factories
       /*factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/

        $categories = factory(Category::class, 5)->create();
        $categories->each(function($category){
            $product = factory(Product::class, 20)->make();
            $category->products()->saveMany($product);

            $product->each(function($product){
                $product->product_images()->saveMany(factory(ProductImage::class, 5)->make());
            });
        });
    }
}

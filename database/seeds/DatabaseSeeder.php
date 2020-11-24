<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Stores::class, 10)->create();
        factory(App\Models\User::class, 10)->create();
        factory(App\Models\FileManager::class, 10)->create();
        factory(App\Models\Addresses::class, 10)->create();
        factory(App\Models\Ads::class, 10)->create();
        factory(App\Models\AdsManager::class, 10)->create();
        factory(App\Models\BaseMenus::class, 10)->create();
        factory(App\Models\BasePages::class, 10)->create();
        factory(App\Models\ProductCategories::class, 10)->create();
        factory(App\Models\PostsCategory::class, 10)->create();
        factory(App\Models\Post::class, 10)->create();
        factory(App\Models\Comment::class, 10)->create();
        factory(App\Models\Coupons::class, 10)->create();
        factory(App\Models\FaqsCategory::class, 10)->create();
        factory(App\Models\Faq::class, 10)->create();
        factory(App\Models\HomeSlider::class, 10)->create();
        factory(App\Models\Media::class, 10)->create();
        factory(App\Models\Menus::class, 10)->create();
        factory(App\Models\Options::class, 10)->create();
        factory(App\Models\Shipping::class, 10)->create();
        factory(App\Models\Payement::class, 10)->create();
        factory(App\Models\Orders::class, 10)->create();
        factory(App\Models\Product::class, 10)->create();
        factory(App\Models\ProductReview::class, 10)->create();
        factory(App\Models\OrderDetails::class, 10)->create();
        factory(App\Models\Page::class, 10)->create();
        factory(App\Models\Setting::class, 10)->create();
        factory(App\Models\WishList::class, 10)->create();
        factory(App\Models\Slider::class, 10)->create();
        factory(App\Models\Cart::class, 10)->create();
    }
}

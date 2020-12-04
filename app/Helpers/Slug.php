<?php


namespace App\Helpers;
use App;







class Slug {

    public static function create($title, $model = 'App\Models\User', $id = 0)
    {
        // Normalize the title
        $slug = \Str::slug($title);
        $allSlugs = self::getRelatedSlugs($slug, $model, $id);
        if(!in_array($slug, $allSlugs)) return $slug;

        for ($i = 1; $i <= 100; $i++) {
            if(!in_array($slug.'-'.$i, $allSlugs)) return $slug.'-'.$i;
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected static function getRelatedSlugs($slug, $model, $id = 0)
    {
        return app($model)::select('slug')->where('slug', 'like', $slug.'%')->where('id', '<>', $id)->pluck('slug')->all();
    }
}

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/import-news', function () {
    $items = DB::table('production')
        ->select('*')
        ->join('category_production', 'production.id', '=', 'category_production.production_id')
        ->orderBy('id', 'desc')
        ->limit(10) //for testing
        ->get();
    $places = DB::table('places')
        ->get();
    foreach ($items as $item) {
        $title = [
            'ka' => $item->title_ka,
            'en' => $item->title_en,
        ];
        $description = [
            'ka' => $item->text_ka,
            'en' => $item->text_en,
        ];
        $publishDate = new DateTime($item->date . ' ' . $item->time);
        $category_id = null;
        if (empty($item->categories_id)){
            $category_id = $item->category_id;
        }else{
            $category_id = $item->categories_id;
        }
        $author_id = null;
        if (!empty($item->creator_id)){
            $author_id = $item->creator_id;
        }
        $formattedPublishDate = $publishDate->format('Y-m-d H:i:s');
        $new_news = \App\Models\News::create([
            'title' => $title,
            'description' => $description,
            'slug' => $item->slug,
            'status' => $item->status,
            'author_id' => $author_id,
            'views' => $item->views,
            'publish_date' => $formattedPublishDate,
        ]);
        if ($item->popular) {
            $popular_place = $places->where('id', 1)->first();
            $new_news->places()->attach($popular_place->id);
        }
        if ($item->newest) {
            $newest_place = $places->where('id',  2)->first();
            $new_news->places()->attach($newest_place->id);
        }
        if(!is_null($category_id)){
            $new_news->categories()->attach($category_id);
        }
    }

});

/*

Route::get('/import-categories', function () {
    $categories = DB::table('categories_live')
        ->orderBy('sort', 'desc')
        ->get();
    foreach ($categories as $category) {
        $hidden = intval(!$category->main);
        $parent = Category::create([
            "id" => $category->id,
            "title" => [
                "ka" => $category->title_ka,
                "en" => $category->title_en
            ],
            "slug" => str()->slug($category->title_en),
            "description" => [
                "ka" => $category->title_ka . " category description",
                "en" => $category->title_en . " category description"
            ],
            "hidden" => $hidden,
            "status" => true,
            "sort" => $category->sort,
        ]);
    }

    dd($categories);
});
 * */

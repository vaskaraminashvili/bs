<?php

namespace App\Services;

use App\Enums\NewsStatus;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class NewsImportService
{
    public function __construct()
    {
    }

    public function import(){
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
//        no need to search category. from seeded categories where inserted with same ID as it was on LIVE/OLD
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
                'status' => $item->status == 1 ? NewsStatus::Active : NewsStatus::NotActive,
                'author_id' => $author_id,
                'views' => $item->views,
                'publish_date' => $formattedPublishDate,
            ]);
            if ($item->popular) {
                $popular_place = $places->where('id', 1)->first();
                $new_news->places()->syncWithoutDetaching($popular_place->id);
            }
            if ($item->newest) {
                $newest_place = $places->where('id',  2)->first();
                $new_news->places()->syncWithoutDetaching($newest_place->id);
            }
            if(!is_null($category_id)){
                $new_news->categories()->syncWithoutDetaching($category_id);
            }
            $image_base_url = 'https://www.businessinsider.ge/img/product/'.$item->image;
            $this->downloadImage($new_news, $image_base_url);

        }
    }

    public function downloadImage($model, $url): void
    {
        try {
            // Check if the URL is reachable
            $response = Http::head($url);

            if ($response->ok()) {
                // Add the image to the model's media library
                $model->addMediaFromUrl($url)->toMediaCollection('news');
            } else {
                // URL not reachable
                info("URL not reachable: {$url}");
            }
        } catch (\Exception $e) {
            // Log the exception and continue
            info("Failed to process URL: {$url}. Error: " . $e->getMessage());
        }
    }
}

<?php

namespace App\Service;
use Illuminate\Support\Facades\Http;
use App\Models\Article;
use App\Jobs\GetNewsJob;


/**
 *
 */
class PolygonService
{
  protected $limit;

  public function callApi($ticker, $limit)
  {
    $response = Http::get(config('services.polygon.url') .'reference/news' ,
      [ 'ticker' => $ticker,
        'order' => 'desc',
        'limit' => $limit,
        'sort' => 'published_utc',
        'apiKey' => config('services.polygon.key'),
      ]);
      return $response->json()['results'];
  }

  public function getNews($ticker=NULL, $limit)
  {
    $news = $this->callApi($ticker, $limit);

    foreach($news as $news){
      foreach ($news['tickers'] as $key => $v) {
        if (isset($news['description'])) {
          $article = Article::create([
            'tickers' => $news['tickers'][$key],
            'publisher_name' => $news['publisher']['name'],
            'title' => $news['title'],
            'author' => $news['author'],
            'article_url' => $news['article_url'],
            'image_url' => $news['image_url'],
            'description' => $news['description'],
            'published_utc' => $news['published_utc'],
          ]);
          GetNewsJob::dispatch($article);
        }else {
          continue;
        }
      }
    }
  }
}

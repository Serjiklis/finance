<?php

namespace App;
use Illuminate\Support\Facades\Http;

/**
 *
 */
class NasdaqService
{
  public function callApi($id='SOLAR_CAP_POL')
  {

    $response = Http::get(config('services.nasdaq.url') ."datasets/BP/{$id}.json" ,
      [ 'start_date'=>'2018-12-31',
        'end_date'=>'2020-12-31',
        'api_key'=>config('services.nasdaq.key'),
      ]);

     return $response->json()['dataset'] ? $response->json()['dataset'] : null;
  }

  public function getDataApi()
  {

    $solars = $this->callApi();
    foreach ($solars['data'] as $solar) {
      dump($solar[0]);
    }



  }
}

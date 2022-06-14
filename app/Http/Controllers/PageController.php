<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function welcome()
    {
      $articles = Article::paginate(15);

      //dd($article);
      return view('welcome', compact('articles'));
    }
}

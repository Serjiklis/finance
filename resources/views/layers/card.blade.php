<!-- Card Block -->
<div class="flex-1 p-3 md:py-[35]">
  <div class="space-y-2 md:space-y-6">
    @foreach ($articles as $article)
    <div class="card card-side bg-base-200 shadow-xl">
      <figure>
        <img
          src="{{$article->image_url}}"
          alt=""
        />
      </figure>
      <div class="card-body">
        <h2 class="card-title">{{$article->title}}</h2>
        <div class="justify-start">
          <button class="btn btn-xs btn-primary">{{$article->tickers}}</button>
          <a class="btn btn-xs btn-secondary" href="{{$article->article_url}}">Read</a>
        </div>
        <p>
          {{$article->description}}
        </p>
      </div>
    </div>
    @endforeach


      <!-- Pagination -->
      {{$articles->links()}}
      <!-- End Pagination -->



  </div>
</div>
  <!-- End Card Block -->

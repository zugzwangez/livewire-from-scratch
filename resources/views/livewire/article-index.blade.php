<div class="m-auto lg:w-1/2">

    @foreach ($articles as $article)
        <div class="my-2 p-2 bg-black text-white rounded-lg" wire:key="{{$article->id}}">
            <a href="/articles/{{$article->id}}"><h2 class="text-xl mb-2 text-orange-600">{{ $article->title }}</h2></a>
            <p class="text-md">{{ str($article->content)->words(25) }}</p>
        </div>
    @endforeach

</div>

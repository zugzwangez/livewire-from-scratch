<div class="m-auto lg:w-1/2">

    <div wire:offline>
        You are offline
    </div>

    @foreach ($articles as $article)
        <div class="my-2 p-2 bg-black text-white rounded-lg" wire:key="{{$article->id}}">
            
            <h2 class="text-xl mb-2 text-orange-600 hover:text-orange-400"
                wire:offline.class.remove="text-orange-600 hover:text-orange-400"
            >
                <a href="/articles/{{$article->id}}">{{ $article->title }}</a>
            </h2>
            <p class="text-md">{{ str($article->content)->words(25) }}</p>

        </div>
    @endforeach

</div>

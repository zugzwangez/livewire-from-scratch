<div class="{{ $show ? 'block' : 'hidden'}}">
    <div class="mt-2 absolute border rounded-lg p-4 bg-black text-white border-orange-400">
        
        {{-- We do not need it, because we can clear the results clicking on the body, the app.blade trigger the event --}}
        {{-- <div class="absolute top-0 right-0 pt-1 pr-3">
            <button type="button"
            wire:click="dispatch('search:clear-results')"
            >X</button>
        </div> --}}

        <h1 class="text-yellow-400 pt-2"> {{ count($results) != 0 ? 'Found (' . count($results) . ') results.' : 'No results Found.'}}</h1>
        @foreach($results as $key=>$result)
            <div class="pt-2" wire:key="{{$result->id}}">
                <a wire:navigate href="/articles/{{$result->id}}" class="hover:text-orange-400">{{$key+1 . ' - ' . $result->title}}</a>
            </div>
        @endforeach

    </div> 
</div>

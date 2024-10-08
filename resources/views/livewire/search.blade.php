<div>

    <form>

        <div class="mt-2">
            
            <input 
                type="text" 
                class="w-9/12 p-4 my-4 border rounded-lg bg-zinc-300 text-white"            
                wire:model.live.debounce="searchText"
                placeholder="Search"
            >

            <button 
                class="text-white font-lg rounded-lg p-4 bg-red-600 disabled:bg-red-300"
                wire:click.prevent="clear()"
                {{ empty($searchText) ? 'disabled' : ''}}
            >
                Clear
            </button>

        </div>

    </form>

    @if (!empty($results))
    <div class="my-4 w-9/12 rounded-lg p-4 bg-black text-white">
        <h1 class="text-yellow-400"> {{ count($results) != 0 ? 'Found (' . count($results) . ') results.' : 'No results Found.'}}</h1>
        @foreach($results as $key=>$result)
            <div class="pt-2">
                {{$key+1 . ' - ' . $result->title}}
            </div>
        @endforeach
    </div>       
    @endif


</div>

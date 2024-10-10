<div>

    <form>

        <div class="mt-2">
            
            <input 
                type="text" 
                class="w-9/12 p-4 mt-4 border rounded-lg bg-zinc-300 text-white"            
                wire:model.live.debounce="searchText"
                placeholder="{{$placeholder}}"
            >

            {{-- Instead of a button, use events to clear the results --}}
            {{-- <button 
                class="text-white font-lg rounded-lg p-4 bg-red-600 disabled:bg-red-300"
                wire:click.prevent="clear()"
                {{ empty($searchText) ? 'disabled' : ''}}
            >
                Clear
            </button> --}}

        </div>

    </form>

    {{-- @if (!empty($results)) --}}
        <livewire:search-results :results="$results" :show="!empty($searchText)">      
    {{-- @endif --}}


</div>

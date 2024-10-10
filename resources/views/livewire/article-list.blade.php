<div class="m-auto lg:w-1/2 mb-4">
    
    <div class="mb-3 flex justify-between items-center">
        <a 
            href="/dashboard/articles/create"
            class="text-white bg-orange-600 hover:bg-orange-400 rounded-lg p-2"
            wire:navigate
        >
        Create Article
        </a>
        {{-- <livewire:published-count lazy /> --}}
        <div class="flex justify-start items-center gap-2">
            <button @class([
                'text-gray-200 p-2 hover:bg-blue-900 rounded-sm',
                'bg-gray-700' => $showOnlyPublished,
                'bg-blue-700' => !$showOnlyPublished,
            ])            
                wire:click="showAllArticles(true)"
            >
                Show All
            </button>
            <button @class([
                'text-gray-200 p-2 hover:bg-blue-900 rounded-sm',
                'bg-gray-700' => !$showOnlyPublished,
                'bg-blue-700' => $showOnlyPublished,
            ])            
                wire:click="showAllArticles(false)"
            >
                Show Published (<livewire:published-count lazy placeholder-text="loading..." />)
            </button>
        </div>
    </div>
    @if (session('status'))
        <div class="text-white bg-green-600 rounded-lg p-2">{{session('status')}}</div>
    @endif
    <div class="my-2">
        {{$articles->links()}}
    </div>    
    <table class="w-full">
        <thead class="text-xs uppercase bg-zinc-300">
            <tr>
                <th class="p-2">Title</th>
                <th class="p-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr wire:key="{{$article->id}}" class="bg-zinc-400 text-white border-b border-zinc-600">
                <td class="p-2">{{$article->title}}</td>
                <td class="p-2">
                    <a class="bg-green-600 hover:bg-green-300 text-white rounded-sm p-2 mx-2"
                        href="/dashboard/articles/{{$article->id}}/edit"
                        wire:navigate
                    >
                        Edit
                    </a>
                    <button class="bg-red-600 hover:bg-red-300 text-white rounded-sm p-2"
                        wire:click="delete({{$article->id}})"
                        wire:confirm="Are you sure you want to delete this article?"
                    >
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{$articles->links(data: ['scrollTo' => false])}}
    </div>
</div>

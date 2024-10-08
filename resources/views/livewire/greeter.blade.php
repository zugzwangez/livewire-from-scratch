<div>

    <form wire:submit="changeGreeting()">

        <div class="mt-2">

            <select type="text" class="p-4 border rounded-lg bg-gray-300 text-black" wire:model.fill="greeting">
                <option value="Mire Usted">Mire usted</option>
                <option value="Sisisisi">Sisisisisi</option>
                <option value="Es el alcalde" selected>Es el alcalde</option>
                <option value="Un plato es un plato">Un plato es un plato</option>
            </select>

            <input id="newName" type="text" class="block w-full p-4 my-4 border rounded-lg"
                wire:model.change="name">

            @error('name')
                <div class="my-2 bg-red-400">
                    {{$message}}
                </div>    
            @enderror

            <button type="submit" class="text-black font-lg rounded-lg p-4 bg-zinc-200">
                Greetings
            </button>

        </div>

    </form>

    @if ($greetingMessage != '')
        <div class="bg-yellow-500 text-black p-2 mt-4">
            {{ $greetingMessage }}
        </div>
    @endif


</div>

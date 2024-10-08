<div>

<div>
    Mire usted, {{$name}}
</div>

<form 
    wire:submit="changeName(document.querySelector('#newName').value)"
>
    <div class="mt-2">


        <input 
            id="newName"
            type="text" 
            class="block w-full p-4 my-4 border rounded-lg"
        >

        <button
            type="submit"
            class="text-red-400 font-lg rounded-lg p-4 bg-zinc-200"
        >
            Greetings
        </button>


    </div>

</form>

</div>
<div class="p-5 select-none">
    <div class="flex items-center justify-between pb-3">
        <h3 class="text-lg font-semibold">Settings</h3>
        <button wire:click="close" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
    </div>

    <div class="flex flex-col gap-2">
        <label class="w-full space-y-0.5">
            <span class="text-sm text-slate-600">How would you like to be called?</span>
            <input type="text" wire:model="name" placeholder="Name" class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
        </label>
    </div>
</div>


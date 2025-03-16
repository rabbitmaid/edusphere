<div x-data="{ message: '', show: false }" x-on:saved.window="message = 'Saved!'; show = true; setTimeout(() => show = false, 3000)">
    <div x-show="show" class="mt-2 text-green-500">✔ Saved!</div>
</div>
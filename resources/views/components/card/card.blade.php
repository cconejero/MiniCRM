<div
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 bg-white rounded-xl shadow flex items-center items-end">
        {{ $slot }}
    </div>
</div>

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-amber-400
    dark:bg-amber-400 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800
    dark:active:text-amber-400 uppercase tracking-widest hover:bg-amber-300 dark:hover:bg-amber-300 focus:bg-amber-300
    dark:focus:bg-amber-300 dark:active:bg-[#161615] focus:outline-none focus:ring-2 focus:ring-amber-400
    focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
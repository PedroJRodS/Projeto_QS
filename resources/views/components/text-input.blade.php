@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'transition-all duration-200 border-2 border-gray-300 dark:bg-[#161615]
focus:dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm p-1']) }}>
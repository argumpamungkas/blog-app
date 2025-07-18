<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-green-500 dark:hover:bg-green-700 dark:focus:bg-green-700 dark:active:bg-gray-900 dark:focus:ring-green-300 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

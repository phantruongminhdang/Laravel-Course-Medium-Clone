<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 justify-center">
    <li class="me-2">
        <a href="#" class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg active" aria-current="page">All</a>
    </li>
    @forelse ($categories as $category)
        <li>
            <a class="inline-block px-4 py-2 text-gray-400 cursor-not-allowed dark:text-gray-500">
                {{ $category->name }}</a>
        </li>
    @empty
        {{ $slot }}
    @endforelse
</ul>
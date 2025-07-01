<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-2xl mb-4">{{ $post->title }}</h1>

                {{-- User Avatar Section --}}
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" class="w-12 h-12" />
                    <div>
                        <div class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}"
                                class="text-gray-800 font-semibold hover:underline">
                                {{ $post->user->name }}
                            </a>
                            <a href="#" class="text-emerald-500">Follow</a>
                        </div>
                        <div class="flex gap-2 text-sm text-gray-600">
                            <span class="">
                                {{ $post->readTime() }} min read
                            </span>
                            {{-- <span>
                                {{ $post->created_at->diffForHumans() }}
                            </span> --}}
                            &middot;
                            <span>
                                {{ $post->created_at->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
                {{-- User Avatar Section --}}

                {{-- Clap Section --}}
                <x-clap-button />
                {{-- Clap Section --}}

                {{-- Content Section --}}
                <div class="mt-8">
                    {{-- If the post has an image, display it --}}
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full object-cover ">

                    <div class="mt-4">
                        {{ $post->content }}
                    </div>
                </div>
                {{-- Content Section --}}

                <div class="mt-8">
                    <span class="px-4 py-2 bg-gray-200 rounded-xl">
                        {{ $post->category->name }}
                    </span>
                </div>

                {{-- Clap Section --}}
                <x-clap-button />
                {{-- Clap Section --}}

            </div>
        </div>
    </div>
</x-app-layout>
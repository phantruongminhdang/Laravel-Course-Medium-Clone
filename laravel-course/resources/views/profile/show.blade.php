<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex">
                    <div class="flex-1 pr-8">
                        <h1 class="text-5xl">
                            {{ $user->name }}
                        </h1>

                        <div class="mt-8">
                            @forelse ($posts as $post)
                                <x-post-item :post="$post"></x-post-item>
                            @empty
                                <div class="text-center text-gray-400 py-16">
                                    No posts found.
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <x-follow-ctr :user="$user">
                        {{--
                        <div x-data="{ isFollowing:{{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
                        <x-user-avatar :user=" $user" size="w-16 h-16" />
                        {{-- <h2 class="text-2xl font-semibold mb-4">{{ $user->name }}'s Profile</h2> --}}
                        <h3> {{ $user->name }}</h3>
                        <p class="text-gray-500"> <span x-text="followersCount"></span> followers</p>
                        <p> {{ $user->bio }}</p>
                        @if (auth()->user() && auth()->user()->id !== $user->id)
                            <div class="mt-4">
                                <button @click="follow()" class="rounded-full px-4 py-2 text-white"
                                    x-text="isFollowing ? 'Unfollow' : 'Follow'"
                                    :class="isFollowing ? 'bg-red-600' : 'bg-emerald-600'">
                                    {{-- Follow --}}
                                </button>
                            </div>
                        @endif
                    </x-follow-ctr>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
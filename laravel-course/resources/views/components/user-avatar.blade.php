@props(['user', 'size' => 'w-12 h-12'])

{{-- User Avatar Component --}}
{{-- Displays the user's avatar image or a default dummy avatar if none is set --}}
{{-- Usage: <x-user-avatar :user="$user" class="w-12 h-12" /> --}}

@if($user->image)
    <img class="{{ $size }} rounded-full" src="{{ $user->imageUrl() }}" alt="{{ $user->name }}'s avatar">
@else
    <img class="{{ $size }} rounded-full"
        src="https://static.everypixel.com/ep-pixabay/0329/8099/0858/84037/3298099085884037069-head.png" alt="Dummy Avatar">
@endif
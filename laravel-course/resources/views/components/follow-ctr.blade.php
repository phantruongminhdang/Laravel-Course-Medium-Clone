@props(['user'])

<div {{ $attributes }} x-data="{ 
                        isFollowing:{{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
                        followersCount: {{ $user->followers()->count() }},
                        follow(){
                            axios.post('/follow/{{ $user->id }}').then(res => {
                                this.isFollowing = !this.isFollowing;
                                this.followersCount = res.data.followers;
                            }).catch(error => {
                                console.log('Error following/unfollowing:', error);
                            });
                        }
                        }" class="w-[320px] border-l px-8">
    {{ $slot }}

</div>
<div class="card">
    <div class="card-body">
        <div class="media">
            <div class="mini-featured-image mr-3" style="background-image: url('{{ public_upload_path($user->profile_image) }}');"></div>
            <div class="media-body">
                <h5 class="mt-0">{{ $user->first_name }} {{ $user->last_name }}</h5>
                <p>
                    <!-- Add content -->
                </p>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.user', [ 'user' => $user->slug ]) }}">Read posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.profile', [ 'user' => $user->slug ]) }}">See profile</a>
                    </li>

                    @subscribed($user)

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.unsubscribe', [ 'user' => $user->slug ]) }}">Unsubscribe</a>
                        </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.subscribe', [ 'user' => $user->slug ]) }}">Subscribe</a>
                        </li>

                    @endsubscribed

                </ul>
            </div>
        </div>
    </div>
</div>

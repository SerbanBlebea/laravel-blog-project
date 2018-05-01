<!-- $sidebar_nav is passed from the ViewComposerServiceProvider -->
<div class="nav flex-column nav-pills">
    @foreach($sidebar_nav as $item)
        <a class="nav-link text-capitalize {{ (Request::segment(2) == $item['name']) ? 'active' : '' }}"
           href="{{ route( $item['route'], $item['params'] ) }}">{{ $item['name'] }}</a>
    @endforeach
</div>

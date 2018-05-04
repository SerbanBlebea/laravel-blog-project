<div class="card">
    <a href="{{ route('blog.category', [ 'category' => $category->slug ]) }}">
        <img class="card-img-top" src="https://s3-img.pixpa.com/local/800/dummy-image.jpg" alt="Card image cap">
    </a>
    <div class="card-body">
        <h5 class="card-title">{{ $category->name }}</h5>
        <p class="card-text">{{ $category->shortDescription() }}</p>
    </div>
</div>
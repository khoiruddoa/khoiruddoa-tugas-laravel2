@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">Post</h1>
    <div class="d-flex flex-row mb-3 justify-content-start"><a class="btn btn-primary" href="/dashboard" role="button">Create
            Post</a>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                    <input type="text" class="form-control" placeholder="Search by title" name="search"
                        value="{{ request('search') }}">
                </div>
            </form>

        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="max-height:400px; overflow:hidden;">
                    <img src="{{ asset('image/' . $posts[0]->image) }}" class="img-fluid mt-2"
                        alt="{{ $posts[0]->category->name }}">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                    alt="{{ $posts[0]->category->name }}">
            @endif
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                        {{ $posts[0]->title }}</a></h3>

                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <p class="card-text"><small class="text-muted">Last updated
                        {{ $posts[0]->created_at->diffForHumans() }}</small></p>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary"> read more</a>
            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 18rem;">
                            <div class="position-absolute px-3 py-2 text-white"><a
                                    href="/posts?category={{ $post->category->slug }}"
                                    class="text-white text-decoration-none">{{ $post->category->name }}</a>
                            </div>
                            @if ($post->image)
                                <img src="{{ asset('image/' . $post->image) }}" class="img-fluid"
                                    alt="{{ $post->category->name }}">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top"
                            alt="{{ $post->category->name }}">
                @endif

                <div class="card-body">
                    <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                            {{ $post->title }}</a></h5>
                    <h6 class="card-title">{{ $post->category->name }}</h6>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none " class="btn btn-primary"> read
                        more...</a>

                    <p class="card-text"><small class="text-muted">Last updated
                            {{ $post->created_at->diffForHumans() }}</small></p>
                </div>
            </div>

        </div>
    @endforeach
    </div>
    </div>
@else
    <p class="text-center fs-4">No Post Found.</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection

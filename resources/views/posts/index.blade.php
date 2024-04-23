<x-layouts.main xmlns:x-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Blog
    </x-slot:title>

    <x-page-header>
        Blog
    </x-page-header>

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row pb-3">
                        @foreach($posts as $post)
                            <div class="col-lg-6 mb-4">
                                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                    <img class="img-fluid" src="{{ asset('storage/'.$post->photo) }}" alt="">
                                    <a class="blog-overlay text-decoration-none" href="{{ route('posts.show', ['post' => $post -> id]) }}">
                                        <h5 class="text-white mb-3">{{ $post -> title }}</h5>
                                        <p class="text-primary m-0">{{ $post -> created_at }}</p>
                                    </a>
                                </div>
                                <div class="d-flex mb-2">
                                    @foreach($post->tags as $tag)
                                        <a class="text-dark text-uppercase font-weight-medium">{{ $tag ->name }}</a>
                                        <span class="text-primary px-2">|</span>
                                    @endforeach
                                </div>
                                <div class="d-flex mb-2">
                                    <a class="text-danger text-uppercase font-weight-medium m-0">{{ $post -> category -> name }}</a>
                                </div>
                            </div>
                        @endforeach

                        {{ $posts->links() }}
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    <div class="d-flex flex-column text-center bg-dark rounded mb-5 py-5 px-4">
                        <img src="/img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                        <h3 class="text-primary mb-3">John Doe</h3>
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h3>
                        <p class="text-white m-0">Conset elitr erat vero dolor ipsum et diam, eos dolor lorem, ipsum sit no ut est  ipsum erat kasd amet elitr</p>
                    </div>

                    <!-- Search Form -->
                    <div class="mb-5">
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Keyword">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary"><i
                                            class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Categories</h3>
                        <ul class="list-group list-group-flush">
                            @foreach($categories as $category)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <a href="" class="text-decoration-none h6 m-0">{{ $category->name }}</a>
                                    <span class="badge badge-primary badge-pill">{{ $post->category->count() }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h3>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach($tags as $tag)
                                <a href="" class="btn btn-outline-primary m-1">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h3>

                        @foreach($recent_posts as $post)

                            <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                <img class="img-fluid rounded" src="{{ asset('storage/'.$post->photo) }}" style="width: 80px; height: 80px; object-fit: cover;" alt="">
                                <div class="d-flex flex-column pl-3">
                                    <a class="text-dark mb-2" href="{{ route('posts.show', ['post' => $post -> id]) }}">{{ $post->title }}</a>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

</x-layouts.main>

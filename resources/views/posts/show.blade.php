<x-layouts.main xmlns:x-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Post - {{ $post->id }}
    </x-slot:title>

    <x-page-header>
        Post - {{ $post->id }}
    </x-page-header>

    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    @auth()
                        @canany(['update', 'delete'], $post)
                            <div class="row mb-4">
                                <a class="btn btn-sum btn-outline-dark mr-2" href="{{ route('posts.edit', ['post' => $post]) }}">Edit</a>
                                <form action="{{ route('posts.destroy', ['post' => $post]) }}"
                                      method="POST"
                                      onsubmit="return confirm('Do you really want to delete the form?');">

                                    <button type="submit" class="btn btn-sum btn-outline-danger" href="">Delete</button>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        @endcanany
                    @endauth
                    <div class="mb-5">
                        <h6 class="text-primary mb-3">{{ $post -> created_at }}</h6>
                        <h1 class="mb-1">{{ $post -> title }}</h1>
                        <div class="mb-5">
                            <div class="d-flex mb-2">
                                @foreach($post->tags as $tag)
                                    <a class="text-dark text-uppercase font-weight-medium">{{ $tag->name }}</a>
                                    <span class="text-primary px-2">|</span>
                                @endforeach
                            </div>
                            <div class="d-flex mb-2">
                                <a class="text-danger text-uppercase font-weight-medium" href="">{{ $post->category->name }}</a>
                            </div>
                        </div>
                        <img class="img-fluid rounded w-100 mb-4" src="/img/carousel-1.jpg" alt="Image">
                        <p>{{ $post -> contents }}</p>
                        <h2 class="mb-4">{{ $post -> theme }}</h2>
                        <img class="img-fluid rounded w-50 float-left mr-4 mb-3" src="{{ asset('storage/'.$post->photo) }}" alt="Image">
                        <p>{{ $post -> info }}</p>
                    </div>
                    <!-- Comment List -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">{{ $post->comments()->count() }} Comments</h3>
                        @foreach($post->comments as $comment)
                            <div class="media mb-4">
                                <img src="/img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1"
                                     style="width: 45px;">
                                <div class="media-body">
                                    <h6> {{ $comment->user->name }} <small><i>{{ $comment->created_at }}</i></small></h6>
                                    <p>{{ $comment->body }}</p>
                                    <button class="btn btn-sm btn-secondary">Reply</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br></br>
                    <br></br>
                    <!-- Comment Form -->
                    <div class="bg-secondary rounded p-5">
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Leave a comment</h3>
                        @auth()
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Comment</label>
                                    <textarea name="body" cols="30" rows="5" class="form-control border-0"></textarea>
                                </div>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="form-group mb-0">
                                    <input type="submit" value="Send" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">
                                </div>
                            </form>
                        @else
                            <div>
                                If you want to comment
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                        @endauth
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    <div class="d-flex flex-column text-center bg-dark rounded mb-5 py-5 px-4">
                        <img src="/img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                        <h3 class="text-primary mb-3">{{ $post->user->name }}</h3>
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h3>
                        <p class="text-white m-0">Conset elitr erat vero dolor ipsum et diam, eos dolor lorem, ipsum sit
                            no ut est ipsum erat kasd amet elitr</p>
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

                    <!-- Recent Post -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h3>

                        @foreach($recent_posts as $post)

                            <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                <img class="img-fluid rounded" src="{{ asset('storage/'.$post->photo) }}" style="width: 80px; height: 80px; object-fit: cover;" alt="">
                                <div class="d-flex flex-column pl-3">
                                    <a class="text-dark mb-2" href="{{route('posts.show', ['post' => $post -> id])}}">{{ $post->title }}</a>
                                </div>
                            </div>

                        @endforeach

                    </div>

                    <!-- Tag Cloud -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h3>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="" class="btn btn-outline-primary m-1">Design</a>
                            <a href="" class="btn btn-outline-primary m-1">Development</a>
                            <a href="" class="btn btn-outline-primary m-1">Marketing</a>
                            <a href="" class="btn btn-outline-primary m-1">SEO</a>
                            <a href="" class="btn btn-outline-primary m-1">Writing</a>
                            <a href="" class="btn btn-outline-primary m-1">Consulting</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

</x-layouts.main>

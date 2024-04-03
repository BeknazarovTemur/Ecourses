<x-layouts.main xmlns:x-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Edit Post
    </x-slot:title>

    <x-page-header>
        Edit Post
    </x-page-header>

    <!-- Edit Start -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1>Edit Post</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form bg-secondary rounded p-5">
                    <div id="success"></div>
                    <form action="{{route('posts.update', ['post' => $post])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="control-group mb-4">
                            <input type="text" class="form-control border-0 p-4" name="title" value="{{ $post->title }}" placeholder="Title"/>
                            @error('title')
                            <p class="help-block text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="control-group mb-4">
                            <input name="photo" type="file" class="form-control border-0 p-4" id="subject" placeholder="Photo"/>
                            @error('photo')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group mb-4">
                            <textarea class="form-control border-0 py-3 px-4" rows="5" name="contents" id="contents" placeholder="Content">{{ $post->contents }}</textarea>
                            @error('contents')
                            <p class="help-block text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="control-group mb-4">
                            <input type="text" class="form-control border-0 p-4" name="theme" value="{{ $post->theme }}" placeholder="Theme"/>
                            @error('theme')
                            <p class="help-block text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="control-group mb-4">
                            <textarea class="form-control border-0 py-3 px-4" rows="5" id="info" name="info" placeholder="Information">{{ $post->info }}</textarea>
                            @error('info')
                            <p class="help-block text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-dark py-3 px-5" type="submit">SAVE</button>
                            <a href="{{ route('posts.show', ['post' => $post]) }}" class="btn btn-outline-danger py-3 px-5" >CANCEL</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit End -->

</x-layouts.main>

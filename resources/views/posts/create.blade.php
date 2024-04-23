<x-layouts.main xmlns:x-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Create Posts
    </x-slot:title>

    <x-page-header>
        Create Posts
    </x-page-header>

    <!-- Create Start -->
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1>Create Posts</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-secondary rounded p-5">
                        <div id="success"></div>
                        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="control-group mb-2">
                                <input type="text" class="form-control border-0 p-4" name="title" value="{{ old('title') }}" placeholder="Title"/>
                                @error('title')
                                    <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <label>Categories</label>
                            <div class="control-group mb-2">
                                <select name="category_id" class="rounded border-0 p-2 w-100">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label>Tags</label>
                            <div class="control-group mb-4">
                                <select name="tags[]" class="rounded border-0 p-2 w-100" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <input name="photo" type="file" class="form-control" id="subject" placeholder="Photo"/>
                                @error('photo')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="control-group mb-4">
                                <textarea class="form-control border-0 py-3 px-4" rows="5" name="contents" id="contents" placeholder="Content">{{ old('contents') }}</textarea>
                                @error('contents')
                                <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="control-group mb-4">
                                <input type="text" class="form-control border-0 p-4" name="theme" value="{{ old('theme') }}" placeholder="Theme"/>
                                @error('theme')
                                <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="control-group mb-4">
                                <textarea class="form-control border-0 py-3 px-4" rows="5" id="info" name="info" placeholder="Information">{{ old('info') }}</textarea>
                                @error('info')
                                <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">SAVE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Create End -->

</x-layouts.main>

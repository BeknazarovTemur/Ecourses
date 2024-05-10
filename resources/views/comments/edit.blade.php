<x-layouts.main>
    <x-slot:title>
        Edit Comment
    </x-slot:title>
    <form method="POST" action="{{ route('comments.update', ['comment'=>$comment]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="bg-secondary rounded p-5">
            <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Edit Comment</h3>
            <form action="">
                @csrf
                <div class="form-group">
                    <label for="message">Change Comment</label>
                    <textarea name="body" cols="0" class="form-control border-0">{{ value($comment->body) }}</textarea>
                </div>
                <input type="hidden" name="post-id" value="{{ $comment->post_id }}">
                <div class="form-group mb-0">
                    <input type="submit" value="Change" class="btn btn btn-outline-success py-md-2 px-md-4 font-weight-semi-bold">
                    <input type="button" value="Cancel" class="btn btn-outline-danger py-md-2 px-md-4 font-weight-semi-bold" onclick="history.back()">
                </div>
            </form>
        </div>
    </form>
</x-layouts.main>

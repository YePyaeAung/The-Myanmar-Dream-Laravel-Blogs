@props(['blog'])
<x-card-wrapper class="">
    <form action="/blogs/{{$blog->slug}}/comments" method="POST">
        @csrf
        <div class="mb-3">
            <textarea required class="form-control border border-0" name="body" cols="10" rows="5" placeholder="Comment Here..."></textarea>
            <x-error err="body"/>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</x-card-wrapper>
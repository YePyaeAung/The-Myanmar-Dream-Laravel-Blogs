
<x-layout>
    <x-single-blog-section :blog="$blog"/>
    {{-- Comment Section --}}
    <section class="container">
        <div class="col-md-8 mx-auto">
            @auth
            <x-comment-form :blog="$blog"/>
            @else
            <p class="text-center text-secondary m-4">Please <a href="/login">login</a> to participate in this discussion.</p>
            @endauth
        </div>
    </section>
    @if ($blog->comments->count())
        <x-comments :comments="$blog->comments()->latest()->paginate(3)"/>   
    @endif
    <x-blogs-you-may-like-section :randomBlogs="$randomBlogs"/>
</x-layout>
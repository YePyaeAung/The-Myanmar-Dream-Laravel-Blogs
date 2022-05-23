@props(['blog'])
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto text-center">
            <img
            src="{{asset("/storage/$blog->thumbnail")}}"
            width="600px"
            height="350px"
            class="card-img-top"
            alt="..."
            />
            <h3 class="my-3">{{$blog->title}}</h3>
            <p class="fs-6 text-secondary">
                <a href="/?author={{$blog->author->username}}">{{$blog->author->name}}</a>
                <span> - {{$blog->created_at->diffForHumans()}}</span>
            </p>
            <div class="tags my-3">
                <a href="/?category={{$blog->category->slug}}"><span class="badge bg-primary">{{$blog->category->name}}</span></a>
            </div>
            <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
                @csrf
                @auth
                @if (auth()->user()->isSubscribed($blog))
                    <button type="submit" class="btn btn-secondary mb-3">Unsubscribe</button>
                @else
                    <button type="submit" class="btn btn-danger mb-3">Subscribe</button>
                @endif
                @endauth
            </form>
            <p class="lh-md">
                {!!$blog->body!!}
            </p>
        </div>
    </div>
</div>
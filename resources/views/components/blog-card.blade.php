@props(['blog'])
<div class="card">
    <img
    src="{{asset("/storage/$blog->thumbnail")}}"
    width="600px"
    height="250px"
    class="card-img-top"
    alt="..."
    />
    <div class="card-body">
        <h3 class="card-title">{{$blog->title}}</h3>
        <p class="fs-6 text-secondary">
            <a href="/?username={{$blog->author->username}}{{request('search') ? '&search='.request('search') : ''}}{{request('category') ? '&category='.request('category') : ''}}">{{$blog->author->name}}</a>
            <span> - {{$blog->created_at->diffForHumans()}}</span>
        </p>
        <div class="tags my-3">
            <a href="/?category={{$blog->category->slug}}{{request('search') ? '&search='.request('search') : ''}}{{request('username') ? '&username='.request('username') : ''}}"><span class="badge bg-primary">{{$blog->category->name}}</span></a>
            {{-- <span class="badge bg-primary">Html</span>
            <span class="badge bg-secondary">Css</span>
            <span class="badge bg-success">Php</span>
            <span class="badge bg-danger">Javascript</span>
            <span class="badge bg-warning text-dark">Frontend</span> --}}
        </div>
        <p class="card-text">
            {{$blog->intro}}
        </p>
        <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
    </div>
</div>
<x-admin-layout>
    <x-card-wrapper>
        <div class="card-header bg-primary border border-0 mb-2"><h3 class="text-center text-white">Blogs</h3></div>
        <x-card-wrapper>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Intro</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td><a href="/blogs/{{$blog->slug}}" class="text-decoration-none">{{$blog->title}}</a></td>
                            <td>{{$blog->intro}}</td>
                            <td>
                                <a href="/admin/blogs/{{$blog->slug}}/edit" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/blogs/{{$blog->slug}}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-card-wrapper>
        {{$blogs->links()}}
    </x-card-wrapper>
</x-admin-layout>
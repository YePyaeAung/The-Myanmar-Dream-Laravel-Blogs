<x-admin-layout>
    <x-card-wrapper>
        <div class="card-header bg-primary border border-0 mb-5"><h3 class="text-center text-white">Blog Edit Form</h3></div>
        <form method="POST" action="/admin/blogs/{{$blog->slug}}/update" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" value="{{$blog->title}}"/>
            <x-form.input name="slug" value="{{$blog->slug}}"/>
            <x-form.input name="intro" value="{{$blog->intro}}"/>
            <x-form.textarea name="body" value="{{$blog->body}}"/>
            <x-form.input name="thumbnail" type="file"/>
                <x-form.form-wrapper>
                    <img
                    src="{{asset("/storage/$blog->thumbnail")}}"
                    width="200px"
                    height="130px"
                    alt="..."
                    />
                </x-form.form-wrapper>
            <x-form.select name="category" :categories="$categories" :blog="$blog"/>
            <div class="mb-3 d-flex justify-content-end">    
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </x-card-wrapper>
</x-admin-layout>
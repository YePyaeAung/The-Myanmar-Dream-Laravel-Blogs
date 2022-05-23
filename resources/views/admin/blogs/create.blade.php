<x-admin-layout>
        <x-card-wrapper>
            <div class="card-header bg-primary border border-0 mb-5"><h3 class="text-center text-white">Blog Create Form</h3></div>
            <form method="POST" action="/admin/blogs/store" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title"/>
                <x-form.input name="slug"/>
                <x-form.input name="intro"/>
                <x-form.textarea name="body"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.select name="category" :categories="$categories"/>
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </x-card-wrapper>
</x-admin-layout>
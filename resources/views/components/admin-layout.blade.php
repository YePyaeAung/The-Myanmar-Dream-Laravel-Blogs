<x-layout>
    <x-flash-message/>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <ul class="list-group mt-3">
                    <li class="list-group-item"><a href="/admin/blogs">Dashboard</a></li>
                    <li class="list-group-item"><a href="/admin/blogs/create">Blog Create Form</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                {{$slot}}
            </div>
        </div>
    </div>
</x-layout>
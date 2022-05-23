<x-layout>
    <x-flash-message/>
    @auth
        <p class="d-flex justify-content-end me-5 mt-2 text-secondary">Login as >>> {{auth()->user()->name}}</p>   
    @endauth
    <x-hero/>
    <x-blog-section :blogs="$blogs"/>
</x-layout>
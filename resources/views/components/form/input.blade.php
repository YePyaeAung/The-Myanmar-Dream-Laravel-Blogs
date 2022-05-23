@props(['name', 'type' => 'text', 'value' => ''])
<x-form.form-wrapper>
    <x-form.label :name="$name"/>
    <input type="{{$type}}" name="{{$name}}" id="{{$name}}" class="form-control" value="{{old($name, $value)}}">
    <x-error :err="$name"/>
</x-form.form-wrapper>
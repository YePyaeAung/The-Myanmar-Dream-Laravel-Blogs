@props(['name', 'value' => ''])
<x-form.form-wrapper>
    <x-form.label :name="$name"/>
    <textarea name="{{$name}}" id="{{$name}}" cols="30" rows="10" class="form-control editor">{!!old($name, $value)!!}</textarea>
    <x-error :err="$name"/>
</x-form.form-wrapper>
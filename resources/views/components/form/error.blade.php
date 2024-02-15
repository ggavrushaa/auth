@props(['name' => ''])

@error("{{$name}}")
<div class="form-error text-red-600 text-xs pt-1">
    {{ $message }}
</div>
 
@enderror
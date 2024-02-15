<form {{ $attributes }} class="form">
    @csrf
    {{$slot}}
</form>
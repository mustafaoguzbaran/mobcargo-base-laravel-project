<div>
    @php
        $value = null;
       $placeholder = null;
    @endphp
        <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <input type="{{$type ?? 'text'}}" name="{{$name}}" {{$value}} {{$placeholder}} {{$attributes}}>
</div>

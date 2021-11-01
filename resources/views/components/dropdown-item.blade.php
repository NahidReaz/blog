@props([ 'active' => false  ])

@php
  $classes = 'block flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold hover:bg-blue-300 hover:text-white';




@endphp
<a {{$attributes->merge(['class'=> $classes])}}>
    {{$slot}}</a>

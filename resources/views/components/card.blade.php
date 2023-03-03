<div {{$attributes->merge(['class'=>"bg-gray-50 border border-gray-200 rounded p-6"])}}> 
    {{-- $attributes->merge allows the class of this div to be overidden in case if the component is called to render with additional attribute--}}
    {{$slot}} {{--this component may be used to wrap blocks of code into a div--}}
    {{--
        to render the codes into this component as a prop, wrap those codes with <x-card></x-card>
        the wrapped codes outside this blade template will then be injected to $slot
    --}}
</div>

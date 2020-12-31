@props([
    'environment' => 'local', // The environment(s) in which we display the values
])

{{-- We make sure we're working with an array --}}
@php($environments = is_array($environment) ? $environment : [$environment])

@env($environments)
    <script>
        window.addEventListener('lean-debug', event => console.log(event.detail));
    </script>
@endenv

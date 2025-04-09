@include('components.header')
<body class="min-h-screen bg-dotted bg-blue-50 flex flex-col">

<div class="p-4">
  @yield('content')
</div>
@vite(['resources/css/app.css', 'resources/js/app.js'])

@include('components.footer')


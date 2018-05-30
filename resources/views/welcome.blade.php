<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>
<body>

@include('partials._nav')

<div class="container">

    <div class="container col-md-12">


        @include('partials._messages')

        @yield('content')



    </div>

</div>
@include('partials._javascript')
@yield('scripts')
</body>
</html>
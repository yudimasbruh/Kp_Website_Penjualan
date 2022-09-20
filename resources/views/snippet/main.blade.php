@include('snippet/header')
<body class="g-sidenav-show  bg-gray-100">
    @include("snippet/sidebar")

    <main class="main-content border-radius-lg mt-5 ps-5 pe-5">
        @yield("content")
    </main>
</body>
@include("snippet/footer")
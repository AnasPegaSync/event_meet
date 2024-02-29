<!DOCTYPE html>
<html lang="en">
    @include('layout.head')

    <body style="background-color: #ffffff">
        @include('layout.navbar')
        <!-- ***** Main Banner Area Start ***** -->
        <div class="main-banner">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->
        <div class="container">
            @yield('content')
        </div>
        @include('layout.footer')
        @include('layout.foot')
    </body>
</html>

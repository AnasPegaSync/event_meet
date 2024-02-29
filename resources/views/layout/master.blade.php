<!DOCTYPE html>
<html lang="en">
    @include('layout.head')

    <body style="background-color: #2a2a2a">
        @include('layout.navbar')
        <!-- ***** Main Banner Area Start ***** -->
        <div class="main-banner">
            <div class="container">
                <div class="row">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <img src="assets/images/logo.png" alt="PegaSync">
                        </div>
                    </div>
                    <div class="col-lg-10 offset-lg-1">
                        <div class="header-text">
                            <h2><em>Transforming</em> the world digitally, <em>one business</em> at at time</h2>
                        </div>
                    </div>
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
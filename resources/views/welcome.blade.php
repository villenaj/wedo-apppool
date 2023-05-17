<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/axios@0.27.0/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '') }}</title>
    <script src="{{ asset('js/login.js') }}" defer></script>


</head>
<style>
    body {
        width: 100%;
        height: 100%;
        background-image: url("{{ asset('img/welpage.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;
        overflow-x: hidden;
        /* height: 100vh;
        width: 100vw; */
    }

    #logo {
        display: block;
        scroll-margin-left: auto;
        margin-right: auto;
        max-width: 100%;
        height: 85%;
    }

    h1 {
        color: #fff;
        text-shadow: 2px 2px 2px #000000;
    }

    @media screen and (max-width: 600px) {
        .logo {
        width: 50% !important;
        height: 50% !important;
        }
    }
    #btnLogin {
        display: block;
        margin: auto;
    }
</style>

<body>
    <div class="container-fluid text-center mt-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-9 col-lg-6 col-xl-5 logo h-auto">
                <img src="{{ asset('img/wlogo.png') }}" class="ms-2 mt-4 me-3" alt="Wlogo" id="logo" width="auto"
                    height="auto">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-3">
                <form id="frmlogin">
                    {{-- <i class="fa-solid fa-circle-user" style="padding-left: 6rem; padding-right: 6rem;"> </i> --}}
                    <div
                        class="d-inline-flex flex-row align-items-start justify-content-end justify-content-lg-start mt-2">
                        <h1 class="fw-normal">Sign in</h1>
                    </div>
                    @csrf
                    <div class="text-center text-lg-end ms-3 pt-3 me-3">
                        <button type="button" id="btnMem" class="btn btn-danger shadow-lg btn-lg bg-gradient-danger"
                            style="padding-left: 6rem; padding-right: 6rem; box-shadow: 4px 4px 10px grey;"
                            data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fa-solid fa-circle-user"> </i>
                            Members</button>
                    </div>
                    <!-- <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-1">
                                <h1 class="fw-normal mb-0 me-0" style="text-align: center;">Sign up</h1>
                            </div> -->
                    <div class="text-center text-lg-end ms-3 mb-3 pt-3 me-3">
                        <a href="{{ url('applicants/dashboard') }}"><button type="button" id="btnApp"
                                class="btn btn-danger shadow-lg btn-lg bg-gradient-danger"
                                style="padding-left: 6rem; padding-right: 5.5rem; box-shadow: 4px 4px 10px grey;"><i
                                    class="fa-solid fa-circle-user"> </i> Applicants</button></a>
                    </div>
                </form>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-3 text-center text-lg-end me-4 ">
                <h3 class="text-center mb-3 mt-1" style="color:  #000000">WeDo BPO Inc. is a management consulting
                    company which
                    bridges the gap between
                    our client’s business needs and proven global resources.</h3>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        style=" background-color: #c6393970;">
        <div class="modal-dialog modal-dialog-centered text-center">
            <div class="modal-content">
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                <!-- Modal Header -->
                <div class="modal-header vertical-center text-center ">
                    <h2 class="col-11 modal-title text-center text-success">USER LOGIN</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body p-4">
                    <div class="card p-4">
                        <div class="form-floating">
                            <input type="email" name="username" class="form-control form-control-user mb-1"
                                id="username" placeholder="name@example.com" value="{{ old('username') }}" required>
                            <label for="username" class="text-muted">Email Address</label>
                            <span class="text-danger small error-text username_error"></span>
                        </div>

                        <div class="form-floating">
                            <input type="password" name="password" class="form-control form-control-user mb-3"
                                id="password" placeholder="Password" required>
                            <label for="password" class="text-muted">Password</label>
                            <span class="text-danger small error-text password_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            style="padding-left: 5rem; padding-right: 5rem; grey;"
                            class="btn btn-danger bg-gradient-danger" id="btnLogin">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>

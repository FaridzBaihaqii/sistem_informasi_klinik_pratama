<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<style>
    .bg-login{
        background-color: #98eeb1;
    }
    .bg-login:hover{
        background-color: #6cee8c;
    }
</style>

<body>
    <img src="{{ asset('gambar/color.png') }}" style="width: 100%; z-index:-999; position:absolute; height:100%;">
    <section class="h-100 gradient-form custom-background" style="z-index: 999; position:fixed; ">
        <div class="container  h-100" style="position: relative;">
            <div class="row d-flex justify-content-center align-items-center h-100" style="margin-left: 140px;">
                <div class="col-xl-10">
                    <div class="row g-0">
                        <div class="col-lg-5">
                            <div class="text-white px-4 py-6 p-md-7 mx-md-8">
                                <img src="{{ asset('gambar/bg.png') }}" style="width: 120%;">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <form method="POST">
                                    @csrf
                                    <p class="mb-4 fw-bold fs-2" style="color: #92E3A9;">Login Akun</p>
                                    <div class="form-outline mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="#92E3A9">
                                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                                </svg>
                                            </span>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username')}}" placeholder="Username" name="username" />
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="#92E3A9">
                                                    <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                                                </svg>
                                            </span>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password')}}" placeholder="Password" name="password" />
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <button type="submit" class="btn w-100 text-white p-2 fw-bold fs-5 rounded-2 bg-login">LOGIN</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<footer>
    <script type='module'>
        $('.btnLogin').on('click', function(a) {
            axios.post('auth/check', {
                username: $('#userName').val(),
                password: $('#passWord').val(),
                _token: '{{csrf_token()}}'
            }).then(function(response) {

                if (response.data.success) {
                    window.location.href = response.data.redirect_url;
                } else {
                    swal.fire('Gagal login, username atau password salah', '', 'error');
                }
            }).catch(function(error) {
                if (error.response.status === 422) {
                    swal.fire(error.response.data.message, '', 'error')
                } else {
                    swal.fire('gagal login, username/password salah')
                }
            });
        });
    </script>
</footer>

</html>
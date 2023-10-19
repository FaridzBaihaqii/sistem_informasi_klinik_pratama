<!DOCTYPE html>
<html lang="en">

<html>
<head>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <style>
        .spacer {
            margin-top: 20px;
            margin-bottom: 20px;

        }

        .tengah {
            margin-left: 25%;
            margin-top: 10%;
            width: 50%;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container spacer">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-4 tengah">
                    <form method="POST">
                        <div class="card">
                            <div class="card-header">
                                Silakan Login 
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="label">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" />
                                </div>
                                <div class="form-group">
                                    <label class="label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" />
                                    @csrf
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <script type='module'>
        $('.btnLogin').on('click', function(a){
            axios.post('auth/check', {
                username : $('#userName').val(),
                password : $('#passWord').val(),
                _token : '{{csrf_token()}}'
            }).then(function(response){

                if(response.data.success){
                    window.location.href = response.data.redirect_url;   
                }else{
                    swal.fire('Gagal login, username atau password salah', '', 'error');
                }
            }).catch(function(error){
                if(error.response.status === 422){
                    swal.fire(error.response.data.message, '', 'error')
                }else{
                    swal.fire('gagal login, username/password salah')
                }
            });
        });
    </script>
</footer>

</html>

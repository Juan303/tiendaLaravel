@extends('layouts.app')

@section('body-class', 'signup-page sidebar-collapse')


@section('content')
<div class="page-header header-filter" filter-color="purple" style="background-image: url('{{ asset('img/bg7.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-5 ml-auto mr-auto">
          <div class="card card-signup">
            <h2 class="card-title text-center">Inicio de sesion</h2>
            <div class="card-body p-0">
              <div class="row">

                <div class="col-md-10 m-auto">
                  <div class="social text-center">
                    <button class="btn btn-just-icon btn-round btn-twitter">
                      <i class="fa fa-twitter"></i>
                    </button>
                    <button class="btn btn-just-icon btn-round btn-dribbble">
                      <i class="fa fa-dribbble"></i>
                    </button>
                    <button class="btn btn-just-icon btn-round btn-facebook">
                      <i class="fa fa-facebook"> </i>
                    </button>
                    <h4> Introduce tus datos </h4>
                  </div>
                  <form class="form" method="POST" action="{{ route('login') }}">
                  {{ csrf_field() }}

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text pl-0">
                            <i class="material-icons">mail</i>
                          </span>
                        </div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email..." autofocus>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text pl-0">
                            <i class="material-icons">lock_outline</i>
                          </span>
                        </div>
                        <input id="password" placeholder="Contraseña..." type="password" class="form-control" name="password" required>
                      </div>
                    </div>
                    <div class="form-check p-0 text-center">
                      <label class="form-check-label ml-0">
                        <input class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                        Recordar sesion.
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-round">Empezar</a>
                    </div>
                    <div class="text-center">
                     <!--  <a class="btn btn-link text-danger" href="{{ route('password.request') }}">
                        ¿Has olvidado tu contraseña?
                      </a> -->
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="https://www.creative-tim.com">
                Creative Tim
              </a>
            </li>
            <li>
              <a href="https://presentation.creative-tim.com">
                About Us
              </a>
            </li>
            <li>
              <a href="https://blog.creative-tim.com">
                Blog
              </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/license">
                Licenses
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="material-icons">favorite</i> by
          <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
        </div>
      </div>
    </footer>
</div>
@endsection

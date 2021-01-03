  <nav class="navbar navbar-light bg-light justify-content-between">
    <div class="col-auto">
      <div class="row justify-content-start">
        <div class="col-auto navbar-nav">
          <a class="navbar-brand" href="{{ route('records')}}">
            <img src="/images/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            {{ __('face.listofrecords') }}
          </a>
        </div>
        <div class="col-auto navbar-nav">
          <a class="nav-item nav-link" href="{{ route('insert')}}">{{ __('face.addrecord') }}</a>
        </div>
      </div>
    </div>
    <div class="col-auto navbar-nav">
      <div class="row justify-content-end">
        <div class="col-auto navbar-nav">
          <a class="nav-item nav-link" href="{{ route('logout')}}">{{ __('face.logout') }}</a>
        </div>
      </div>
    </div>
  </nav>

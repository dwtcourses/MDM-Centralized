<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      @if(Auth::user()->role=='superAdmin')
      <li class="nav-item">
        <a class="nav-link" href="/"><i class="icon-home"></i> Dashboard </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/showMaster"><i class="icon-star"></i> Master Data</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/masterInput"><i class="icon-arrow-up-circle"></i> Master Data Input </a>
      </li>
      @endif
      @if(Auth::user()->role=='adminEreg')
      <li class="nav-item">
        <a class="nav-link" href="/{{Auth::user()->role}}/home"><i class="icon-home"></i> Dashboard </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/{{Auth::user()->role}}/showMaster"><i class="icon-star"></i> Master Data</a>
      </li>
      @endif
      @if(Auth::user()->role=='adminAsrot')
      <li class="nav-item">
        <a class="nav-link" href="/{{Auth::user()->role}}/home"><i class="icon-home"></i> Dashboard </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/{{Auth::user()->role}}/showMaster"><i class="icon-star"></i> Master Data</a>
      </li>
      @endif
      @if(Auth::user()->role=='adminEtrack')
      <li class="nav-item">
        <a class="nav-link" href="/{{Auth::user()->role}}/home"><i class="icon-home"></i> Dashboard </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/{{Auth::user()->role}}/showMaster"><i class="icon-star"></i> Master Data</a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="/history"><i class="icon-refresh"></i> Master Data History </a>
      </li>
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

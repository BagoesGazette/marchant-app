<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="index.html">Merchant App</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">MA</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
    <li class="menu-header">Merchant</li>
    <li><a class="nav-link" href="{{ route('merchant.index') }}"><i class="fas fa-users"></i> <span>Merchant</span></a></li>
    <li class="menu-header">Product</li>
    <li><a class="nav-link" href="{{ route('product.index') }}"><i class="fas fa-cubes"></i> <span>Product</span></a></li>
  </ul>     
</aside>
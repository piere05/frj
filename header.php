<?

$page = basename($_SERVER['PHP_SELF']);

if ($page!='index.php') {
$pgval='index.php';
}
?>

<!-- header area start -->
<header class="header-style-one header--sticky">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="header-style-one-wrapper">
<div class="logo-area">
<a href="index.php" class="logo">
<img class="light" src="assets/images/logo.png" alt="logo" width="200px">
<img class="dark" src="assets/images/logo.png" alt="logo" width="200px">
</a>
</div>
<nav class="main-nav-area">
<ul class="list-unstyled fluxi-desktop-menu">




<li class="menu-item"><a class="main-element fluxi-dropdown-main-element" href="<?=$pgval;?>#about">About</a>
</li>



<li class="menu-item">
<a class="main-element fluxi-dropdown-main-element" href="<?=$pgval;?>#articles">Articles</a>
</li>


<li class="menu-item">
<a class="main-element fluxi-dropdown-main-element" href="<?=$pgval;?>#blogs">Blogs</a>
</li>


<li class="menu-item fluxi-has-dropdown">
<a href="javascript:void(0);" class="fluxi-dropdown-main-element">Resources</a>

<ul class="fluxi-submenu list-unstyled menu-home">
<li class="nav-item"><a class="nav-link page" href="<?=$pgval;?>#english">English Resource</a></li>
<li class="nav-item"><a class="nav-link" href="<?=$pgval;?>#italian">Italian Resource</a></li>
<li class="nav-item"><a class="nav-link" href="<?=$pgval;?>#tamil">Tamil Resource</a></li>

</ul>

</li>


<li class="menu-item">
<a class="main-element fluxi-dropdown-main-element" href="<?=$pgval;?>#gallery">Gallery</a>
</li>



<li class="menu-item">
<a class="main-element fluxi-dropdown-main-element" href="<?=$pgval;?>#contact">Contact</a>
</li>


</ul>
</nav>
<div class="menu-btn" id="menu-btn">

<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect y="14" width="20" height="2" fill="#1F1F25"></rect>
<rect y="7" width="20" height="2" fill="#1F1F25"></rect>
<rect width="20" height="2" fill="#1F1F25"></rect>
</svg>

</div>

</div>
</div>
</div>
</div>
</header>
<?
$page = basename($_SERVER['PHP_SELF']);

if ($page!='index.php') {
$pgval='index.php';
}

?>
<div id="side-bar" class="side-bar header-two">
<button class="close-icon-menu"><i class="fa-sharp fa-thin fa-xmark"></i></button>
<!-- mobile menu area start -->
<div class="mobile-menu-main">
<nav class="nav-main mainmenu-nav mt--30">
<ul class="mainmenu metismenu" id="mobile-menu-active">

<li>
<a href="<?=$pgval;?>#about" class="main">About</a>
</li>
<li>
<a href="<?=$pgval;?>#articles" class="main">Articles</a>
</li>  <li>
<a href="<?=$pgval;?>#blogs" class="main">Blogs</a>
</li>


<li class="has-droupdown">
<a href="#" class="main" aria-expanded="false">Resources</a>
<ul class="submenu mm-collapse">
<li><a class="mobile-menu-link" href="<?=$pgval;?>#english">English Resource</a></li>
<li><a class="mobile-menu-link" href="<?=$pgval;?>#italian">Italian Resource</a></li>
<li><a class="mobile-menu-link" href="<?=$pgval;?>#tamil">Tamil Resource</a></li>

</ul>
</li>

<li>
<a href="<?=$pgval;?>#gallery" class="main">Gallery</a>
</li>

<li>
<a href="<?=$pgval;?>#contact" class="main">Contact</a>
</li>



</ul>
</nav>


</div>
<!-- mobile menu area end -->
</div>
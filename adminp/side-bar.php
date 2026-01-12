<?

$page = basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar" data-background-color="light">
<div class="sidebar-logo">
<!-- Logo Header -->
<div class="logo-header" data-background-color="light">

<a href="home.php" class="logo">
<img src="assets/img/logo.png" alt="navbar brand" class="navbar-brand" width="170px">
</a>
<div class="nav-toggle">
<button class="btn btn-toggle toggle-sidebar">
<i class="gg-menu-right"></i>
</button>
<button class="btn btn-toggle sidenav-toggler">
<i class="gg-menu-left"></i>
</button>
</div>
<button class="topbar-toggler more">
<i class="gg-more-vertical-alt"></i>
</button>

</div>
<!-- End Logo Header -->	
</div>	
<div class="sidebar-wrapper scrollbar scrollbar-inner">
<div class="sidebar-content">
<ul class="nav nav-secondary">

<li class="nav-item <? if($page=='home.php'){echo "active";}?>">
<a href="home.php">
<i class="fas fa-home"></i>
<p>Dashboard</p>
</a>
</li>


<li class="nav-item <? if($page=='list-enquiry.php'){echo "active";}?>">
<a href="list-enquiry.php">
<i class="fas fa-user"></i>
<p>Manage Enquiry</p>
</a>
</li>



<li class="nav-item <? if($page=='add-blog.php' || $page=='list-blog.php' ){echo "active";}?>">
<a data-bs-toggle="collapse" href="#base">
<i class="fas fa-layer-group"></i>
<p>Manage Blog</p>
<span class="caret"></span>
</a>
<div class="collapse <? if($page=='add-blog.php' || $page=='list-blog.php' ){echo "show";}?>" id="base">
<ul class="nav nav-collapse">
<li class="<? if($page=='add-blog.php'){echo "active";}?>">
<a href="add-blog.php">
<span class="sub-item">Add Blog</span>
</a>
</li>
<li class="<? if($page=='list-blog.php'){echo "active";}?>">
<a href="list-blog.php">
<span class="sub-item">List Blog</span>
</a>
</li>

</ul>
</div>
</li>



<li class="nav-item <? if($page=='add-resource.php' || $page=='list-resource.php' ){echo "active";}?>">
<a data-bs-toggle="collapse" href="#resource">
<i class="fas fa-layer-group"></i>
<p>Manage Resource</p>
<span class="caret"></span>
</a>
<div class="collapse <? if($page=='add-resource.php' || $page=='list-resource.php' ){echo "show";}?>" id="resource">
<ul class="nav nav-collapse">
<li class="<? if($page=='add-resource.php'){echo "active";}?>">
<a href="add-resource.php">
<span class="sub-item">Add Resource</span>
</a>
</li>
<li class="<? if($page=='list-resource.php'){echo "active";}?>">
<a href="list-resource.php">
<span class="sub-item">List Resource</span>
</a>
</li>

</ul>
</div>
</li>

<li class="nav-item <? if($page=='manage-gallery.php'){echo "active";}?>">
<a href="manage-gallery.php">
<i class="fas fa-book"></i>
<p>Manage Gallery</p>
</a>
</li>


<li class="nav-item <? if($page=='add-article.php' || $page=='list-article.php' ){echo "active";}?>">
<a data-bs-toggle="collapse" href="#italian">
<i class="fas fa-layer-group"></i>
<p>Manage Articles </p>
<span class="caret"></span>
</a>
<div class="collapse <? if($page=='add-article.php' || $page=='list-article.php' ){echo "show";}?>" id="italian">
<ul class="nav nav-collapse">
<li class="<? if($page=='add-article.php'){echo "active";}?>">
<a href="add-article.php">
<span class="sub-item">Add Articles </span>
</a>
</li>
<li class="<? if($page=='list-article.php'){echo "active";}?>">
<a href="list-article.php">
<span class="sub-item">List Articles </span>
</a>
</li>

</ul>
</div>
</li>





<li class="nav-item <? if($page=='add-faq.php' || $page=='list-faq.php' ){echo "active";}?>">
<a data-bs-toggle="collapse" href="#faq">
<i class="fas fa-layer-group"></i>
<p>Manage FAQ</p>
<span class="caret"></span>
</a>
<div class="collapse <? if($page=='add-faq.php' || $page=='list-faq.php' ){echo "show";}?>" id="faq">
<ul class="nav nav-collapse">
<li class="<? if($page=='add-faq.php'){echo "active";}?>">
<a href="add-faq.php">
<span class="sub-item">Add FAQ</span>
</a>
</li>
<li class="<? if($page=='list-faq.php'){echo "active";}?>">
<a href="list-faq.php">
<span class="sub-item">List FAQ</span>
</a>
</li>

</ul>
</div>
</li>




</ul>
</div>
</div>
</div>
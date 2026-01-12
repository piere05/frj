<?php
function pattern() {
extract($_REQUEST);
include 'forst/soft/cnt.php';
include 'overall-functions.php';


$select_blog=mysqli_query($conn,"select * from blogs");

$select_enquiry=mysqli_query($conn,"select * from enquiry");

$select_eng=mysqli_query($conn,"select * from english_res");
$select_it =mysqli_query($conn,"select * from articles");


?>


<div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <a href="list-blog.php">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">No of Blogs</p>
                          <h4 class="card-title"><?=mysqli_num_rows($select_blog)?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <a href="list-resource.php">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-info bubble-shadow-small">
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">No of Resource</p>
                          <h4 class="card-title"><?=mysqli_num_rows($select_eng)?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <a href="list-article.php">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">No of Articles</p>
                          <h4 class="card-title"><?=mysqli_num_rows($select_it)?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>
                <div class="col-sm-6 col-md-4">
                  <a href="list-enquiry.php">
                  <div class="card card-stats card-round">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-icon">
                          <div class="icon-big text-center icon-secondary bubble-shadow-small">
                            <i class="far fa-user"></i>
                          </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                          <div class="numbers">
                            <p class="card-category">No. of Enquiry</p>
                            <h4 class="card-title"><?=mysqli_num_rows($select_enquiry)?></h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                </div>
            </div>

<?}

include 'pattern.php';?>
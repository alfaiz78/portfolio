<div class="content-wrapper">
    <div class="container-fluid">
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>


      <div class="row mt-3">
        <div class="col-lg-4">
           <div class="card profile-card-2">
            <div class="card-img-block">
                <img class="img-fluid" src="https://cdn.pixabay.com/photo/2016/11/21/11/53/man-1844882_960_720.jpg" alt="Card image cap">
            </div>
            <div class="card-body pt-5">
                <img src="https://cdn.pixabay.com/photo/2016/11/18/15/03/man-1835195_960_720.jpg" alt="profile-image" class="profile">
                <h5 class="card-title">Mark Stern</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="icon-block">
                  <a href="javascript:void();"><i class="fa fa-facebook bg-facebook text-white"></i></a>
				  <a href="javascript:void();"> <i class="fa fa-twitter bg-twitter text-white"></i></a>
				  <a href="javascript:void();"> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                </div>
            </div>

            <div class="card-body border-top border-light">
                 <div class="media align-items-center">
                   <div>
                       <img src="<?php echo base_url('assets/admin/images/timeline/html5.svg') ?>" class="skill-img" alt="skill img">
                   </div>
                     <div class="media-body text-left ml-3">
                       <div class="progress-wrapper">
                         <p>HTML5 <span class="float-right">65%</span></p>
                         <div class="progress" style="height: 5px;">
                          <div class="progress-bar" style="width:65%"></div>
                         </div>
                        </div>                   
                    </div>
                  </div>
                  <hr>
                  <div class="media align-items-center">
                   <div><img src="<?php echo base_url('assets/admin/images/timeline/bootstrap-4.svg') ?>" class="skill-img" alt="skill img"></div>
                     <div class="media-body text-left ml-3">
                       <div class="progress-wrapper">
                         <p>Bootstrap 4 <span class="float-right">50%</span></p>
                         <div class="progress" style="height: 5px;">
                          <div class="progress-bar" style="width:50%"></div>
                         </div>
                        </div>                   
                    </div>
                  </div>
                   <hr>
                  <div class="media align-items-center">
                   <div><img src="<?php echo base_url('assets/admin/images/timeline/angular-icon.svg') ?>" class="skill-img" alt="skill img"></div>
                     <div class="media-body text-left ml-3">
                       <div class="progress-wrapper">
                         <p>AngularJS <span class="float-right">70%</span></p>
                         <div class="progress" style="height: 5px;">
                          <div class="progress-bar" style="width:70%"></div>
                         </div>
                        </div>                   
                    </div>
                  </div>
                    <hr>
                  <div class="media align-items-center">
                   <div><img src="<?php echo base_url('assets/admin/images/timeline/react.svg') ?>" class="skill-img" alt="skill img"></div>
                     <div class="media-body text-left ml-3">
                       <div class="progress-wrapper">
                         <p>React JS <span class="float-right">35%</span></p>
                         <div class="progress" style="height: 5px;">
                          <div class="progress-bar" style="width:35%"></div>
                         </div>
                        </div>                   
                    </div>
                  </div>
                  
              </div>
        </div>

        </div>

        <div class="col-lg-8">
           <div class="card">
            <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                </li>
               
            </ul>
            <div class="tab-content p-3">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">User Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>About</h6>
                            <p>
                                Web Designer, UI/UX Engineer
                            </p>
                            <h6>Hobbies</h6>
                            <p>
                                Indie music, skiing and hiking. I love the great outdoors.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Recent badges</h6>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">html5</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">react</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">codeply</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">angularjs</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">css3</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">jquery</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">bootstrap</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">responsive-design</a>
                            <hr>
                            <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                            <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                             <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td>
                                            <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                    <!--/row-->
                </div>


            </div>
        </div>
      </div>
      </div>
        
    </div>
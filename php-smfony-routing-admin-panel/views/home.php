<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="card crm-widget">
                    <div class="card-body p-0">
                        <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">
                            <div class="col">
                                <div class="py-4 px-3">
                                    <h5 class="text-muted text-uppercase fs-13">Site Görüntülenmesi <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fa-solid display-6 fa-eye"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h2 class="mb-0"><span class="counter-value" data-target="<?php echo $webList[0]["countView"]; ?>"><?php echo $webList[0]["countView"]; ?></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="mt-3 mt-md-0 py-4 px-3">
                                    <h5 class="text-muted text-uppercase fs-13">Bloglar <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fa-solid display-6 fa-blog"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h2 class="mb-0"><span class="counter-value" data-target="<?php echo $blogList[0]["countView"]; ?>"><?php echo $blogList[0]["countView"]; ?></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="mt-3 mt-md-0 py-4 px-3">
                                    <h5 class="text-muted text-uppercase fs-13">Ekibimiz <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fa-solid display-6 fa-users-gear"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h2 class="mb-0"><span class="counter-value" data-target="<?php echo $ourTeam[0]["countView"]; ?>"><?php echo $ourTeam[0]["countView"]; ?></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="mt-3 mt-lg-0 py-4 px-3">
                                    <h5 class="text-muted text-uppercase fs-13">Mesajlar <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fa-solid display-6 fa-envelope"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h2 class="mb-0"><span class="counter-value" data-target="<?php echo $messageList[0]["countView"]; ?>"><?php echo $messageList[0]["countView"]; ?></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="mt-3 mt-lg-0 py-4 px-3">
                                    <h5 class="text-muted text-uppercase fs-13">Projelerimiz <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fa-solid display-6 fa-diagram-project"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h2 class="mb-0"><span class="counter-value" data-target="<?php echo $projectList[0]["countView"]; ?>"><?php echo $projectList[0]["countView"]; ?></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
   
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Son Ziyaretler</h4>
                        <div class="flex-shrink-0">

                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                <thead class="table-light">
                                <tr class="text-muted">
                                    <th scope="col">Kullanıcı Browser</th>
                                    <th scope="col" style="width: 20%;">Kullanıcı İp Adress</th>
                                    <th scope="col">Kullanıcı Cihaz</th>
                                    <th scope="col" style="width: 16%;">Kullanıcı Ziyaret Zamanı</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?PHP
                                if($webListData){


                                foreach ($webListData as $key => $value){ ?>
                                <tr>
                                    <td><?php echo $value["browser"]; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-info">
                                            <?php echo $value["ipAdress"]; ?>
                        <td><?php echo $value["cihaz"]; ?>
                                        </button>
                                      </td>
                                    <td>
                                        <?php echo $value["date"]; ?>
                                    </td>
                                </tr>

                                <?php } } ?>

                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end table responsive -->
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->


        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Okunmayan Mesajlar</h4>
                        <div class="flex-shrink-0">

                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                <thead class="table-light">
                                <tr class="text-muted">
                                    <th scope="col">Kullanıcı Adı Soyadı</th>
                                    <th scope="col" style="width: 20%;">Kullanıcı Mail Adresi</th>
                                    <th scope="col">Kullanıcı Telefon Numarası</th>
                                    <th scope="col" style="width: 16%;">Kullanıcı Biyografisi</th>
                                    <th scope="col" style="width: 16%;">Kullanıcı Derecesi</th>
                                    <th scope="col" style="width: 16%;">Kullanıcı Mesaj Gönderim Tarihi</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?PHP

                                if($messageListData){
                                foreach ($messageListData as $key => $value){ ?>
                                    <tr>
                                        <td><?php echo $value["firstNameLastname"]; ?></td>
                                        <td><?php echo $value["mailAdress"]; ?></td>
                                        <td><?php echo $value["phone"]; ?></td>
                                        <td><?php echo $value["biyografi"]; ?></td>
                                        <td><?php echo $value["statu"]; ?></td>
                                        <td>
                                            <?php echo $value["date"]; ?>
                                        </td>
                                    </tr>

                                <?php } } ?>

                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end table responsive -->
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->


        </div>


    </div>
</div>

<?php require_once $this->footer; ?>



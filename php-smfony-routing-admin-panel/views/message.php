<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Mesajlarım</h5>
                        <div class="col-md-12 d-flex justify-content-end">

                        </div>
                    </div>

                    <div class="card-body">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 16.8px;" class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="



                                                : activate to sort column descending">
                                                <div class="form-check">
                                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>

                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">AD SOYAD</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Mail Adresi</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Telefon Numarası</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Biyografisi</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Ünvanı</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Mesaj Durumu</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Mesaj Tarihi</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Action: activate to sort column ascending">İşlem</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <?php

                                        if ($messageList) {
                                            foreach ($messageList as $key => $value) {


                                                ?>
                                                <tr class="odd">
                                                    <th scope="row" class="dtr-control sorting_1" tabindex="0">
                                                        <div class="form-check">
                                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                                        </div>
                                                    </th>


                                                    <td style=""><?php echo $value["firstNameLastname"]; ?></td>
                                                    <td style=""><?php echo $value["mailAdress"]; ?></td>
                                                    <td style=""><?php echo $value["phone"]; ?></td>
                                                    <td style=""><?php echo $value["biyografi"]; ?></td>
                                                    <td style=""><?php echo $value["statu"]; ?></td>
                                                    <td style=""><?php if($value["messageStatu"]==0){ ?>
                                                            <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label shadow fade show" role="alert">
                                                            <i class="ri-check-double-line label-icon"></i><strong>Bilgi</strong>
                                                           Okunmadı

                                                        </div> <?php }else{  ?>  <div class="alert alert-success alert-dismissible alert-label-icon rounded-label shadow fade show" role="alert">
                                                            <i class="ri-check-double-line label-icon"></i><strong>Bilgi</strong>
                                                            Okundu

                                                        </div> <?php } ?></td>
                                                    <td style=""><?php echo $value["date"]; ?></td>






                                                    <td style="display: none;">
                                                        <div class="dropdown d-inline-block">
                                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill align-middle"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li>
                                                                    <a onclick="bilgiChangceCheck('contactMail','messageStatu',<?php echo $value['id']; ?>)"  class="dropdown-item remove-item-btn">
                                                                        <i class="fa-solid fa-check-double"></i> Okundu olarak İşaretle
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>



                                            <?php       }
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">
                       Herhangi Bir Kayıt Bulunmuyor !
                    </div>';
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>








            <!-- container-fluid -->
        </div>
        </div>
    
        <!-- End Page-content -->


        <?php require_once $this->footer; ?>


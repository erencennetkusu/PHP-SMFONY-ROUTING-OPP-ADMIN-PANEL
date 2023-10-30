<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ariza Listesi</h5>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#adminAdd" class="btn btn-soft-success waves-effect waves-light shadow-none">Ariza Ekle</button>

                        </div>
                    </div>

                    <div class="card-body">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-soft-success waves-effect waves-light shadow-none m-2" id="personelExcel">Excele Aktar</button>
                                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 16.8px;" class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                                                    
                                                        
                                                    
                                                : activate to sort column descending">
                                                    <div class="form-check">
                                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Müşteri</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Müşteri Telefon Numarası</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Arızası</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 246.6px;" aria-label="Title: activate to sort column ascending">Arıza Konumu</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 68.6px;" aria-label="User: activate to sort column ascending">Arıza Durumu</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 77.6px;" aria-label="Assigned To: activate to sort column ascending">Arıza'yı Çözen Personel</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 43.6px;" aria-label="Status: activate to sort column ascending">Arıza Açılış Tarihi</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 43.6px;" aria-label="Status: activate to sort column ascending">Arıza Bitiş Tarihi</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Action: activate to sort column ascending">Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                            $result =  $app->pdoPrepare("SELECT * FROM users WHERE userStatu<4");
                                            if ($result) {
                                                foreach ($result as $key => $value) {

                                                    if ($value["userStatu"] == 1) {
                                                        $aktifpasif = ' checked="checked"';
                                                    } else {
                                                        $aktifpasif = '';
                                                    }

                                            ?>
                                                    <tr class="odd">
                                                        <th scope="row" class="dtr-control sorting_1" tabindex="0">
                                                            <div class="form-check">
                                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                                            </div>
                                                        </th>

                                                        <td style=""><?php echo $value["id"]; ?></td>
                                                        <td>
                                                            <div class="avatar-group">
                                                                <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-3.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Username">
                                                                    <img src="assets/images/profilImg/<?php echo $value["userImage"]; ?>" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td style=""><?php echo $value["userName"]; ?></td>
                                                        <td style=""><?php echo $value["userSurname"]; ?></td>
                                                        <td style=""><?php echo $value["usersMail"]; ?></td>
                                                        <td style=""><?php echo $value["userPhone"]; ?>r</td>
                                                        <td>
                                                            <div class="form-check form-switch" dir="ltr">
                                                                <input type="checkbox" class="form-check-input aktifpasif<?php echo $value["id"]; ?>" onclick="aktifpasif(<?= $value['id'] ?>,'users','aktifpasif<?php echo $value['id']; ?>','userStatu');" id="customSwitchsizesm" <?= $aktifpasif ?> value="<?= $value['id'] ?>">
                                                            </div>
                                                        </td>
                                                        <td style=""><?php    $result = $app->pdoPrepare("SELECT * FROM adminpermission WHERE id=".$value["userRole"]); echo $result[0]["authority"]; ?></td>
                                                        <td style=""><?php echo $value["date"]; ?></td>


                                                        <td style="display: none;">
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a onclick="personelEdit(<?php echo $value['id']; ?>);" data-bs-toggle="modal" data-bs-target="#personelEdit" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                                                                    <li>
                                                                        <a onclick="removeData('users','userStatu',<?php echo $value['id']; ?>)" class="dropdown-item remove-item-btn">
                                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Sil
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



                


                <div class="modal fade " id="adminAdd" tabindex="-1" aria-labelledby="exampleModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalgridLabel">Arıza Ekle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="adminAdder" onsubmit="return false;" method="post">
                                    <div class="row g-3">
                                        <div class="col-xxl-6">
                                            <div>
                                                <label for="firstName" class="form-label">Müşteri</label>
                                                <select id="provinceSelect" class="form-select" name="faultCustomer">
                                                                <option class="form-control" selected>Müşteri Seçiniz</option>
                                                                    <?php 
                                                                     $result =  $app->pdoPrepare("SELECT * FROM customer");
                                                                     if ($result) {
                                                                         foreach ($result as $key => $value) {
                                                                    
                                                                    ?>
                                                                    <option class="form-control" value="<?php echo $value["id"]; ?>"><?php echo $value["customerName"]; ?></option>
                                                                    <?php } } ?>

 
                                                                  
                                                                </select>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-6">
                                            <label for="emailInput" class="form-label">Arıza Konumu</label>
                                            <input type="text" class="form-control" name="faultLocation" id="emailInput" placeholder="Arıza Konumu">
                                        </div>

                                        <div class="col-xxl-12">
                                            <div>
                                                <label for="lastName" class="form-label">Arızası</label>
                                                <textarea class="form-control" name="fault"  rows="2"></textarea>
                                            </div>
                                        </div>

                                       
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <label class="form-label">Arıza Durumu</label>
                                            <div>
                                              
                                            <select id="provinceSelect" class="form-select" name="faultStatu">
                                                                <option class="form-control" selected>Arıza Durumunu Seçiniz</option>
                                                                  
                                                                    <option class="form-control" value="0">Bekleyen Arıza</option>
                                                                    <option class="form-control" value="1">Acil Arıza</option>
                                                                 

 
                                                                  
                                                                </select>
                                            </div>
                                        </div>


                                        <!--end col-->
                                        <div class="col-xxl-6">
                                            <label for="emailInput" class="form-label">Arıza Açılış Tarihi</label>
                                            <input type="date" class="form-control" name="faultDate" id="emailInput" >
                                        </div>

                                      
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" onclick="serialize2('adminAdder')">Ekle</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
  
                                           


                <div class="modal fade " id="personelEdit" tabindex="-1" aria-labelledby="exampleModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
                <div class="modal-dialog">
                <div id="personelEditModals" class="modal-content">


                </div>
                </div>
                </div>
            </div>






        </div>

        
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php require_once $this->footer; ?>
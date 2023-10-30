<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>



<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Üye Listesi</h5>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#adminAdd" class="btn btn-soft-success waves-effect waves-light shadow-none">Personel Ekle</button>

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

                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Üye Resim</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Üye Background Resim</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Üye Adı</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 246.6px;" aria-label="Title: activate to sort column ascending">Üye Soyadı</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 68.6px;" aria-label="User: activate to sort column ascending">Üye Mail Adresi</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 77.6px;" aria-label="Assigned To: activate to sort column ascending">Üye Telefon Numarası</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 70.6px;" aria-label="Created By: activate to sort column ascending">Üye Durumu</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75.6px;" aria-label="Create Date: activate to sort column ascending">Üye Mail Durumu</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 43.6px;" aria-label="Status: activate to sort column ascending">Üye Katılım Tarihi</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Action: activate to sort column ascending">İşlem</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                         
                                            if ($membersResult) {
                                                foreach ($membersResult as $key => $value) {

                                                    if ($value["uye_statu"] == 1) {
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
                                                                    <img src="" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="avatar-group">
                                                                <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-3.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Username">
                                                                    <img src="" alt="" class="rounded-circle avatar-xxs">
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td style=""><?php echo $value["uye_user"]; ?></td>
                                                        <td style=""><?php echo $value["uye_surname"]; ?></td>
                                                        <td style=""><?php echo $value["uye_mail"]; ?></td>
                                                        <td style=""><?php echo $value["uye_phone"]; ?></td>
                                                      
                                                        <td style=""><?php  
                                                        
                                                        if($value["uye_statu"]==1){echo 'Aktif';}else{echo 'Pasif';}
                                                         ?></td>
                                                        <td style=""><?php  
                                                        
                                                        if($value["uye_mail_statu"]==1){echo 'Aktif';}else{echo 'Pasif';}
                                                         ?></td>
                                                        <td style=""><?php echo $value["uye_date"]; ?></td>


                                                        <td style="display: none;">
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a onclick="personelEditView(<?php echo $value['id']; ?>);" data-bs-toggle="modal" data-bs-target="#personelEdit" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
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
                                <h5 class="modal-title" id="exampleModalgridLabel">Personel Ekle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="adminAdder" onsubmit="return false;" method="post">
                                    <div class="row g-3">
                                        <div class="col-xxl-6">
                                            <div>
                                                <label for="firstName" class="form-label">Adınız</label>
                                                <input type="text" class="form-control" name="firstName" placeholder="Adınızı Giriniz">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-6">
                                            <div>
                                                <label for="lastName" class="form-label">Soyadınız</label>
                                                <input type="text" class="form-control" name="surname" placeholder="Soyadınızı Giriniz">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <label class="form-label">Admin Yetki</label>
                                            <div>
                                              
                                            <?php
                                            
                                         

                                            foreach ($personelYetki as $key => $valuePermission) {
                                           
                                            ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" <?php if($value["userRole"]==$valuePermission["id"]){echo "checked";} ?> name="status" id="inlineRadio1" value="<?php echo $valuePermission["id"]; ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?php echo $valuePermission["authority"] ?></label>
                                                </div>


                                                <?php      # code...
                                            } ?>
                                            </div>
                                        </div>


                                        <!--end col-->
                                        <div class="col-xxl-6">
                                            <label for="emailInput" class="form-label">Mail Adresi</label>
                                            <input type="email" class="form-control" name="mail" id="emailInput" placeholder="Mail Adresinizi Giriniz">
                                        </div>

                                        <div class="col-xxl-6">
                                            <label for="emailInput" class="form-label">Telefon Numarası</label>
                                            <input type="phone" class="form-control" id="emailInput" name="phone" placeholder="Telefon Numaranızı  Giriniz">
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-6">
                                            <label for="passwordInput" class="form-label">Profil Resmi </label>
                                            <input type="file" class="form-control" name="profile" id="passwordInput">
                                        </div>

                                        <div class="col-xxl-6">
                                            <label for="passwordInput" class="form-label">Şifre </label>
                                            <input type="password" class="form-control" name="password" id="passwordInput">
                                            <input type="hidden" class="form-control" name="adminAdd" id="passwordInput">
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" onclick="serialize2('adminAdder','/personelAdd')">Ekle</button>
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
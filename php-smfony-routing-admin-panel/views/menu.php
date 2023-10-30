<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Menü Listesi</h5>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#menuAdd" class="btn btn-soft-success waves-effect waves-light shadow-none">Menü Ekle</button>

                        </div>
                    </div>

                    <div class="card-body">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-soft-success waves-effect waves-light shadow-none m-2" id="personelExcel">Excele Aktar</button>
                                    <button onclick="removeAllDdata('adminmenuler');" class="btn btn-soft-danger waves-effect waves-light shadow-none m-2" >Toplu Sil</button>
                                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 16.8px;" class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                                                    
                                                        
                                                    
                                                : activate to sort column descending">
                                                    <div class="form-check">
                                                        <input class="form-check-input " type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Menü Adı</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Menü URL</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 246.6px;" aria-label="Title: activate to sort column ascending">Menü İcon</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 68.6px;" aria-label="User: activate to sort column ascending">Menü Sıra</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 70.6px;" aria-label="Created By: activate to sort column ascending">Durumu</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Action: activate to sort column ascending">İşlem</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            if ($menuList) {
                                                foreach ($menuList as $key => $value) {

                                                    if ($value["menuStatu"] == 1) {
                                                        $aktifpasif = ' checked="checked"';
                                                    } else {
                                                        $aktifpasif = '';
                                                    }

                                            ?>
                                                    <tr class="odd">
                                                        <th scope="row" class="dtr-control sorting_1" tabindex="0">
                                                            <div class="form-check">
                                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="<?php echo $value["id"]; ?>">
                                                            </div>
                                                        </th>

                                                        <td style=""><?php echo $value["id"]; ?></td>
                                                   
                                                        <td style=""><?php echo $value["menuAdi"]; ?></td>
                                                        <td style=""><?php echo $value["menuUrl"]; ?></td>
                                                        <td style=""><?php echo $value["menuIcon"]; ?></td>
                                                        <td style=""><?php echo $value["menuSira"]; ?></td>
                                                     
                                                        <td>
                                                            <div class="form-check form-switch" dir="ltr">
                                                                <input type="checkbox" class="form-check-input aktifpasif<?php echo $value['id']; ?>" onclick="aktifpasif(<?= $value['id'] ?>,'adminmenuler','aktifpasif<?php echo $value['id']; ?>','menuStatu');" id="customSwitchsizesm" <?= $aktifpasif ?> value="<?= $value['id'] ?>">
                                                            </div>
                                                        </td>
                                                       
                                                        <td style="display: none;">
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a data-bs-toggle="modal" data-bs-target="#menuEdit<?php echo $value["id"]; ?>" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                                                                    <li>
                                                                        <a onclick="removeData('adminmenuler','menuStatu',<?php echo $value['id']; ?>)" class="dropdown-item remove-item-btn">
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



                


                <div class="modal fade" id="menuAdd" tabindex="-1" aria-labelledby="exampleModalgridLabel" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalgridLabel">Menü Ekle</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="menuAdder" onsubmit="return false" method="POST">
                                                            <div class="row g-3">
                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="firstName" class="form-label">Menü Adı</label>
                                                                        <input type="text" name="menuName" class="form-control" id="firstName" placeholder="Menü Adını giriniz">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="lastName" class="form-label">Menü URL</label>
                                                                        <input type="text" name="menuURL" class="form-control" id="lastName" placeholder="Menü URL giriniz">
                                                                    </div>
                                                                </div>
                                                             
                                                                <div class="col-xxl-6">
                                                                    <label for="emailInput" class="form-label">Menü Icon</label>
                                                                    <input type="email" name="menuIcon" class="form-control" id="emailInput" placeholder="Menü Icon giriniz">
                                                                    <input type="hidden" name="menuAdd" class="form-control" id="emailInput" placeholder="Menü Icon giriniz">
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-xxl-6">
                                                                    <label for="passwordInput" class="form-label">Menü Sıra</label>
                                                                   <select class="form-control" name="menuSira">
                                                               
                                                                    
                                                                    <?php for($i = 0;$i<20;$i++){echo '<option value="'.$i.'">'.$i.'</option>';} ?>
                                                            </select>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-12">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                                                                        <button type="submit" onclick="serialize2('menuAdder','/menuAdder');" class="btn btn-primary">Ekle</button>
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


                                        <?php
                                           
                                            if ($menuList) {
                                                foreach ($menuList as $key => $value) { ?>

                                        <div class="modal fade" id="menuEdit<?php echo $value["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalgridLabel" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalgridLabel">Menü Güncelle</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="menuEditter<?php echo $value["id"]; ?>" onsubmit="return false" method="POST">
                                                            <div class="row g-3">
                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="firstName" class="form-label">Menü Adı</label>
                                                                        <input type="text" name="menuName" value="<?php echo $value["menuAdi"]; ?>" class="form-control" id="firstName" placeholder="Menü Adını giriniz">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-xxl-6">
                                                                    <div>
                                                                        <label for="lastName" class="form-label">Menü URL</label>
                                                                        <input type="text" name="menuURL" value="<?php echo $value["menuUrl"]; ?>" class="form-control" id="lastName" placeholder="Menü URL giriniz">
                                                                    </div>
                                                                </div>
                                                             
                                                                <div class="col-xxl-6">
                                                                    <label for="emailInput" class="form-label">Menü Icon</label>
                                                                    <input type="text" name="menuIcon"  value='<?php echo $value["menuIcon"]; ?>' class="form-control" id="emailInput" placeholder="Menü Icon giriniz">
                                                                    <input type="hidden" name="menuEdit" class="form-control" id="emailInput" placeholder="Menü Icon giriniz">
                                                                    <input type="hidden" name="menuId" value="<?php echo $value["id"]; ?>" class="form-control" id="emailInput" placeholder="Menü Icon giriniz">
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-xxl-6">
                                                                    <label for="passwordInput" class="form-label">Menü Sıra</label>
                                                                   <select class="form-control" name="menuSira">
                                                               
                                                                    <?php  ?>
                                                                    <?php for($i = 0;$i<20;$i++){
                                                                        if($value["menuSira"]==$i){
                                                                            $actived = "selected";
                                                                            echo '<option '.$actived.' value="'.$i.'">'.$i.'</option>';
                                                                        }else{
                                                                            echo '<option  value="'.$i.'">'.$i.'</option>';
                                                                        }
                                                                       } ?>
                                                            </select>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-12">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                                                                        <button type="submit" onclick="serialize2('menuEditter<?php echo $value['id']; ?>','/menuEditter');" class="btn btn-primary">Düzenle</button>
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
                                        <?php } } ?>

        </div>

        
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <?php require_once $this->footer; ?>


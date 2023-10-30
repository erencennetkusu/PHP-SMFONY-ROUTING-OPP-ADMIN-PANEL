<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Yetkiler Listesi</h5>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#adminAdd" class="btn btn-soft-success waves-effect waves-light shadow-none">Yetki Ekle</button>

                        </div>
                    </div>

                    <div class="card-body">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-soft-success waves-effect waves-light shadow-none m-2" id="personelExcel">Excele Aktar</button>
                                    <button onclick="removeAllDdata('adminpermission');" class="btn btn-soft-danger waves-effect waves-light shadow-none m-2" >Toplu Sil</button>
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
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Yetki Adı</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Kullanıcı Erişimleri</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">İşlem</th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                         
                                            if ($authorityList) {
                                                foreach ($authorityList as $key => $value) {



                                            ?>
                                                    <tr class="odd">
                                                        <th scope="row" class="dtr-control sorting_1" tabindex="0">
                                                            <div class="form-check">
                                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="<?php echo $value["id"]; ?>">
                                                            </div>
                                                        </th>

                                                        <td style=""><?php echo $value["id"]; ?></td>
                                                        <td style=""><?php echo $value["authority"]; ?></td>
                                                        <td style="">
                                                        
                                                        
                                                    <select class="form-control" >
                                                    <?php $authority = json_decode($value["userAccess"],true); 
                                                      
                                                        foreach ($authority as $key5 => $value5) {
                                                            foreach ($resultMenu as $key => $valueMenu) {
                                                                if($valueMenu["id"]==$value5){
                                                                    echo '<option>'.$valueMenu["menuAdi"].'</option>';
                                                                }
                                                            }

                                                           
                                                        }

                                                        
                                                        ?>

                                                        
                                                    
                                                    </select>
                                                    
                                                    </td>



                                                        <td style="display: none;">
                                                           
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a data-bs-toggle="modal" data-bs-target="#adminEdit<?php echo $value["id"]; ?>" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                                                                    <li>
                                                                        <a onclick="removeData('adminpermission','statu',<?php echo $value['id']; ?>)" class="dropdown-item remove-item-btn">
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
                                <h5 class="modal-title" id="exampleModalgridLabel">Yetki Ekle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="permissionAdder" onsubmit="return false;" method="post">
                                    <div class="row g-3">
                                        <div class="col-xxl-6">
                                            <div>
                                                <label for="firstName" class="form-label">Yetki Adı</label>
                                                <input type="text" class="form-control" name="permissionName" placeholder="Yetki Adını Giriniz">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <label class="form-label">Kullanıcı Erişimi</label>
                                            <div>

                                                <?php

                                                

                                                foreach ($resultMenu as $key => $valuePermission) {

                                                ?>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="groupPermission[]" id="inlineRadio1" value="<?php echo $valuePermission["id"]; ?>">
                                                        <label class="form-check-label" for="inlineRadio1"><?php echo $valuePermission["menuAdi"] ?></label>
                                                    </div>


                                                <?php      # code...
                                                } ?>
                                            </div>
                                        </div>
                                        <input type="hidden" name="permissionAdd">
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" onclick='serialize2("permissionAdder","/permissionAdd")'>Ekle</button>
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
        <?php
      
        if ($authorityList) {
            foreach ($authorityList as $key => $value) { ?>


                <div class="modal fade " id="adminEdit<?php echo $value["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalgridLabel">Yetki Düzenle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="permissionEdit<?php echo $value["id"]; ?>" onsubmit="return false;" method="post">
                                    <div class="row g-3">
                                        <div class="col-xxl-6">
                                            <div>
                                                <label for="firstName" class="form-label">Yetki Adı</label>
                                                <input type="text" class="form-control" value="<?php echo $value["authority"]; ?>" name="permissionName" placeholder="Yetki Adını Giriniz">
                                            </div>
                                        </div>

                                          <label for="" class="form-label"> Sayfa Erişimleri</label>
                                        <div class="mb-3">
                                              


                                                <?php 
                                                $sira = 0;

                                                $sayfaErisimi = json_decode($value['userAccess'],true);


                                                foreach ($resultMenu as $key2 => $value2) {
                                                    $say = 0;

                                                    if (in_array($value2["id"], $sayfaErisimi)) {
                                                        $say = 1;
                                                    } else {

                                                        $say = 0;
                                                    }
                                                ?>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" <?php if ($say == 1) {
                                                                                            echo "checked";
                                                                                        } ?> type="checkbox" name="authority[]" id="inlineRadio1" value="<?php print $value2["id"]; ?>">
                                                        <label class="form-check-label" for="inlineRadio1"><?php print $value2["menuAdi"]; ?></label>
                                                    </div>

                                                <?php }  ?>

                                                <?php
                                                ?>

                                            </div>
                                        <input type="hidden" name="permissionEdit">
                                        <input type="hidden" name="permissionID" value="<?php echo  $value["id"];?>" >
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" onclick='serialize2("permissionEdit<?php echo $value["id"]; ?>","/permissionEdit")'>Düzenle</button>
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

<?php }
        } ?>




</div>


<!-- container-fluid -->
</div>
<!-- End Page-content -->


      
    <?php require_once $this->footer; ?>
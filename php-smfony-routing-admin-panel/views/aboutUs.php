<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Hakkımızda Listesi</h5>
                        <div class="col-md-12 d-flex justify-content-end">

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

                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Hakkımızda Başlık</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Hakkımızda Açıklama</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Action: activate to sort column ascending">İşlem</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            if ($aboutUsList) {
                                                foreach ($aboutUsList as $key => $value) {


                                            ?>
                                                    <tr class="odd">
                                                        <th scope="row" class="dtr-control sorting_1" tabindex="0">
                                                            <div class="form-check">
                                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                                            </div>
                                                        </th>

                                                    
                                                        <td style=""><?php echo $value["aboutUsTitle"]; ?></td>
                                                   
                                                        <td style=""><?php echo substr($value["aboutUsDescription"],0,100).'...'; ?></td>
                                                
                                                      
                                                       
                                                        <td style="display: none;">
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a data-bs-toggle="modal" data-bs-target="#menuEdit<?php echo $value["id"]; ?>" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                                                                    <li>

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
                                                        <h5 class="modal-title" id="exampleModalgridLabel">Hakkımızda  Ekle</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="aboutUsAdd" onsubmit="return false" method="POST">
                                                            <div class="row g-3">
                                                            <div class="col-xxl-12">
                                                                    <div>
                                                                        <label for="firstName" class="form-label">Hakkımızda Başlık</label>
                                                                        <input type="text" name="aboutUsTitle"  class="form-control" id="firstName" placeholder="Hakkımızda Başlık giriniz">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-xxl-12">
                                                                    <div>
                                                                        <label for="lastName" class="form-label">Hakkımızda Açıklama</label>
                                                                        <textarea style="height:150px;" name="aboutUsDescription" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                             
                                                                <!--end col-->
                                                                <div class="col-lg-12">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                                                                        <button type="submit" onclick="serialize2('aboutUsAdd','/aboutUsAdd');" class="btn btn-primary">Ekle</button>
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
                                           
                                            if ($aboutUsList) {
                                                foreach ($aboutUsList as $key => $value) { ?>

                                        <div class="modal fade" id="menuEdit<?php echo $value["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalgridLabel" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalgridLabel">Hakkımızda  Güncelle</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="aboutUsEditter<?php echo $value["id"]; ?>" onsubmit="return false" method="POST">
                                                            <div class="row g-3">
                                                                <div class="col-xxl-12">
                                                                    <div>
                                                                        <label for="firstName" class="form-label">Hakkımızda Başlık</label>
                                                                        <input type="text" name="aboutUsTitle" value="<?php echo $value["aboutUsTitle"]; ?>" class="form-control" id="firstName" placeholder="Hakkımızda Başlık giriniz">
                                                                        <input type="hidden" name="aboutUsID" value="<?php echo $value["id"]; ?>" class="form-control" id="firstName" placeholder="Hakkımızda Başlık giriniz">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-xxl-12">
                                                                    <div>
                                                                        <label for="lastName" class="form-label">Hakkımızda Açıklama</label>
                                                                        <textarea style="height:150px;" name="aboutUsDescription" class="form-control"><?php echo $value["aboutUsDescription"]; ?></textarea>
                                                                    </div>
                                                                </div>
                                                             
                                                           
                                                                <!--end col-->
                                                                <div class="col-lg-12">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                                                                        <button type="submit" onclick="serialize2('aboutUsEditter<?php echo $value['id']; ?>','/aboutUsEditter');" class="btn btn-primary">Düzenle</button>
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


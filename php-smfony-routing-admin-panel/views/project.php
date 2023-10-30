<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Projeler Listesi</h5>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#menuAdd" class="btn btn-soft-success waves-effect waves-light shadow-none">Proje Ekle</button>

                        </div>
                    </div>

                    <div class="card-body">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-soft-success waves-effect waves-light shadow-none m-2" id="personelExcel">Excele Aktar</button>
                                    <button onclick="removeAllDdata('project');" class="btn btn-soft-danger waves-effect waves-light shadow-none m-2" >Toplu Sil</button>
                                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 16.8px;" class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="



                                                : activate to sort column descending">
                                                <div class="form-check">
                                                    <input class="form-check-input " type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>

                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Proje Resim</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Proje Başlık</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Proje  Açıklama</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Proje  Url</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Proje  Kategori</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Action: activate to sort column ascending">Proje Yayınlanma Tarihi</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Action: activate to sort column ascending">İşlem</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <?php

                                        $projectCat = "";




                                        if ($projectList) {
                                            foreach ($projectList as $key => $value) {

                                                foreach ($projectCategory as $key2 => $value5){

                                                    if($key2+1==$value["projectCategory"]){
                                                        $projectCat = $value5["name"];
                                                    }
                                        }


                                                    $categoryId = ($value["projectCategory"] == 1)  ?  0 : $value["projectCategory"];
                                                ?>
                                                <tr class="odd">
                                                    <th scope="row" class="dtr-control sorting_1" tabindex="0">
                                                        <div class="form-check">
                                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="<?php echo $value["id"]; ?>">
                                                        </div>
                                                    </th>


                                                    <td style=""><img src='assets/images/projectImg/<?php echo $value["projectImg"]; ?>' width="100px" height="100px"></td>
                                                    <td style=""><?php echo $value["projectTitle"]; ?></td>
                                                    <td style=""><?php echo substr($value["projectDescription"],0,50).'...'; ?></td>
                                                    <td style=""><?php echo $value["projectUrl"]; ?></td>
                                                    <td style=""><?php echo $projectCat; ?></td>
                                                    <td style=""><?php echo $value["projectDate"]; ?></td>



                                                    <td class="noExl" >

                                                        <div class="btn-group shadow" role="group" aria-label="Button group with nested dropdown">

                                                            <div class="btn-group" role="group">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                                                                    <li><a data-bs-toggle="modal" data-bs-target="#menuEdit<?php echo $value["id"]; ?>" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                                                                    <li>
                                                                        <a onclick="removeDataDelete('project',<?php echo $value['id']; ?>)" class="dropdown-item remove-item-btn">
                                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Sil
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
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
                                <h5 class="modal-title" id="exampleModalgridLabel">Blog  Ekle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="projeAdd" onsubmit="return false" method="POST">
                                    <div class="row g-3">
                                        <div class="col-xxl-12">
                                            <div>
                                                <label for="firstName" class="form-label">Proje Resim</label>
                                                <input type="file" name="projectImg"  class="form-control" id="firstName" >
                                            </div>
                                        </div>
                                        <div class="col-xxl-12">
                                            <div>
                                                <label for="firstName" class="form-label">Proje Başlık</label>
                                                <input type="text"  name="projectTitle"  class="form-control" id="firstName" placeholder="Proje Başlık giriniz">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-12">
                                            <div>
                                                <label for="lastName" class="form-label">Proje Açıklama</label>

                                                <textarea name="projectDescription" class="form-control"> </textarea>
                                            </div>
                                        </div>

                                        <div class="col-xxl-12">
                                            <div>
                                                <label for="firstName" class="form-label">Proje Url</label>
                                                <input type="text"  name="projectUrl"  class="form-control" id="firstName" placeholder="Proje Başlık giriniz">
                                            </div>
                                        </div>
                                        <div class="col-xxl-12">
                                            <div>
                                                <select class="form-select mb-3" name="projectCategory" aria-label="Default select example">
                                                    <?php if ($projectCategory) {
                                                        foreach ($projectCategory as $key => $value2) { ?>

                                                            <option <?php if($value2["id"]==$value["projectCategory"]){echo 'selected';} ?> value="<?php echo $value2["id"]; ?>" name="projectCategory" ><?php echo $value2["name"]; ?></option>



                                                        <?php } } ?>
                                                </select>

                                            </div>
                                        </div>

                                        <!--end col-->


                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                                                <button type="submit" onclick="serialize2('projeAdd','/projeAdd');" class="btn btn-primary">Ekle</button>
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

                if ($projectList) {
                    foreach ($projectList as $key => $value) { ?>

                        <div class="modal fade" id="menuEdit<?php echo $value["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalgridLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalgridLabel">Proje  Güncelle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="projectEditter<?php echo $value["id"]; ?>" onsubmit="return false" method="POST">
                                            <div class="row g-3">
                                                <div class="col-xxl-12">
                                                    <div>
                                                        <label for="firstName" class="form-label">Proje Resim</label>
                                                        <input type="file" name="projectImg"  class="form-control" id="firstName" >
                                                        <input type="hidden" value="<?php echo $value["id"]; ?>"  name="projectId"  class="form-control" id="firstName" >
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <div>
                                                        <label for="firstName" class="form-label">Proje Başlık</label>
                                                        <input type="text" value="<?php echo $value["projectTitle"]; ?>" name="projectTitle"  class="form-control" id="firstName" placeholder="blog Başlık giriniz">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-12">
                                                    <div>
                                                        <label for="lastName" class="form-label">Proje Açıklama</label>

                                                        <textarea name="projectDescription" class="form-control"> <?php echo $value["projectDescription"]; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-12">
                                                    <div>
                                                        <label for="firstName" class="form-label">Proje Url</label>
                                                        <input type="text" value="<?php echo $value["projectUrl"]; ?>" name="projectUrl"  class="form-control" id="firstName" placeholder="blog Başlık giriniz">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <div>
                                                        <select class="form-select mb-3" name="projectCategory" aria-label="Default select example">
                                                        <?php if ($projectCategory) {
                                                        foreach ($projectCategory as $key => $value2) { ?>

                                                            <option <?php if($value2["id"]==$value["projectCategory"]){echo 'selected';} ?> value="<?php echo $value2["id"]; ?>" name="projectCategory" ><?php echo $value2["name"]; ?></option>



                                                            <?php } } ?>
                                                        </select>

                                                    </div>
                                                </div>

                                                <!--end col-->


                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                                                        <button type="submit" onclick="serialize2('projectEditter<?php echo $value['id']; ?>','/projectEditter');" class="btn btn-primary">Düzenle</button>
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


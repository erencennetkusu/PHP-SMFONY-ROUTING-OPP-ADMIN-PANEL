<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Blog Listesi</h5>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-success " onclick="javascript:window.location.href = 'blogAddView'">Blog Ekle</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="d-flex"> <button class="btn btn-soft-success waves-effect waves-light shadow-none m-2" id="personelExcel">Excele Aktar</button>
                                        <button onclick="removeAllDdata('blog');" class="btn btn-soft-danger waves-effect waves-light shadow-none m-2" >Toplu Sil</button>
                                    </div>
                                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 16.8px;" class="noOdd sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                                                    
                                                        
                                                    
                                                : activate to sort column descending">
                                                    <div class="form-check">
                                                        <input class="form-check-input " type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Blog Resim</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Blog Başlık</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Blog Açıklama</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Blog Url</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Blog Tagları</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Action: activate to sort column ascending">Blog Yayınlanma Tarihi</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Action: activate to sort column ascending">İşlem</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            if ($blogList) {
                                                foreach ($blogList as $key => $value) {


                                            ?>
                                                    <tr class="odd">
                                                        <th scope="row" class="dtr-control sorting_1" tabindex="0">
                                                            <div class="form-check">
                                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="<?php echo $value["id"]; ?>">
                                                            </div>
                                                        </th>

                                                    
                                                        <td style=""><img src='assets/images/blogImg/<?php echo $value["blogImg"]; ?>' width="100px" height="100px"></td>
                                                        <td style=""><?php echo $value["blogTitle"]; ?></td>
                                                   
                                                        <td style=""><?php echo substr(htmlspecialchars($value["blogDescription"]),0,50).'...'; ?></td>
                                                        <td style=""><?php echo $value["blogUrl"]; ?></td>
                                                        <td style=""><?php echo $value["blogTagger"]; ?></td>
                                                        <td style=""><?php echo substr($value["blogDate"],0,100).'...'; ?></td>


                                                        <td class="noExl" >

                                                            <div class="btn-group shadow" role="group" aria-label="Button group with nested dropdown">

                                                                <div class="btn-group" role="group">
                                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-fill align-middle"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                                                                        <li><a href="blogUpdates-<?php echo $value["id"]; ?>"  class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                                                                        <li>
                                                                            <a onclick="removeDataDelete('blog',<?php echo $value['id']; ?>)" class="dropdown-item remove-item-btn">
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










        </div>

        
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <?php require_once $this->footer; ?>


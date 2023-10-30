
<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>


<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Müşteri Listesi</h5>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#adminAdd" class="btn btn-soft-success waves-effect waves-light shadow-none">Müşteri Ekle</button>

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
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Müşteri Adı</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 82.6px;" aria-label="Purchase ID: activate to sort column ascending">Müşteri Soyadı</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 246.6px;" aria-label="Title: activate to sort column ascending">Müşteri Ünvanı</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 68.6px;" aria-label="User: activate to sort column ascending">Müşteri Mail Adresi</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 77.6px;" aria-label="Assigned To: activate to sort column ascending"> Müşteri Telefon Numarası</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 70.6px;" aria-label="Created By: activate to sort column ascending">Müşteri Adresi</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75.6px;" aria-label="Create Date: activate to sort column ascending">Müşteri Türü</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75.6px;" aria-label="Create Date: activate to sort column ascending">Müşteri Vergi Numarası</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75.6px;" aria-label="Create Date: activate to sort column ascending">Müşteri Fax Numarası</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75.6px;" aria-label="Create Date: activate to sort column ascending">Müşteri Ülke/Şehir/ilçe</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75.6px;" aria-label="Create Date: activate to sort column ascending">Müşteri Posta Kodu</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75.6px;" aria-label="Create Date: activate to sort column ascending">Müşteri Durumu</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 43.6px;" aria-label="Status: activate to sort column ascending">Müşteri Kayıt Tarihi</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Action: activate to sort column ascending">Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                          
                                            if ($customerList) {
                                                foreach ($customerList as $key => $value) {
                                                
                                                   
                                                    if ($value["customerStatu"] == 1) {
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
                                                      
                                                        <td style=""><?php echo $value["customerName"]; ?></td>
                                                        <td style=""><?php echo $value["customerSurname"]; ?></td>
                                                        <td style=""><?php echo $value["customerTitle"]; ?></td>
                                                        <td style=""><?php echo $value["customerMailAdress"]; ?></td>
                                                        <td style=""><?php echo $value["customerPhone"]; ?></td>
                                                        <td style=""><?php echo $value["customerAdress"]; ?></td>
                                                        <td style=""><?php  if($value["customerType"]=="1"){echo "Bireysel";}else{echo "Kurumsal";} ?></td>
                                                        <td style=""><?php echo $value["customerTaxNumber"]; ?></td>
                                                        <td style=""><?php echo $value["customerFaxPhone"]; ?></td>
                                                        <td style=""><?php echo $value["custormerCountry"].'/'.$value["provinceName"].'/'.$value["districtName"]; ?></td>
                                                        <td style=""><?php echo $value["custormerPostCode"]; ?></td>
                                                        <td>
                                                            <div class="form-check form-switch" dir="ltr">
                                                                <input type="checkbox" class="form-check-input aktifpasif<?php echo $value["id"]; ?>" onclick="aktifpasif(<?= $value['id'] ?>,'customer','aktifpasif<?php echo $value['id']; ?>','customerStatu');" id="customSwitchsizesm" <?= $aktifpasif ?> value="<?= $value['id'] ?>">
                                                            </div>
                                                        </td>
                                                       
                                                        <td style=""><?php echo $value["customerDate"]; ?></td>


                                                        <td style="display: none;">
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a onclick="customerEdit('<?php echo $value['id']; ?>')" data-bs-toggle="modal" data-bs-target="#customerEdit" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                                                                    <li>
                                                                        <a onclick="removeData('customer','customerStatu',<?php echo $value['id']; ?>)" class="dropdown-item remove-item-btn">
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
                                <h5 class="modal-title" id="exampleModalgridLabel">Müşteri Ekle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="col-xl-12">
                            <div class="card">
                            
                                <div class="card-body form-steps">
                                    
                                       
                                        <div class="step-arrow-nav mb-4">

                                            <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-gen-info" type="button" role="tab" aria-controls="steparrow-gen-info" aria-selected="false" data-position="0">Bireysel Müşteri</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link " id="steparrow-description-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-description-info" type="button" role="tab" aria-controls="steparrow-description-info" aria-selected="true" data-position="1">Kurumsal Müşteri</button>
                                                </li>
                                               
                                            </ul>
                                        </div>

                                      
                                        <div class="tab-content">
                                            
                                            <div class="tab-pane active show" id="steparrow-gen-info" role="tabpanel" aria-labelledby="steparrow-gen-info-tab">
                                            <form id="bireyselForm" onsubmit="return false;" method="POST">   
                                            <div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Adı</label>
                                                                <input type="text" name="customerName" class="form-control" id="steparrow-gen-info-email-input" placeholder="Müşteri Adını Giriniz">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-username-input">Müşteri Soyadı</label>
                                                                <input type="text" name="customerSurname" class="form-control" id="steparrow-gen-info-username-input" placeholder="Müşteri Soyadı Giriniz">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Ünvanı</label>
                                                                <input type="text" name="customerTitle" class="form-control" id="steparrow-gen-info-email-input" placeholder="Müşteri Ünvanı Giriniz">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-username-input">Müşteri Adresi</label>
                                                                <input type="text" name="customerAdress" class="form-control" id="steparrow-gen-info-username-input" placeholder="Müşteri Adresi Giriniz">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Telefon</label>
                                                                <input type="text" name="customerPhone" class="form-control" id="steparrow-gen-info-email-input" placeholder="Müşteri Telefon Giriniz">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-username-input">Müşteri Mail Adresi</label>
                                                                <input type="text" name="customerMail" class="form-control" id="steparrow-gen-info-username-input" placeholder="Müşteri Mail Adresi Giriniz">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Fax Numarası</label>
                                                                <input type="text" name="customerFaxNumber" class="form-control" id="steparrow-gen-info-email-input" placeholder="Müşteri Fax Numarası Giriniz">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-username-input">Müşteri Posta Kodu</label>
                                                                <input type="text" name="customerPostCode" class="form-control" id="steparrow-gen-info-username-input" placeholder="Müşteri Posta Kodu Giriniz">
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Şehir</label>
                                                                <select id="provinceSelect" class="form-select" name="customerProvince">
                                                                <option class="form-control" selected>Şehir Seçiniz</option>
                                                                    <?php 
                                                                   
                                                                     if ($resultProvince) {
                                                                         foreach ($resultProvince as $key => $value) {
                                                                    
                                                                    ?>
                                                                    <option class="form-control" value="<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></option>
                                                                    <?php } } ?>

 
                                                                  
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-username-input">Müşteri İlçe</label>
                                                                <select id="districtSelect" class="form-control" name="customerDistrict">
                                                                    <option class="form-control" selected>İlçe Seçiniz</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Ülke</label>
                                                                
                                                                <select class="form-control" name="customerCountry">
                                                                <option class="form-control" selected>Ülke Seçiniz</option>
                                                                <option class="form-control" value="TR">TR</option>
                                                                <option class="form-control" value="ENG">ENG</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                   
                                                </div>

                                                <input type="hidden" name="customerType" value="1" >
                                                <input type="hidden" name="customerAdd" value="1" >
                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                <button type="button" onclick="serialize2('bireyselForm');" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-experience-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                  
                                            <!-- end tab pane -->

                                            <div class="tab-pane fade " id="steparrow-description-info" role="tabpanel" aria-labelledby="steparrow-description-info-tab">
                                            <form  id="kurumsalForm" onsubmit="return false;" method="POST">
                                            <div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Adı</label>
                                                                <input type="text" name="customerName" class="form-control" id="steparrow-gen-info-email-input" placeholder="Müşteri Adını Giriniz">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-username-input">Müşteri Soyadı</label>
                                                                <input type="text" name="customerSurname" class="form-control" id="steparrow-gen-info-username-input" placeholder="Müşteri Soyadı Giriniz">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Ünvanı</label>
                                                                <input type="text" name="customerTitle" class="form-control" id="steparrow-gen-info-email-input" placeholder="Müşteri Ünvanı Giriniz">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-username-input">Müşteri Adresi</label>
                                                                <input type="text" name="customerAdress" class="form-control" id="steparrow-gen-info-username-input" placeholder="Müşteri Adresi Giriniz">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Telefon</label>
                                                                <input type="text" name="customerPhone" class="form-control" id="steparrow-gen-info-email-input" placeholder="Müşteri Telefon Giriniz">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-username-input">Müşteri Mail Adresi</label>
                                                                <input type="text" name="customerMail" class="form-control" id="steparrow-gen-info-username-input" placeholder="Müşteri Mail Adresi Giriniz">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Şirket Adı</label>
                                                                <input type="text" name="customerCompanyName" class="form-control" id="steparrow-gen-info-email-input" placeholder="Şirket Adı Giriniz">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-username-input">Vergi Numarası</label>
                                                                <input type="text" name="customerTaxNumber" class="form-control" id="steparrow-gen-info-username-input" placeholder="Vergi Numarası Giriniz">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Fax Numarası</label>
                                                                <input type="text" name="customerFaxNumber" class="form-control" id="steparrow-gen-info-email-input" placeholder="Müşteri Fax Numarası Giriniz">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-username-input">Müşteri Posta Kodu</label>
                                                                <input type="text" name="customerPostCode" class="form-control" id="steparrow-gen-info-username-input" placeholder="Müşteri Posta Kodu Giriniz">
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Şehir</label>
                                                                <select id="provinceSelectK" class="form-select" name="customerProvince">
                                                                <option  selected>Şehir Seçiniz</option>
                                                                    <?php 
                                                                     
                                                                     if ($resultProvince) {
                                                                         foreach ($resultProvince as $key => $value) {
                                                                    
                                                                    ?>
                                                                    <option  value="<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></option>
                                                                    <?php } } ?>

 
                                                                  
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-username-input">Müşteri İlçe</label>
                                                                <select id="districtSelectK" class="form-control" name="customerDistrict">
                                                                    <option  selected>İlçe Seçiniz</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="steparrow-gen-info-email-input">Müşteri Ülke</label>
                                                                
                                                                <select class="form-control" name="customerCountry">
                                                                <option class="form-control" selected>Ülke Seçiniz</option>
                                                                <option class="form-control" value="TR">TR</option>
                                                                <option class="form-control" value="ENG">ENG</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                   
                                                </div>

                                                <input type="hidden" name="customerType" value="2" >
                                                <input type="hidden" name="customerAdd" value="1" >
                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <button type="button" onclick="serialize2('kurumsalForm');" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-experience-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- end tab pane -->

                   
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                            
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      


                <div class="modal fade " id="customerEdit" tabindex="-1" aria-labelledby="exampleModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
                    <div class="modal-dialog">
                        <div id="customerEditModals" class="modal-content">
                            
                        </div>
                    </div>
                </div>
            </div>






        </div>

        
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <script>

$(document).ready(function () {
$("#provinceSelect").change(function () {
let inputValue =  $("#provinceSelect option:selected").val();
            var url = "/provinceSelect";
            var data = {
                sehirsearch: "search",
                product_id: inputValue     
            }
            $.post(url, data, function(response) {
                if ($("#provinceSelect").val() != null) {
                   
                    $("#districtSelect").html(response);
                }     
            });
});
});





$(document).ready(function () {
$("#provinceSelectK").change(function () {
let inputValue =  $("#provinceSelectK option:selected").val();
            var url = "/provinceSelect";
            var data = {
                sehirsearch: "search",
                product_id: inputValue     
            }
            $.post(url, data, function(response) {
                if ($("#provinceSelectK").val() != null) {
                   
                    $("#districtSelectK").html(response);
                }     
            });
});
});


function provincechange(id){

    let disctrictId = id.substr(-1);
    $("#"+id).change(function () {
let inputValue =  $("#"+id+" option:selected").val();
            var url = "/provinceSelect";
            var data = {
                sehirsearch: "search",
                product_id: inputValue     
            }
            $.post(url, data, function(response) {
                if ($("#"+id).val() != null) {
                   
                    $("#districtSelectD"+disctrictId).html(response);
                }     
            });
});

}
        

        

    </script>

<?php require_once $this->footer; ?>
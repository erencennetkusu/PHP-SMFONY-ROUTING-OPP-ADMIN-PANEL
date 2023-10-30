<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>



    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Site Ayarları</h4>
                        </div><!-- end card header -->
                        <div class="card-body form-steps">

                                <div class="row gy-5">
                                    <div class="col-lg-3">
                                        <div class="nav flex-column custom-nav nav-pills" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link active" id="v-pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bill-info" type="button" role="tab" aria-controls="v-pills-bill-info" aria-selected="true" data-position="0">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i>  1
                                                        </span>
                                                Site Ayarları
                                            </button>
                                            <button class="nav-link" id="v-pills-bill-address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bill-address" type="button" role="tab" aria-controls="v-pills-bill-address" aria-selected="false" data-position="1">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i>  2
                                                        </span>
                                                İletişim Ayarları
                                            </button>
                                            <button class="nav-link" id="v-pills-bill-smtp-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bill-smtp" type="button" role="tab" aria-controls="v-pills-bill-smtp" aria-selected="false" data-position="1">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i>  2
                                                        </span>
                                                Mail (SMTP) Ayarları
                                            </button>
                                            <button class="nav-link" id="v-pills-bill-data-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bill-data" type="button" role="tab" aria-controls="v-pills-bill-data" aria-selected="false" data-position="1">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i>  2
                                                        </span>
                                                Yedekleme İşlemleri (Dışa Aktar )
                                            </button>

                                            <button class="nav-link" id="v-pills-bill-ic-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bill-ic" type="button" role="tab" aria-controls="v-pills-bill-ic" aria-selected="false" data-position="1">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i>  2
                                                        </span>
                                                Yedekleme İşlemleri (İçe  Aktar )
                                            </button>


                                        </div>
                                        <!-- end nav -->
                                    </div> <!-- end col-->
                                    <div class="col-lg-6">
                                        <div class="px-lg-4">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="v-pills-bill-info" role="tabpanel" aria-labelledby="v-pills-bill-info-tab">
                                                    <div>

                                                    </div>

                                                    <div>
                                                        <form id="settingsEditter" onsubmit="return false" method="POST">
                                                        <div class="row g-3">
                                                            <div class="col-xxl-12">
                                                                <div>
                                                                    <label for="firstName" class="form-label">Site İcon</label><br>
                                                                <img style="border: 1px solid black" src="assets/images/siteImg/<?php echo $settingList[0]["icon"]; ?>" width="100px" height="100px">
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-12">
                                                                <div>
                                                                    <label for="firstName" class="form-label">Site İcon</label>
                                                                    <input type="file" name="settingIcon"  class="form-control" id="firstName" >
                                                                    <input type="hidden" name="settingsId" value="<?php echo $settingList[0]["id"]; ?>" class="form-control" id="firstName" >
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-12">
                                                                <div>
                                                                    <label for="firstName" class="form-label">Site Başlık</label>
                                                                    <input type="text" value="<?php echo $settingList[0]["Title"]; ?>" name="settingsTitle"  class="form-control" id="firstName" placeholder="Referans Başlık giriniz">
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-xxl-12">
                                                                <div>
                                                                    <label for="lastName" class="form-label">Site Açıklama</label>
                                                                    <textarea style="height:150px;" name="settingsDescription" class="form-control"><?php echo $settingList[0]["description"]; ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-12">
                                                                <div>
                                                                    <label for="firstName" class="form-label">Site Anahtar Kelimeler</label>
                                                                    <input type="text" value="<?php echo $settingList[0]["keywords"]; ?>" name="settingsKeywords"  class="form-control" id="firstName" placeholder="Referans Başlık giriniz">
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-12">
                                                                <div>
                                                                    <label for="firstName" class="form-label">Site Yapımcısı</label>
                                                                    <input type="text" value="<?php echo $settingList[0]["author"]; ?>" name="settingsAuthor"  class="form-control" id="firstName" placeholder="Referans Başlık giriniz">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <button type="button" onclick="serialize2('settingsEditter','/settingsEditter');" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-bill-address-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Kaydet</button>
                                                    </div>

                                                </form>
                                                </div>
                                                <!-- end tab pane -->
                                                <div class="tab-pane fade" id="v-pills-bill-address" role="tabpanel" aria-labelledby="v-pills-bill-address-tab">
                                                    <div>
                                                        <h5>İletişim Ayarları</h5>

                                                    </div>

                                                    <form id="settingsForm" onsubmit="return false;" method="POST">
                                                    <div>
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="address" class="form-label">Telefon Numarası</label>
                                                                <input type="text" value="<?php echo $settingsForm[0]["phone"]; ?>" name="phone" class="form-control" id="address" placeholder="+90545*****">
                                                                <input type="hidden" value="<?php echo $settingsForm[0]["id"]; ?>" name="id" class="form-control" id="address" placeholder="+90545*****">

                                                            </div>

                                                            <div class="col-12">
                                                                <label for="address2" class="form-label">Adress</span></label>
                                                                <input type="text" value="<?php echo $settingsForm[0]["adress"]; ?>" name="adress" class="form-control" id="address2" placeholder="Adress">
                                                            </div>


                                                            <div class="col-12">
                                                                <label for="address2" class="form-label">Mail Adresi</span></label>
                                                                <input type="text" value="<?php echo $settingsForm[0]["mail"]; ?>" name="mail" class="form-control" id="address2" placeholder="Mail Adresi">
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="address2" class="form-label">Facebook Adresi</span></label>
                                                                <input type="text" value="<?php echo $settingsForm[0]["facebook"]; ?>" name="facebook" class="form-control" id="address2" placeholder="facebook Adresi">
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="address2" class="form-label">Instagram Adresi</span></label>
                                                                <input type="text" value="<?php echo $settingsForm[0]["instagram"]; ?>" name="instagram" class="form-control" id="address2" placeholder="instagram Adresi">
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="address2" class="form-label">Twitter Adresi</span></label>
                                                                <input type="text" value="<?php echo $settingsForm[0]["twitter"]; ?>" name="twitter" class="form-control" id="address2" placeholder="twitter Adresi">
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="address2" class="form-label">Linkedin Adresi</span></label>
                                                                <input type="text" value="<?php echo $settingsForm[0]["linkdedin"]; ?>" name="linkdedin" class="form-control" id="address2" placeholder="linkdedin Adresi">
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="address2" class="form-label">Youtube Adresi</span></label>
                                                                <input type="text" value="<?php echo $settingsForm[0]["youtube"]; ?>" name="youtube" class="form-control" id="address2" placeholder="Mail Adresi">
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <button onclick="serialize2('settingsForm','/settingsForm')" type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-payment-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Kaydet</button>
                                                    </div>
                                                </form>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-bill-data" role="tabpanel" aria-labelledby="v-pills-bill-address-tab">
                                                    <div>
                                                        <h5>Yedekleme Ayarları (Dışa Aktar )</h5>

                                                    </div>

                                                    <form id="mailSendSql" onsubmit="return false;" method="POST">
                                                        <div>
                                                            <div class="row g-3">
                                                                <div class="col-12">
                                                                    <label for="address" class="form-label">Mail Adresine Yedeği Gönder </label>
                                                                    <input type="text"  name="mail" class="form-control" id="address" placeholder="Mail Adresi Giriniz">
                                                                    <input type="hidden"  name="mailYedekSend" class="form-control" id="address" placeholder="Mail Adresi Giriniz">

                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="address2" class="form-label" id="ydkLoaingPlase"></span></label><br>





                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="d-flex align-items-start gap-3 mt-4">
                                                            <button onclick="yedekMailGonder('mailSendSql')" type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-payment-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Mail Adresine Gönder</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-bill-ic" role="tabpanel" aria-labelledby="v-pills-bill-address-tab">
                                                    <div>
                                                        <h5>Yedekleme Ayarları (İçe Aktar )</h5>

                                                    </div>

                                                    <form id="yedekMailAl" onsubmit="return false;" method="POST" enctype="multipart/form-data">
                                                        <div>
                                                            <div class="row g-3">
                                                                <div class="col-12">
                                                                    <label for="address" class="form-label">Sql Yedeğini Yükle </label>
                                                                    <input type="file"  name="yedeksql" class="form-control" id="address" placeholder="Mail Adresi Giriniz">
                                                                    <input type="hidden"  name="mailYedekSend" class="form-control" id="address" placeholder="Mail Adresi Giriniz">

                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="address2" class="form-label" id="ydkSqlLoadingPlase"></span></label><br>





                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="d-flex align-items-start gap-3 mt-4">
                                                            <button onclick="yedekMailAl('yedekMailAl')" type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-payment-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Yedeği Yükle</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-bill-smtp" role="tabpanel" aria-labelledby="v-pills-bill-address-tab">
                                                    <div>
                                                        <h5>Mail (SMTP) Ayarları</h5>

                                                    </div>

                                                    <form id="smtpSettings" onsubmit="return false;" method="POST" enctype="multipart/form-data">
                                                        <div>
                                                            <div class="row g-3">
                                                                <div class="col-12">
                                                                    <label for="address" class="form-label">SMTP HOST </label>
                                                                    <input type="text" value="<?php echo $smtpSettings[0]["mailHost"]; ?>"  name="smtpHost" class="form-control" id="address" placeholder="Mail Adresi Giriniz">

                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="address" class="form-label">FİRMA (Marka) </label>
                                                                    <input type="text"  value="<?php echo $smtpSettings[0]["firmaMarka"]; ?>" name="firmaMarka" class="form-control" id="address" placeholder="Mail Adresi Giriniz">

                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="address" class="form-label">SMTP USER NAME </label>
                                                                    <input type="text"  value="<?php echo $smtpSettings[0]["mailUsername"]; ?>" name="smtpUserName" class="form-control" id="address" placeholder="Mail Adresi Giriniz">

                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="address" class="form-label">SMTP USER PASSWORD </label>
                                                                    <input type="text"  value="<?php echo $smtpSettings[0]["mailPassword"]; ?>" name="smtpPassword" class="form-control" id="address" placeholder="Mail Adresi Giriniz">

                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="address" class="form-label">SMTP MAİL PORT </label>
                                                                    <input type="text" value="<?php echo $smtpSettings[0]["mailPort"]; ?>" name="smtpMailPort" class="form-control" id="address" placeholder="Mail Adresi Giriniz">

                                                                </div>



                                                            </div>

                                                        </div>
                                                        <div class="d-flex align-items-start gap-3 mt-4">
                                                            <button onclick="serialize2('smtpSettings','/smtpSettings')" type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-payment-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Güncelle</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- end tab pane -->
                                                <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                                                    <div>
                                                        <h5>Payment</h5>
                                                        <p class="text-muted">Fill all information below</p>
                                                    </div>

                                                    <div>
                                                        <div class="my-3">
                                                            <div class="form-check form-check-inline">
                                                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                                                                <label class="form-check-label" for="credit">Credit card</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
                                                                <label class="form-check-label" for="debit">Debit card</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
                                                                <label class="form-check-label" for="paypal">PayPal</label>
                                                            </div>
                                                        </div>

                                                        <div class="row gy-3">
                                                            <div class="col-md-12">
                                                                <label for="cc-name" class="form-label">Name on card</label>
                                                                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                                                <small class="text-muted">Full name as displayed on card</small>
                                                                <div class="invalid-feedback">
                                                                    Name on card is required
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="cc-number" class="form-label">Credit card number</label>
                                                                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                                                <div class="invalid-feedback">
                                                                    Credit card number is required
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="cc-expiration" class="form-label">Expiration</label>
                                                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                                                                <div class="invalid-feedback">
                                                                    Expiration date required
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="cc-cvv" class="form-label">CVV</label>
                                                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                                                <div class="invalid-feedback">
                                                                    Security code required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <button type="button" class="btn btn-light btn-label previestab" data-previous="v-pills-bill-address-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back to Shipping Info</button>
                                                        <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-finish-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i> Order Complete</button>
                                                    </div>
                                                </div>
                                                <!-- end tab pane -->
                                                <div class="tab-pane fade" id="v-pills-finish" role="tabpanel" aria-labelledby="v-pills-finish-tab">
                                                    <div class="text-center pt-4 pb-2">

                                                        <div class="mb-4">
                                                            <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                                                        </div>
                                                        <h5>Your Order is Completed !</h5>
                                                        <p class="text-muted">You Will receive an order confirmation email with details of your order.</p>
                                                    </div>
                                                </div>
                                                <!-- end tab pane -->
                                            </div>
                                            <!-- end tab content -->
                                        </div>
                                    </div>
                                    <!-- end col -->

                                   
                                </div>
                                <!-- end row -->

                        </div>
                    </div>
                    <!-- end -->
                </div>
                <!-- end col -->
            </div>

        </div>


        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


<?php require_once $this->footer; ?>
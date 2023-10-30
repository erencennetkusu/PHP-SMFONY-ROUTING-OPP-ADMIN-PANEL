<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>


    <div class="page-content">
        <div class="container-fluid">
            <div class="col-md-12 p-3 m-3 bg-white">
                <form id="blogUpdates" onsubmit="return false" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="firstName" class="form-label">Blog Güncelle</label>
                                <input type="file" name="blogImg"  class="form-control" id="firstName" >
                                <input type="hidden" name="blogID" value="<?php echo $blogList[0]["id"]; ?>">
                            </div>
                        </div>
                        <div class="col-xxl-12">
                            <div>
                                <label for="firstName" class="form-label">Blog Başlık</label>
                                <input type="text" value="<?php echo $blogList[0]["blogTitle"]; ?>" name="blogTitle"  class="form-control" id="firstName" placeholder="blog Başlık giriniz">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-12">

                            <label for="lastName" class="form-label">Blog Açıklama</label>
                            <textarea id="summernote" name="blogDescription" ><?php echo $blogList[0]["blogDescription"]; ?></textarea>

                        </div>

                        <div class="col-xxl-12">
                            <div>
                                <label for="firstName" class="form-label">Blog Tagları</label>
                                <input type="text" name="blogTag" value="<?php echo $blogList[0]["blogTagger"]; ?>"  class="form-control" id="firstName" placeholder="Blog Tagları giriniz">
                            </div>
                        </div>

                        <!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                                <button type="submit" onclick="serialize2('blogUpdates','/blogEditter');" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>

        </div>
    </div>

    <script>

    </script>
<?php require_once $this->footer; ?>
<?php require_once $this->header; ?>
<?php require_once $this->navbar; ?>
<?php require_once $this->sidebar; ?>
    <div class="page-content">
        <div class="container-fluid">
<div class="col-md-12 p-3 m-3 bg-white">
    <form id="blogAdd" onsubmit="return false" method="POST" enctype="multipart/form-data">
        <div class="row g-3">
            <div class="col-xxl-12">
                <div>
                    <label for="firstName" class="form-label">Blog Resim</label>
                    <input type="file" name="blogImg"  class="form-control" id="firstName" >
                </div>
            </div>
            <div class="col-xxl-12">
                <div>
                    <label for="firstName" class="form-label">Blog Başlık</label>
                    <input type="text" name="blogTitle"  class="form-control" id="firstName" placeholder="blog Başlık giriniz">
                </div>
            </div>
            <!--end col-->
            <div class="col-xxl-12">

                <label for="lastName" class="form-label">Blog Açıklama</label>
                <textarea id="summernote" name="blogDescription" ></textarea>
                <input type="hidden"   id="blogDes">
            </div>

            <div class="col-xxl-12">
                <div>
                    <label for="firstName" class="form-label">Blog Tagları</label>
                    <input type="text" name="blogTag"  class="form-control" id="firstName" placeholder="Blog Tagları giriniz">
                </div>
            </div>

            <!--end col-->
            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" onclick="serialize2('blogAdd','/blogAdd');" class="btn btn-primary">Ekle</button>
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
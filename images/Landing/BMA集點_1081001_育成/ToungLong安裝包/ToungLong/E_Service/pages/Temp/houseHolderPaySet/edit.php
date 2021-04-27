
<hr />

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">參數設定</h1> -->
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <h1 class="h3 mb-2 text-gray-800">住宅管理費項目設定-D1</h1>
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">設定</h6> -->
                <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i>編輯</h3>
        </div>
        <div class="card-body">
            <form class="" method="post" onsubmit="">
                <!--Body-->
                <div class="md-form row">
                    <div class="col-md-1 text-center">
                        <label for="">選項</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultChecked">
                            <label class="custom-control-label" for="defaultChecked"></label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <label for="">類別</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label for="">代碼</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="">類別名稱</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="">金額</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="">折扣金額</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">備註</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                    <div class="col-md-12">
                        <label for=" ">變更繳費單-所選擇期數(含)以後同步修改繳費單資料：</label>
                        <select name="" class="custom-select form-control">
                            <option value="Y">變更</option>
                            <option value="N" selected>不變更</option>
                        </select>
                        <!-- <input type="text" name="" class="form-control"> -->
                    </div>
                    <div class="text-center col-md-12">
                        <label for=""></label>
                        <input class="btn btn-primary btn-block" type="submit" name="submit" value="儲存送出" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

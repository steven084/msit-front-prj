<hr />
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">參數設定</h1> -->
    <!-- <p class="mb-4">說明：查詢</a></p> -->
    <!-- DataTales Example -->
    <h1 class="h3 mb-2 text-gray-800">交易科目新增</h1>
    <div class="card shadow mb-4 m-auto">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">設定</h6> -->
            <!-- <h3 class="text-primary text-center white-text py-3"><i class="fas fa-cog"></i> 編輯功能</h3> -->
        </div>
        <div class="card-body">
            <form class="" method="post" onsubmit="">
                <!--Body-->
                <div class="md-form row">
                    <div class="col-md-4">
                        <label for=" ">類別：</label>
                        <select name="" class="custom-select" required>
                            <option value="0">收入</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for=" "><span style='color:red'>*</span>代碼：</label>
                        <input type="text" name="" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for=" "><span style='color:red'>*</span>交易科目名稱：</label>
                        <input type="text" name="" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for=" ">費用屬性：</label>
                        <select name="" class="custom-select" required>
                            <option value="一般費用">一般費用</option>
                            <option value="管理費">管理費</option>
                            <option value="管理費折扣">管理費折扣</option>
                            <option value="公設使用暨消費收入">公設使用暨消費收入</option>
                            <option value="公設消費儲存科目">公設消費儲存科目</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for=" ">預設交易銀行帳號：</label>
                        <select name="" class="custom-select" required>
                            <option value="合作金庫(3476871000234)">合作金庫(3476871000234)</option>
                        </select>
                    </div>
                    <!-- <div class="col-md-4">
                        <label for=" ">摘要：</label>
                        <input type="text" name="" class="form-control">
                        <input type="radio" name="select" value="1" /> 不加 
                        <input type="radio" name="select" value="2" /> 摘要前自動加本月
                        <input type="radio" name="select" value="3" /> 摘要前自動加前月
                    </div> -->
                    <div class="col-md-4">
                        <label for=" ">金額：</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for=" ">入帳方式：</label>
                        <select name="" class="custom-select" required>
                            <option value="現金">現金</option>
                            <option value="匯款">匯款</option>
                            <option value="支票">支票</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for=" "><span style='color:red'>*</span>排序位置：</label>
                        <input type="text" name="" class="form-control" value="40" required>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div class="text-center">
                    <label for=""></label>
                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="儲存送出" />
                </div>
            </form>
        </div>
    </div>
</div>
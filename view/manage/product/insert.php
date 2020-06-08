<style type="text/css">
    .box-1{
        margin: 5px;
        
        border-radius: 5px;
        width: 100%;
        padding: 10px 10px 30px 10px;
        background: white;
    }
    .img-insert{
        padding: 10px 5px 5px 5px;
    }
    .box-2{
        background: white;
        padding: 10px;
    }
    /* The container */
.hop {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.hop input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.hop:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.hop input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.hop input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.hop .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
    
</style>
    <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">                       
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Thêm sản phẩm mới</h3>
                                    <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Thêm sản phẩm</h5>
                                    <div class="card-body">
                                         
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-8" >
                                                    <div class="row">
                                                        <div class="box-1">
                                                            <label>Tên sản phẩm</label>
                                                            <input class="form-control" type="text" name="title">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="box-1">
                                                            <label>Mô tả sản phẩm</label>
                                                            <textarea id="desc" name="desc" class="form-control" ></textarea>
                                                            <br/>
                                                            <label>Chi tiết sản phẩm</label>
                                                            <textarea id="detail" name="detail" class="form-control"></textarea>
                                                        </div>
                                                        <script>    CKEDITOR.replace( 'desc' );</script>
                                                        <script>    CKEDITOR.replace( 'detail' );</script>
                                                    </div>
                                                    
                                                    <div class="row box-2">
                                                        
                                                        <div class="col-md-6">
                                                            <label>Giá (VND)</label> 
                                                            <input class="form-control" type="number" name="price">
                                                            
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Giá khuyến mãi (VND)</label> 
                                                            <input class="form-control" type="number" name="promotionPrice">
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                  
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="box-1">
                                                            Công bố
                                                            <div class="btn-insert" style="width: 100%" align="center">
                                                                <button type="submit" class="btn btn-primary" name="sm"> Công bố</button>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputText3" class="col-form-label">Sản phẩm HOT</label><br>
                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                    <input name="status" value="0" type="radio" name="radio-inline" checked="" class="custom-control-input"><span class="custom-control-label">Không</span>
                                                                </label>
                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                    <input name="status" value="1" type="radio" name="radio-inline" class="custom-control-input"><span class="custom-control-label">Có</span>
                                                                </label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Giới hạn sản phẩm</label>
                                                                <input class="form-control" type="number" name="limit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="box-1">
                                                            <div class="form-group">
                                                                <label for="input-select">Mục sản phẩm</label>
                                                                <select name="type" class="form-control">
                                                                    <?php foreach($type as $t): ?>
                                                                    <option value="<?=$t->id?>"><?=$t->name?></option>
                                                                
                                                                    <?php endforeach ?>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="box-1">
                                                            Thêm hình ảnh đại diện
                                                            <input name="img" type="file" onchange="readURL(this);" class="form-control" id="file">
                                                            <div class="img-insert">
                                                                <img id="blah" src="../upload/avatar.jpg" width="100%">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="box-1">
                                                            Thêm hình ảnh liên quan
                                                            <input type="file" name="avatar[]" multiple>
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <script type="text/javascript">
                     function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#blah')
                                    .attr('src', e.target.result);
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
            </script>
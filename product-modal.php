<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form id="prodForm" role="form" method="post" enctype="multipart/form-data">
        <div class="modal-content">
        <div class="modal-header" style="background-color:#3c8dbc; color: #fff;">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        </div>
        <div class="modal-body">
            <div class="box-body">
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" class="form-control" id="category">
                <?php
                $id = 1;
                if(!empty($catRows)) { 
                    foreach($catRows as $row) {
                ?>
                    <option value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></option>
                <?php
                    }
                }
                ?>
                </select>
                <br>
                <label for="brand">Brand</label>
                <select name="brand" class="form-control" id="brand">
                <?php
                $id = 1;
                if(!empty($brandRows)) { 
                    foreach($brandRows as $row) {
                ?>
                    <option value="<?php echo $row["brand_id"]; ?>"><?php echo $row["brand_name"]; ?></option>
                <?php
                    }
                }
                ?>
                </select>
                <br>
                <label for="prodName">Name</label>
                <input type="text" name="prodName" class="form-control" id="prodName" placeholder="Please enter name of product">
                <br>
                <label for="prodDesc">Description</label>
                <textarea name="prodDesc" class="form-control" id="prodDesc" placeholder="Please enter product description"></textarea>
                <br>
                <label>Select Image File:</label>
                <input type="file" name="image" id="image" accept=".jpg, .png">
                <br>
                <label for="qty">Qty</label>
                <input type="number" name="qty" class="form-control" id="qty">
                <br>
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price">

                <input type="hidden" name="oldProdName" class="form-control" id="oldProdName" placeholder="" disabled>
                <input type="hidden" name="inputIsActive" class="form-control" id="inputIsActive" placeholder="" disabled>
            </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" name="myCheck" id="myCheck" checked disabled> Active
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" name="myPreOrder" id="myPreOrder"> Available in Pre-order
                    </label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <input type="submit" name="add_record" class="btn btn-primary" id="submit" value="Submit">
        <input type="button" name="close" class="btn btn-secondary" value="Close" data-dismiss="modal">
        </div>
    </div>
    </form>
    </div>
</div>
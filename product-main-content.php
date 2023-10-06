<div class="box">
    <div class="box-header">
        <h3 class="box-title">Masterlist of registered products</h3>
        <!-- Button trigger modal -->
        <div style="float: right;">
        <button action-name="add" id="add" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" onClick="chk_control('dsb')";>
            Add New
        </button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped" style="table-layout: fixed;">
        <thead>
            <tr>
            <th style="width: 30px">ID</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Name</th>
            <th>Description</th>
            <th style="width: 35px">Qty</th>
            <th style="width: 50px">Price</th>
            <th style="width: 50px">Active</th>
            <th style="width: 50px">Pre-order</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $id = 1;
            if(!empty($prodRows)) { 
            foreach($prodRows as $row) {
            ?>
            <?php if($row['qty'] < 10) {
                echo "<tr style='background-color: #D57E7E; color: #fff;'>";
            } ?>
            
            <td><?php echo $id ?></td>
            <td><?php echo $row["cat_name"]; ?></td>
            <td><?php echo $row["brand_name"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["description"]; ?></td>
            <td><?php echo $row["qty"]; ?></td>
            <td><?php echo $row["price"]; ?></td>
            <td cat-active="<?php echo $row["is_active"]; ?>"><?php echo ($row["is_active"] == 1) ? "Yes" : "No"; ?></td>
            <td cat-ispreorder="<?php echo $row["is_pre_order"]; ?>"><?php echo ($row["is_pre_order"] == 1) ? "Yes" : "No"; ?></td>
            <td>
                <button action-name="edit" 
                cat-name="<?php echo $row['cat_name']; ?>" 
                brand-name="<?php echo $row['brand_name']; ?>"
                prod-name="<?php echo $row['name']; ?>"
                prod-desc="<?php echo $row['description']; ?>"
                prod-image="<?php echo $row['image']; ?>"
                prod-image-name="<?php echo $row['image_name']; ?>"
                prod-qty="<?php echo $row['qty']; ?>"
                prod-price="<?php echo $row['price']; ?>"
                prod-is-active="<?php echo $row['is_active']; ?>" 
                prod-is-pre-order="<?php echo $row['is_pre_order']; ?>" 
                class="btn btn-primary update" id="update" data-toggle="modal" data-target="#exampleModal">
                Edit
                </button>
                <button class="btn btn-danger" id="delete">Delete</button>
            </td>
            </tr>
            <?php

            $id += 1;
            }
            }
            ?>
        </tbody>
        </table>
    </div><!-- /.box-body -->
    </div><!-- /.box -->
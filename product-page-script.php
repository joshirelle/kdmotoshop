<!-- page script -->
<script type="text/javascript">
    $(function () {
    $("#example1").dataTable();
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
    });

    $('#exampleModal').on('show.bs.modal', function (e) {
    // get information to update quickly to modal view as loading begins
    var opener=e.relatedTarget;//this holds the element who called the modal
    //we get details from attributes
    var catname=$(opener).attr('cat-name');
    var brandname = $(opener).attr('brand-name');
    var prodname = $(opener).attr('prod-name');
    var proddesc = $(opener).attr('prod-desc');
    var prodimage = $(opener).attr('prod-image');
    var prodimagename = $(opener).attr('prod-image-name');
    var prodqty = $(opener).attr('prod-qty');
    var prodprice = $(opener).attr('prod-price');
    var actionName=$(opener).attr('action-name');
    var prodIsActive=$(opener).attr('prod-is-active');
    var prodIsPreOrder=$(opener).attr('prod-is-pre-order');
    
    document.getElementById("exampleModalLabel").innerHTML = (actionName == "add") ? "Add New Product" : "Edit Product";

    //set what we got to our form
    if (actionName == "edit") {
        document.getElementsByName('category')[0].options[0].innerHTML = catname;
        document.getElementsByName('brand')[0].options[0].innerHTML = brandname;
        document.getElementById("myCheck").checked = (prodIsActive == 1) ? true : false;
        document.getElementById("myPreOrder").checked = (prodIsPreOrder == 1) ? true : false;
    }

    document.getElementById("myCheck").disabled = (actionName == "add" ? true : false);

    $('#prodForm').find('[name="prodName"]').val(prodname);
    $('#prodForm').find('[name="oldProdName"]').val(prodname);
    $('#prodForm').find('[name="prodDesc"]').val(proddesc);
    
    if (actionName == "edit") {
        const fileInput = document.querySelector('input[type="file"]');

        let blob = new Blob([prodimage], {
            type: "application/pdf"
        });
        const myFile = new File([blob], prodimagename, {type: "image/jpeg", lastModified:new Date().getTime()});

        // Now let's create a DataTransfer to get a FileList
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(myFile);
        document.querySelector('#image').files = dataTransfer.files;
    }
    
    $('#prodForm').find('[name="qty"]').val(prodqty);
    $('#prodForm').find('[name="price"]').val(prodprice);

    $(document).on('click', '#submit', function(e) {
        e.preventDefault();

        //var data = $("#catForm").serialize();
        var cat_id = document.getElementById("category").value;
        var brand_id = document.getElementById("brand").value;
        var name = $('#prodForm').find('[name="prodName"]').val();
        var description = $('#prodForm').find('[name="prodDesc"]').val();
        var qty = $('#prodForm').find('[name="qty"]').val();
        var price = $('#prodForm').find('[name="price"]').val();
        
        var oldProdName = $('#prodForm').find('[name="oldProdName"]').val();
        
        var isChecked = document.getElementById("myCheck").checked;
        var isActive = (isChecked == true) ? 1 : 0;

        var isPreOrdered = document.getElementById("myPreOrder").checked;
        var isPreOrder = (isPreOrdered == true) ? 1 : 0;

        var image = $("#image")[0].files;
        var addData = new FormData();
        addData.append('cat_id', cat_id);
        addData.append('brand_id', brand_id);
        addData.append('name', name);
        addData.append('description', description);
        addData.append('qty', qty);
        addData.append('price', price);
        addData.append('image', image[0]);

        var data = new FormData();
        data.append('cat_id', cat_id);
        data.append('brand_id', brand_id);
        data.append('name', name);
        data.append('description', description);
        data.append('qty', qty);
        data.append('price', price);
        data.append('isActive', isActive);
        data.append('isPreOrder', isPreOrder);
        data.append('oldProdName', oldProdName);
        data.append('image', prodimage);
        data.append('image_name', image[0]['name']);

        $.ajax({
        data: (actionName == "add") ? addData : data,
        type: "post",
        contentType: false,
        cache: false,
        processData: false,
        url: (actionName == "add") ? "crud/products/create.php" : "crud/products/update.php",
        success: function(res) {
            //alert(res);
            location.reload();
        },
        error: function(e) {
            alert("error while trying to add or update user!");
        }
        });
    });
    });

    $(document).on('click', '#delete', function (e) {
        var name = $(this).parents('tr').find("td:eq(3)").text();
        
        $.ajax({
        data: {name: name},
        type: "post",
        url: "crud/products/delete.php",
        success: function(res) {
            //alert("Selected record has been deleted successfully");
            location.reload();
        }
        });
    });
</script>
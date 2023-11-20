<!-- Checkout Start -->
<div class="container-fluid">
    <form id="billing-addr-form" method="post" role="form"> 
        <div class="form-group">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter">Change Billing Address</a>
                </div>
            </div>
        </div>
        <!-- Change Address Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">My Billing Address</h5>
                <button type="button" class="btn btn-primary" id="add-new-address" action-name="add">
                  <span aria-hidden="true"><i class="fa fa-plus" aria-hidden="true"></i> Add New Address</span>
                </button>
              </div>
                <div class="modal-body">
                    <?php
                    if(!empty($addr)) { 
                        foreach($addr as $row) {
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" 
                                id="flexRadioDefault<?php echo $row['addr_id']; ?>" 
                                value="<?php echo $row['addr_id']; ?>" 
                                <?php echo ($row['is_default'] == 1) ? 'checked' : ''; ?> />
                                <label class="form-check-label" 
                                    for="flexRadioDefault<?php echo $row['addr_id']; ?>">
                                
                                    <strong>
                                        <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>
                                    </strong> | (<?php echo $row['mobile']; ?>)  | 

                                    <?php echo $row['addr_line']; ?>, 
                                    <?php echo $row['city']; ?>, <?php echo $row['state']; ?>, 
                                    <?php echo $row['zip']; ?>, <?php echo $row['country']; ?>
                                </label> 

                                <small><i><?php echo $row['email']; ?></i></small> 
                                
                                <?php echo ($row['is_default'] == 1) ? '<span class="badge badge-primary">Default</span>' : ''; ?>

                                <p></p>

                                <a href="#" class="edit-address" id="edit-address" action-name="edit" 
                                    data-params=<?php echo $row['addr_id']; ?>
                                    first-name=<?php echo $row['fname']; ?>
                                    last-name=<?php echo $row['lname']; ?>
                                    email=<?php echo $row['email']; ?>
                                    mobile=<?php echo $row['mobile']; ?>
                                    addr_line=<?php echo $row['addr_line']; ?>
                                    country=<?php echo $row['country']; ?>
                                    city=<?php echo $row['city']; ?>
                                    state=<?php echo $row['state']; ?>
                                    zip=<?php echo $row['zip']; ?>
                                    is-default=<?php echo $row['is_default']; ?>
                                    >Edit</a> |

                                <a href="#" class="delete-address" id="delete-address" 
                                action-name="delete" 
                                    data-params=<?php echo $row['addr_id']; ?>>Delete</a>

                                <p></p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close-modal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn-confirm">Confirm</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Add/Edit Address Modal -->
        <div class="modal fade" id="exampleAddEditModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleAddEditModalCenterTitle" aria-hidden="true" data-backdrop="static">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleAddEditModalLongTitle"></h5>
              </div>
              <div class="modal-body">
                    <div class="form-row">
                    <div class="form-group col-md-6">
                     <input type="hidden" name="default_address_id" class="form-control" 
                     id="default_address_id" value="<?php echo $row['addr_id']; ?>" disabled>

                      <label for="input-first-name">First Name</label>
                      <input type="text" name="input-first-name" class="form-control" id="input-first-name" placeholder="John" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="input-last-name">Last Name</label>
                      <input type="text" name="input-last-name" class="form-control" id="input-last-name" placeholder="Doe" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="input-email">E-mail</label>
                      <input type="email" name="input-email" class="form-control" id="input-email" placeholder="example@email.com" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="input-mobile">Mobile No</label>
                      <input type="text" name="input-mobile" class="form-control" id="input-mobile" placeholder="+123 456 789" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="input-address1">Address Line 1</label>
                      <input type="text" name="input-address1" class="form-control" id="input-address1" placeholder="123 Street" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="choose-country">Country</label>
                      <select name="choose-country" class="form-control" id="choose-country">
                        <option selected>Philippines</option>
                        <!-- <option>...</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="input-city">City</label>
                      <input type="text" name="input-city" class="form-control" id="input-city" placeholder="New York" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="input-state">State</label>
                      <input type="text" name="input-state" class="form-control" id="input-state" placeholder="New York" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="input-zip">Zip</label>
                      <input type="text" name="input-zip" class="form-control" id="input-zip" placeholder="123" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <input type="checkbox" name="choose-as-default-addr" class="form-check-input"  id="choose-as-default-addr">
                      <label class="form-check-label" for="choose-as-default-addr">
                        Set as Default Address
                      </label>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btn-close">Close</button>
                <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
              </div>
            </div>
          </div>
        </div>
    </form> 
    <!-- https://www.sandbox.paypal.com/cgi-bin/webscr -->
    <form method='post'>
        <div class="row px-xl-5">
            <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
            <?php
            if(!empty($addrRows)) { 
                foreach($addrRows as $row) {
                    ?>
                    <div class="bg-light p-30 mb-5">
                            <div class="row">
                                <input type="hidden" name="address_override" value="1">
                                <div class="col-md-6 form-group">
                                    <input class="form-control" type="hidden" name="default_address_id" id="default_address_id" value="<?php echo $row['addr_id']; ?>" disabled>

                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="first_name" id="first_name" placeholder="John" value="<?php echo $row['fname']; ?>" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Doe" value="<?php echo $row['lname']; ?>" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" name="email" id="email" placeholder="example@email.com" value="<?php echo $row['email']; ?>" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" name="night_phone_c" id="night_phone_c" placeholder="+123 456 789" value="<?php echo $row['mobile']; ?>" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 1</label>
                                    <input class="form-control" type="text" name="address1" id="address1" placeholder="123 Street" value="<?php echo $row['addr_line']; ?>" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Country</label>
                                    <select class="custom-select" name="country" id="country" required>
                                        <option selected="<?php echo $row['country']; ?>">Philippines</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" name="city" id="city" value="<?php echo $row['city']; ?>" placeholder="New York" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>State</label>
                                    <input class="form-control" type="text" name="state" id="state" value="<?php echo $row['state']; ?>" placeholder="New York" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" name="zip" id="zip" value="<?php echo $row['zip']; ?>" placeholder="123" required>
                                </div>
                               
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="shipto">
                                        <label class="custom-control-label" for="shipto"  data-toggle="" data-target="#shipping-address">Ship to different address</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <?php
                    }
                }
            ?>

                <div class=" mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30" id="shipping-address">
                        <div class="row">
                            <input type="hidden" name="address_override" value="1">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" placeholder="John" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="last_name"  id="last_name" placeholder="Doe" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email"  id="email" placeholder="example@email.com" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="night_phone_c"  id="night_phone_c" placeholder="+123 456 789" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" name="address1"  id="address1" placeholder="123 Street" disabled>
                        </div>
                        <!-- <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street" required>
                        </div> -->
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="country" id="country" disabled>
                                <option selected>Philippines</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="city"  id="city" placeholder="New York" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" name="state"  id="state" placeholder="New York" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" name="zip"  id="zip" placeholder="123" disabled>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom products">
                        <h6 class="mb-3">Products</h6>
                        <?php
                            $total = 0;
                            $prodName= "";
                            if (!empty($_SESSION["cart_item"])){
                                foreach($_SESSION["cart_item"] as $k => $v) {
                                    $total = (float)$_SESSION["cart_item"][$k]["price"] * (int)$_SESSION["cart_item"][$k]["qty"];

                                    $itemArray = array($_SESSION["cart_item"][$k]["name"]=>array(
                                        'name'=>$_SESSION["cart_item"][$k]["name"],
                                        'qty'=>$_SESSION["cart_item"][$k]["qty"],
                                        'price'=>$_SESSION["cart_item"][$k]["price"]));

                                     $_SESSION["cart_item_2"] = array_merge($_SESSION["cart_item_2"], $itemArray);

                                    $prodName = $_SESSION["cart_item"][$k]["name"];

                                    $sql = "SELECT is_pre_order, eta FROM products WHERE prod_name = :name";
                                    $pdo_statement = $pdo_conn->prepare($sql);
                                    $pdo_statement->execute(array(':name'=>$prodName));
                                    $result = $pdo_statement->fetchAll();
                        ?>
                            <div class="d-flex justify-content-between">
                            <p><?php echo $_SESSION["cart_item"][$k]["name"]; ?><?php echo ($result[0][0] == 1) ? '<br /><small><span class="badge badge-danger">PRE-ORDER</span> | <span class="badge badge-info">ETA: ' . ucwords($result[0][1]) . ' </span></small>' : '' ?></p>
                            <p name="prod-total"><?php echo number_format($total, 2); ?></p>
                        </div>
                        <?php 
                             }
                            }
                        ?>


                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <?php
                            $product = "";
                            $subtotal = 0;
                            $itemNumber = 0;
                            $grandtotal = 0;

                            if (!empty($_SESSION["cart_item"])){
                                foreach ($_SESSION["cart_item"] as $item){
                                    $arr[] = (string)$item["name"];
                                    $array_string = implode(", ", $arr);

                                    $arrItem[] = (string)$item["prod_id"];
                                    $array_item = implode(", ", $arrItem);

                                    $subtotal = (float)$item["price"] * (int)$item["qty"];
                                    $grandtotal += $subtotal;

                                    // $itemNumber = $item["prod_id"];
                                }
                            }
                            ?>
                            <h6><?php echo number_format($grandtotal, 2); ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium"><?php echo number_format(0, 2); ?></h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?php echo number_format($grandtotal, 2); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                         <!-- method='post' action='https://www.sandbox.paypal.com/cgi-bin/webscr' -->
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" checked>
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="cod">
                                <label class="custom-control-label" for="cod">Cash on Delivery</label>
                            </div>
                        </div>
                        <input type='text' name='business' value='sb-wekve26132175@business.example.com'>
                        <input type='text' name='item_number' value='<?php echo $array_item; ?>'>
                        <input type='text' name='item_name' value='<?php echo $array_string; ?>'>
                        <input type='text' name='amount' id="grandtotal" value='<?php echo $grandtotal; ?>'>
                        <input type='text' name='currency_code' value='PHP'>

                        <!-- <input type="hidden" name="first_name" value="Pedro">
                        <input type="hidden" name="last_name" value="Penduko">
                        <input type="hidden" name="address1" value="345 Lark Aveasdasd">
                        <input type="hidden" name="city" value="San Jose"> 
                        <input type="hidden" name="state" value="CA"> 
                        <input type="hidden" name="zip" value="95121">  -->

                        <input type="hidden" name="country" value="Philippines">
                        <!-- <input type='hidden' name='return' value='http://localhost/kdshopclient/unset_session.php'> -->
                        <input type='hidden' name='return' value='http://localhost/kdshopclient/tracking.php'>
                        <input type='hidden' name='cancel_return' value='http://localhost/kdshopclient/cancel_return.php'>
                        <input type='hidden' name='notify_url' value='http://localhost/kdshopclient/notify.php'>
                        <input type="hidden" name="cmd" value="_xclick">
                        <button type="submit" name="submit-btn" id="submit-btn" class="btn btn-block btn-primary font-weight-bold py-3 pay">
                        Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
   
</div>
<!-- Checkout End -->
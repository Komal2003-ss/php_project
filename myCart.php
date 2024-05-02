<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Responsive plants website - Bedimcode</title>

    <style>
        .header{
            top: 35px !important;
        }
        .top_header{
  /* max-height: px; */
  /* display: block; */
  background-color: #0F4C36;
  color:white;
  max-height: 40px;
  text-align: center;
  justify-content: center;
  position: fixed;
  top:0px;
  left: 0px;
  z-index: 2;
  width: 100%;
}
.top_header p{
  display: flex;
  justify-content: center;
  align-items: center;
  padding:6px 0px !important;
  
}
.theader{
    display:flex;
    justify-content:space-between;
    width:100%;
}

body .card{
    /* height:400px; */
    box-shadow:0px 4px 5px;
}
    </style>
</head>

<body>
   <?php include('navbar.php') ?>
    <!-- <----Top Header -->


   <section class="product section container best_picks" id="products">
            <h2 class="section__title-center border rounded bg-light">
                All Cart Products 
            </h2>
            <?php

            // print_r($_SESSION['cart']);
            ?>
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                        <th scope="col">Serial No.</th>
                        <th scope="col">Plant Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php 
                        $total =0;
                        if(isset($_SESSION['cart']))
                        {
                            foreach($_SESSION['cart'] as $key => $value)
                            {   
                                $sr =$key+1;
                                $total = $total + $value['item_price'];
                                print_r($total);
                                echo "
                                    <tr>
                                    <td>$sr</td>
                                    <td>$value[item_name]</td>
                                    <td>$value[item_price]<input type='hidden' class='iprice' value='$value[item_price]'</td>
                                    <td><input class='text-center iquantity' onChange='subTotal()' type='number' value='$value[quantity]' min='1' max='10'></td>
                                    <td>
                                    <td class='itotal'></td>
                                    <td>
                                    <form action='manage_cart.php' method='POST'>
                                        <button name='remove_cart' class='btn btn-outline-danger btn-sm'>Delete</button>
                                        <input type='hidden' name='item_name' value='$value[item_name]'>
                                    </form>
                                    </td>
                                    </tr>
                                ";
                            }
                        }
                        ?>
                    
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <div class="border bg-light p-4">
                    <h4>Total :</h4>
                    <h5 class="text-right d-block"><?php echo $total ?></h5>
                    <br>
                    <form>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Cash On Delivery
                        </label>
                    </div>

                        <button class="btn btn-primary btn-block">Make Purchase</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>

    
    <?php include('plugins/footer.php') ?>
    
 

    <!--=============== SCROLL REVEAL ===============-->


    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    <script>
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');

        function subTotal()
        {
            for(var=0;i<iprice.length;i++)
            {
                itotal[i].innerText =(iprice[i].value)*(iquantity[i].value);
            }
        }
        subTotal();
    </script>
</body>

</html>
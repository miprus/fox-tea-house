<?php
    $query_orders = "SELECT o.*, u.username, p.product_name FROM orders o, users u, products p WHERE o.userID = u.userID AND p.productID = o.productID";
    $sql_orders = mysqli_query($con, $query_orders);

    if(mysqli_num_rows($sql_orders) > 0){
        $orderID = array();
        $userID = array();
        $username = array();
        $product_name = array();
        $order_amount = array();
        $order_price = array();
        $date = array();

        while($rowOrders = mysqli_fetch_array($sql_orders, MYSQLI_ASSOC)){
            $orderID[] = $rowOrders['orderID'];
            $userID[] = $rowOrders['userID'];
            $username[] = $rowOrders['username'];
            $product_name[] = $rowOrders['product_name'];
            $order_amount[] = $rowOrders['order_amount'];
            $order_price[] = $rowOrders['order_price'];
            $date[] = $rowOrders['order_date'];
        }

        echo('
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Order Total Amount</th>
                            <th scope="col">Order Price</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>

                    <tbody>
        ');

            for($i = 0; $i < count($orderID); $i++){ 
                echo('
                    <tr>
                        <td>' . $orderID[$i] . '</td>
                        <td>' . $userID[$i] . '</td>
                        <td>' . $username[$i] . '</td>
                        <td>' . $product_name[$i] . '</td>
                        <td>' . $order_amount[$i] . '</td>
                        <td>£' . $order_price[$i] . '</td>
                        <td>' . $date[$i]. '</td>
                    </tr>
                ');
            }

        echo('
                    </tbody>
                </table>
            </div>
        '); 
    } else {
        echo('<h4 class="error-message">No data to display</h4>');
    }
?>
<?php
    $query_address = "SELECT u.*, a.* FROM users u, addresses a WHERE u.addressID = a.addressID";
    $sql_address = mysqli_query($con, $query_address);

    if(false !== $sql_address){
        $userID = array();
        $name = array();
        $surname = array();
        $country = array();
        $city = array();
        $address = array();
        $post_code = array();

        while($rowAddress = mysqli_fetch_array($sql_address, MYSQLI_ASSOC)){
            $userID[] = $rowAddress['userID'];
            $name[] = $rowAddress['name'];
            $surname[] = $rowAddress['surname'];
            $country[] = $rowAddress['country'];
            $city[] = $rowAddress['city'];
            $address[] = $rowAddress['address'];
            $post_code[] = $rowAddress['post_code'];
        }

        echo('
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Country</th>
                        <th scope="col">City</th>
                        <th scope="col">Address</th>
                        <th scope="col">Post Code</th>
                    </tr>
                    </thead>

                    <tbody>
        ');

            for($i = 0; $i < count($userID); $i++){ 
                echo('
                    <tr>
                        <td>' . $userID[$i] . '</td>
                        <td>' . $name[$i] . '</td>
                        <td>' . $surname[$i] . '</td>
                        <td>' . $country[$i] . '</td>
                        <td>' . $city[$i] . '</td>
                        <td>' . $address[$i]. '</td>
                        <td>' . $post_code[$i] . '</td>
                    </tr>
                ');
            }

        echo('
                    </tbody>
                </table>
            </div>
        ');   
    } else {
        echo('<h3 class="error-message">>No data to display</h3>');
    }
?>
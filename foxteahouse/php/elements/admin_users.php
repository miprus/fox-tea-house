<?php
    $query_users = "SELECT * FROM users WHERE userID != 99999";
    $sql_users = mysqli_query($con, $query_users);

    if(false !== $sql_users){
        $userID = array();
        $username = array();
        $password = array();
        $name = array();
        $surname = array();
        $email = array();

        while($rowUsers = mysqli_fetch_array($sql_users, MYSQLI_ASSOC)){
            $userID[] = $rowUsers['userID'];
            $username[] = $rowUsers['username'];
            $password[] = $rowUsers['pass'];
            $name[] = $rowUsers['name'];
            $surname[] = $rowUsers['surname'];
            $email[] = $rowUsers['email'];
        }

        echo('
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>

                    <tbody>
        ');

            for($i = 0; $i < count($userID); $i++){ 
                echo('
                    <tr>
                        <td>' . $userID[$i] . '</td>
                        <td>' . $username[$i] . '</td>
                        <td>' . $password[$i] . '</td>
                        <td>' . $name[$i] . '</td>
                        <td>' . $surname[$i] . '</td>
                        <td>' . $email[$i]. '</td>
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
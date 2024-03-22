<?php

function loginLMS($username, $password) {
    echo "
        <script type='text/javascript'>
            function enviarForm(){
                document.getElementById('loginForm').submit();
            }
            enviarForm()
        </script>

        <body onLoad='enviarForm();'>
            <form style='display:none;' id='loginForm' action='http://192.168.1.170/zajuna/login/index.php' class='form' method='POST'>
                <input type='text' id='username' name='username' value='$username'>
                <input type='password' id='password' name='password' value='$password'>
                <input type='submit' value='Submit'>
            </form>
        </body>
    ";
}
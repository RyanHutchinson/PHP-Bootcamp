<?php

    if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'])
    {
        if(!file_exists("../private")){
            mkdir("../private");
        }
        if(!file_exists("../private/passwd")){
            file_put_contents("../private/passwd", NULL);
        }
        $account = unserialize(file_get_contents("../private/passwd"));
        $found = 0;
        if($account){
            foreach($account as $k => $v)
                if ($v['login'] == $_POST['login'])
                    $found = 1;
        }
        if($found){
            echo "ERROR\n";
        }else{
            $tmp['login'] = $_POST['login'];
            $tmp['passwd'] = hash("sha256", $_POST['passwd']);
            $account[] = $tmp;
            file_put_contents("../private/passwd", serialize($account));
            echo "OK!\n";
        }
    }
    else
        echo "ERROR\n";
?>
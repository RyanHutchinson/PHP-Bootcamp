<?php

    if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit']){

        $account = unserialize(file_get_contents("../private/passwd"));
        $found = 0;
        $i = 0;
        if($account){
            foreach($account as $k => $v){
                if ($v['login'] == $_POST['login']){
                    $found = 1;
                    break;
                }
                $i++;
            }
        }
        $newhash = hash("sha256", $_POST['oldpw']);
        if(!$found){
            echo "ERROR not found\n";
        }elseif(!strcmp($account[$i]['passwd'], $newhash)){
            echo "ERROR password mismatch\n";
        }else{
            unset($account[$i]);
            $tmp['login'] = $_POST['login'];
            $tmp['passwd'] = $newhash;
            $account[] = $tmp;
            $account = array_values($account);
            file_put_contents("../private/passwd", serialize($account));
            echo "OK!\n";
        }
    }
    else
       echo "ERROR\n";
?>
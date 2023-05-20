<?php
    //$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxMjN9.NYlecdiqVuRg0XkWvjFvpLvglmfR1ZT7f8HeDDEoSx8';
    $token = 'eyJhbGciOiJIUzI1NiJ9.eyJVc2VybmFtZSI6IkMuVi5UIiwiUGFzc3dvcmQiOiJy4bubdCBhbmRyb2lkIn0.aVxVdLu--V6rpGv';
    //$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxMjMsInBhc3MiOiJDVlRwcm8ifQ.52eIUHp4GSku6GP14-CEmrcZqpfJuBM-CzJSDtLuFKY';
    $arr = (json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1])))));
    print_r($arr);
    //echo $arr -> Username;
?>
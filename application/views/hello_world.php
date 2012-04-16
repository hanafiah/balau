<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h2>hello world</h2>
        <?php
        foreach($collection as $row){
            echo $row['title'] , '<br/>';
        }
        ?>
    </body>
</html>

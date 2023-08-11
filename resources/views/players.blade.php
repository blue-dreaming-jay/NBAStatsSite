<!DOCTYPE html>
<html>
<head>
<title>Hello World</title>
</head>

<body>
Just a test...
<div>
    <p>
        <?php
        $size=sizeOf($firstname);
        for ($i=0; $i<$size; $i++){
            echo "<a href='/players/{$firstname[$i]['firstname']}-{$lastname[$i]['lastname']}'>{$firstname[$i]['firstname']} {$lastname[$i]['lastname']}</a>";
        };
        ?>

    </p>
</div>
</body>
</html> 
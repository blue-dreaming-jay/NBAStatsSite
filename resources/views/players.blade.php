<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<title>Hello World</title>
</head>

<body>
Just a test...
<div>
    <?php
        echo "<script type='module'>
            import {add_div} from '/js/players.js';
            window.addDiv=add_div;
            add_div('alphabet', '');
        </script>";

        $alphabet=[
            '',
            'A', 
            'B', 
            'C', 
            'D', 
            'E', 
            'F', 
            'G', 
            'H', 
            'I', 
            'J', 
            'K', 
            'L', 
            'M', 
            'N', 
            'O', 
            'P',
            'Q', 
            'R', 
            'S', 
            'T', 
            'U', 
            'V', 
            'W', 
            'X',
            'Y',
            'Z'
        ];

        $i=0;

        echo "<script type='module'>
        import {add_div} from '/js/players.js';
        window.addDiv=add_div;
        add_div('empty', '{$alphabet[$i]}');
        </script>";

        echo "<script type='module'> 
        import {add_anchor} from '/js/players.js';
        window.addAnchor=add_anchor;
        add_anchor('{$names[0]['firstname']} {$names[0]['lastname']}', '/players/{$names[0]['firstname']}-{$names[0]['lastname']}', 'empty');
    </script>";

        foreach (array_slice($names, 1) as $name){
            if ($alphabet[$i] != strtoupper(substr($name['lastname'], 0, 1))){
                $i+=1;
                //echo "<a id='{$alphabet[$i]}'></a>";

                echo "<script type='module'>
                    import {add_div} from '/js/players.js';
                    window.addDiv=add_div;
                    add_div('{$alphabet[$i]}', '{$alphabet[$i]}');
                </script>";


                echo "<script type='module'> 
                    import {add_anchor} from '/js/players.js';
                    window.addAnchor=add_anchor;
                    add_anchor('{$alphabet[$i]}', '#{$alphabet[$i]}', 'alphabet', false);
                </script>";
                //echo "<div id={$alphabet[$i]}> </div>";
                //echo "<p class='big-text'> {$alphabet[$i]} </p>";
            };
            echo "<script type='module'> 
                import {add_anchor} from '/js/players.js';
                window.addAnchor=add_anchor;
                add_anchor('{$name['firstname']} {$name['lastname']}', '/players/{$name['firstname']}-{$name['lastname']}', '{$alphabet[$i]}');
            </script>";
            //echo "<a href='/players/{$name['firstname']}-{$name['lastname']}'>{$name['firstname']} {$name['lastname']}</a>" . "<br>";
        };
    ?>
</div>
</body>
</html> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Tanjung Lesung Management System' }}</title>
    <style>
        table.header td p{
                font-size: 45px;
                margin: 0%;
            }
        table.header td p a{
            text-decoration: none;
            color: #000;
            }
        .kop {
            width: 100%;
            box-sizing: border-box; /* penting biar padding nggak nambahin lebar total */
            position: fixed;
            top: 0px;
            left: 0;
            background-color: #FF4E98;
            padding: 0 30px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .kop ul {
            margin: 0;
            padding: 0;
            display: flex; 
            justify-content: space-between; 
        }
        
        .kop li {
            list-style-type: none;
        }
        .kop a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 18px 12px;
            transition: 0.3s;
            vertical-align: middle;
        }

        .kop a:hover {
            color: #dfdfdf;
            border-radius: 4px;
        }

        .settings {
                margin-left: 200px;
                margin-right: 30px;
                margin-top: 75px;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }
            
    </style>
</head>
<body>
    <div class="kop">
        <ul>
            <li style="justify-content: center; text-align: center; display: flex; "><a href="/"><b>Tanjung Lesung Management System</b></a></li>
            </li>
        </ul>      
    </div>
    
    {{ $slot }}
</body>
</html>

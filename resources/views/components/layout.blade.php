<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="{{ asset('logotj.png') }}" type="image/png">
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Default Title' }}</title>
    <style>
        td.button-edit {
            background-color: white;
            color: black;
            border: none;
            padding: 1px 2px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            border: 1px solid black;
        }
        button.button-edit {
            background-color: white;
            color: black;
            border: none;
            padding: 1px 2px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }
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
            box-sizing: border-box;
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
        .arrow-hover {
            position: relative;
            display: inline-block;
            padding-left: 20px;
            transition: transform 0.3s ease;
        }
        .arrow-hover::before {
            content: "◀";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateX(-10px) translateY(-50%);
            opacity: 0;
            transition: all 0.3s ease;
            color: white;
            font-weight: bold;
        }
        .arrow-hover:hover {
            transform: translateX(10px);
        }
        .arrow-hover:hover::before {
            opacity: 1;
            transform: translateX(0) translateY(-50%);
        }
        img{
            width: 20px;
            vertical-align: bottom;
            color: white;
        }
        .settings {
            margin-left: 200px;
            margin-right: 30px;
            margin-top: 75px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .sidebar {
            position: fixed;
            top: 60px;
            left: 0px;
            width: 200px; 
            height: 100vh;
            background-color: #f7f7f7;
            padding-top: 20px; 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .sidebar a {
            text-decoration: none;
            color: black;
            padding: 10px;
            font-size: 13px;
            display: block;
            transition: 0.3s ease;
        }
        .sidebar a:hover {
            color: grey;
            font-weight: bold;
            border-radius: 8px;
            background: #c9c9c950;
        }
        .sidebar a.active {
            background-color: #c9c9c950;
            color: #FF4E98;
            font-weight: bold;
            border-radius: 8px;
        }
        .settings table.data{
            width:100%;
            border:1px solid #c9c9c950;
        }
        .settings table.data th{
            background-color: #D8D8D8;
            font-size: 16px;
            color: #393939;
        }
        .settings table.data td{
            font-size: 14px;
            text-align: center;
            background-color: #c9c9c950;
        }
        .navlink {
            margin: 0;
            padding: 5px;
            border: 1px solid #ccc; 
            border-radius: 8px;      
            display: inline-block;    
            background-color: #fff; 
        }
        .navlink ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .navlink li {
            display: inline;
        }
        .navlink li a {
            text-decoration: none;
            color: #000;
            padding: 5px;
            display: inline-block; 
            box-sizing: border-box;
            text-decoration: none;
            font-size: 13px;
            transition: 0.3s ease;
        }
        .navlink li a:hover {
            background-color: #FF4E98;
            font-weight: bold;
            border-radius: 8px;
            color: white; 
        }
        .navlink li a.active {
            background-color: #c9c9c950;
            color: #FF4E98;
            font-weight: bold;
            border-radius: 8px;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #FF4E98;
            min-width: 120px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0;
            border-radius: 0px 0px 4px 4px;
        }
        .dropdown-content a {
            color: aliceblue;
            padding: 10px 12px;
            text-decoration: none;
            display: block;
            font-size: 13px;
            text-align: left;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
            color: black;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .styled-button {
            border: 1px solid #000;  
            background-color: white;  
            color: black;
            padding: 10px 10px; 
            text-decoration: none;  
            font-family: sans-serif; 
            font-size: 13px; 
            border-radius: 8px; 
            display: inline-block; 
            transition: background-color 0.3s ease, color 0.3s ease; 
        }
        .styled-button:hover {
            background-color: #FF4E98; 
            color: white;  
        }
    </style>
</head>
<body>
    <div class="kop">
        <ul>
            <li class="left"><a href="/" class="arrow-hover">Home</a></li>
            <li class="dropdown">
                @auth('employee')
                    <a href="#">{{ auth('employee')->user()->name }} <img src="{{ asset('icon-user.png') }}" alt=""></a>
                @endauth
                <div class="dropdown-content">
                    <a href="/settings">Profile</a>

                    <!-- Form logout POST tersembunyi -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <!-- Link logout -->
                    <a href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>

    {{ $slot }}
</body>
</html>

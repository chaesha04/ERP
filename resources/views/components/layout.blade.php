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
        .arrow-hover {
            position: relative;
            display: inline-block;
            padding-left: 20px; /* Ruang untuk panah di kiri */
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
            transform: translateX(10px); /* Geser teks ke kanan */
        }

        .arrow-hover:hover::before {
            opacity: 1;
            transform: translateX(0) translateY(-50%); /* Panah muncul dari kiri */
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
        
        .back-button {
                display: block;
                text-align: right;
                margin-top: 10px;
                font-size: 14px;
        }
        a.back-button{
                text-decoration: none;
                color: #000;
        }
                    .form-group {
                color: #7B7B7B;
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                margin-bottom: 5px;
            }

            .form-row {
                display: flex;
                gap: 20px;
            }

            .form-row .form-group {
                flex: 1; /
            }

            .form-group input,
            .form-group select {
                width: 90%;
                padding: 8px;
                font-size: 14px;
                border: none;
                border-bottom: 2px solid #B0B0B0;
                background: transparent;
                color: #363636;
            }

            .form-group input:focus,
            .form-group select:focus {
                outline: none;
                border-color: #B0B0B0;
                color: #363636;
            }

            .form-submit{
                display: flex;
                justify-content: center;
                margin-top: 30px;
                margin-right:75px;
            }
            .settings a{
                text-decoration: none;
                color: #1a1919;
            }
            .product-detail {
                flex: 1;
            }

            .product-detail a{
                text-decoration: underline;
                color:#6D6D6D;
            }

            .product-detail ul li.title {
                list-style: none;
                color: #FF4E98;
                margin-top: 15px;
            }

            .product-detail ul li.desc {
                list-style: none;
                color: #6D6D6D;
            }
            .note-product-detail {
                width: 300px;         /* ukuran lebar yang lebih kecil */
                height: 180px;        /* tinggi lebih pas seperti gambar */
                border: 1px solid #B0B0B0;
                padding: 20px;
                background-color: transparent;
                color: black;
                border-radius: 6px;
                font-size: 14px;
                margin-right:180px;
                margin-top:100px;
                text-align: justify;
            }
            table.header td a{
                border: 1px solid #9d9d9d;
                padding-left: 9px;
                padding-right: 9px;
                padding-bottom: 5px;
                color: #9D9D9D;
                text-decoration: none;
                border-radius: 3px;
            }
            table.header td a:hover{
                border: 1px solid #9d9d9d;
                padding-left: 9px;
                padding-right: 9px;
                padding-bottom: 5px;
                color: white;
                text-decoration: none;
                background: navy;
                border-radius: 3px;
            }
            .product-detail table.header-detail{
                padding-right: 9px;
                padding-bottom: 5px;
                color: #9D9D9D;
                text-decoration: none;
                border-radius: 3px;
                vertical-align: bottom;
            }      
            .product-detail table.header-detail td p a, .data table.data tr td a{
                padding-left: 9px;
                color: black;
                text-decoration: none;
                border-radius: 3px;
                font-size: 34px;
                
            }       
            .product-detail table.header-detail td, .data table.data tr td a{ 
                color: black;
                text-decoration: none;
                border-radius: 3px;
                padding-bottom: 5px;
            }  
            
            .form-customer select, .form-customer input, 
            .form-customer button, .product-detail button, button.accommodationdetail{
                padding: 5px;
                border-radius: 5px;
            }
            .form-customer input{
                text-align:left;
                align-content: left;
            }         
    </style>
</head>
<body>
    <div class="kop">
        <ul>
            <li class="left"><a href="/" class="arrow-hover">Home</a></li>
            <li class="dropdown">
                <a href="#">{{ auth()->user()->name }} <img src="icon-user.png" alt=""></a>
                <div class="dropdown-content">
                    <a href="/settings">Profile</a>
                    <a href="/logout">Logout</a>
                </div>
            </li>
        </ul>      
    </div>
    
    {{ $slot }}
</body>
</html>

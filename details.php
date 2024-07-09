<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FinFlexx</title>
    <link rel="stylesheet" href="./css/style.css" />
    <!-- Boxicons CSS -->
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="./js/script.js" defer></script>
    <link type="image" rel="icon" href="./img/finflexx.png" />

    <style>
        .box {
            background-color: #0e1117;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 150px;
            padding-bottom: 30px;
        }

        /* Style for the table */
        .stock-table {
            width: 80%;
            padding-left: 95px;
        }

        /* Style for table cells */
        .stock-cell {
            text-align: center;
            padding-bottom: 100px;
            padding-left: 40px;
            padding-right: 40px;
        }

        /* Style for images */
        img {
            width: 100px;
            height: 100px;
            background-color: #0e1117;
            cursor: pointer;
        }

        .head {
            font-size: 40px;
            color: #fff;
            font-weight: 1000;
            padding-left: 380px;
            padding-bottom: 50px;
        }

        input.checkbox {
            cursor: pointer;
            width: 15px;
            height: 15px;
            color: #0e1117;
        }

        .submit {
            position: absolute;
            top: 1740px;
            left: 740px;
            border-radius: 20px;
            font-size: 20px;
            background-color: #0e1117;
            border: 2px solid #fff;
            cursor: pointer;
            color: #fff;
            font-weight: 650;
            padding: 10px 10px 10px 10px;
        }

        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: #02a350;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            font-weight: 500;
            color: #fff;
            margin-right: 5px;
        }

        .random-color-box {
            width: 200px;
            height: 200px;
            background-color: #00c760;
        }
    </style>

</head>

<body>
    <nav class="sidebar locked">
        <div class="logo_items flex">
            <span class="nav_image">
                <img src="./img/finflexx.png" alt="logo_img" />
            </span>
            <span class="logo_name">FinFlexx</span>
            <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
            <i class="bx bx-x" id="sidebar-close"></i>
        </div>
        <div class="menu_container">
            <div class="menu_items">
                <ul class="menu_item">
                    <div class="menu_title flex">
                        <span class="title">Dashboard</span>
                        <span class="line"></span>
                    </div>
                    <li class="item">
                        <a href="./index2.html" class="link flex">
                            <i class="bx bx-home-alt"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="./news2.html" class="link flex">
                            <i class='bx bx-news'></i>
                            <span>News & Blogs</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu_item">
                    <div class="menu_title flex">
                        <span class="title">Stocks</span>
                        <span class="line"></span>
                    </div>
                    <li class="item">
                        <a href="./Watchlist.php" class="link flex">
                            <i class='bx bx-heart'></i>
                            <span>Watchlists</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="./explore2.html" class="link flex">
                            <i class='bx bx-candles'></i>
                            <span>Explore Stocks</span>
                        </a>
                    </li>
                </ul>

                <ul class="menu_item">
                    <div class="menu_title flex">
                        <span class="title">Services</span>
                        <span class="line"></span>
                    </div>
                    <li class="item">
                        <a href="./predict.html" class="link flex">
                            <i class='bx bx-rupee'></i>
                            <span>Price Prediction</span>
                        </a>
                    </li>

                </ul>
                <ul class="menu_item">
                    <div class="menu_title flex">
                        <span class="title">Account</span>
                        <span class="line"></span>
                    </div>
                    <li class="item">
                        <a href="./details.php" class="link flex">
                            <i class='bx bxs-user-detail'></i>
                            <span>Details</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="./index.html" class="link flex">
                            <i class='bx bxs-exit'></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar_profile flex">
                <span class="nav_image1">
                    <div id="avatarContainer"></div>
                </span>
                <div class="data_text">
                    <span class="name" id="username"></span>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
    <nav class="navbar">
        <i class="bx bx-menu" id="sidebar-open"></i>
        <div class="wrapper">
            <div class="search-input">
                <a href="" target="_blank" hidden></a>
                <input type="text" placeholder="Search for Stocks..." class="bar search_box">
                <div class="autocom-box">
                </div>
                <div class="icon"><i class="fas fa-search"></i></div>
            </div>
        </div>
    </nav>

    <Section id="welcome_Sec">

        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                {
                    "symbols": [{
                            "description": "",
                            "proName": "NASDAQ:TSLA"
                        },
                        {
                            "description": "",
                            "proName": "NASDAQ:AAPL"
                        },
                        {
                            "description": "",
                            "proName": "NASDAQ:AMZN"
                        },
                        {
                            "description": "",
                            "proName": "NASDAQ:GOOGL"
                        },
                        {
                            "description": "",
                            "proName": "NASDAQ:MSFT"
                        }
                    ],
                    "showSymbolLogo": true,
                    "isTransparent": false,
                    "displayMode": "adaptive",
                    "colorTheme": "dark",
                    "locale": "en"
                }
            </script>
        </div>
        <!-- TradingView Widget END -->
    </Section>


    <html>

    <head>

        <style>
            body {
                margin: 0;
            }

            .details {
                background-color: #0e1117;
                display: flex;
                justify-content: center;
                padding-top: 185px;
                padding-left: 200px;
                height: auto;
                margin: 0;
                color: #fff;
            }

            .user-info {
                text-align: left;
                max-width: 600px;
                width: 80%;
                padding: 20px;
                padding-right: 0px;
                position: relative;
            }

            #password {
                border: none;
                outline: none;
                color: #fff;
                background-color: #0e1117;
                font-size: 28px;
                margin-right: 0px;
                font-family: "Poppins", sans-serif;
                padding-right: 0px;
                width: 300px;
            }

            #toggleButton {
                border: none;
                background: transparent;
                cursor: pointer;
                color: #00c760;
                font-size: 25px;

            }

            .user-info h2 {
                font-size: 40px;
                color: #fff;
                font-weight: 1000;
                position: absolute;
                top: -60px;
                left: 0%;
                font-family: "Poppins", sans-serif;
            }

            .user-info p {
                cursor: pointer;
                font-size: 28px;
                font-family: "Poppins", sans-serif;
                font-weight: 400;
                padding-bottom: 10px;
            }
        </style>


        <script>
            function togglePasswordVisibility() {
                var passwordField = document.getElementById("password");
                var button = document.getElementById("toggleButton");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    button.classList.remove("fa-eye");
                    button.classList.add("fa-eye-slash");
                } else {
                    passwordField.type = "password";
                    button.classList.remove("fa-eye-slash");
                    button.classList.add("fa-eye");
                }

            }
        </script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

    <body>

        <div class="details">
            <div class="user-info">
                <?php
                require './vendor/autoload.php';

                use MongoDB\Client;

                $uri = getenv('MONGODB_URI');

                $client = new Client($uri);
                $collection = $client->loginpage->login;

                $user = $collection->findOne([], ['sort' => ['_id' => -1]]);

                if ($user) {
                    echo "<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Credentials</h2>"; // Update text color and font size
                    echo "<br>";
                    echo "<p><strong style='color: #00c760;'>Name :</strong> <span style='color: #fff;'>" . htmlspecialchars($user["name"]) . "</span></p>";
                    echo "<p><strong style='color: #00c760;'>Email :</strong> <span style='color: #fff;'>" . htmlspecialchars($user["email"]) . "</span></p>";
                    echo "<p><strong style='color: #00c760;'>Password :</strong> <input type='password' id='password' value='" . htmlspecialchars($user["password"]) . "' readonly> <button id='toggleButton' onclick='togglePasswordVisibility()' class='fas fa-eye'></button></p>";
                    echo "<br><br><br><br><br><br><br><br><br>";
                } else {
                    echo "No user found.";
                }
                ?>

                <script>
                    function togglePasswordVisibility() {
                        var passwordField = document.getElementById('password');
                        var toggleButton = document.getElementById('toggleButton');
                        if (passwordField.type === 'password') {
                            passwordField.type = 'text';
                            toggleButton.classList.remove('fa-eye');
                            toggleButton.classList.add('fa-eye-slash');
                        } else {
                            passwordField.type = 'password';
                            toggleButton.classList.remove('fa-eye-slash');
                            toggleButton.classList.add('fa-eye');
                        }
                    }
                </script>

            </div>
        </div>

    </body>

    </html>

    <footer>
        <p class="copyright">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright
            ©
            2024 FinFlexx</p>
    </footer>

    <script>
        function formatUserName(name) {
            var words = name.toLowerCase().split(' ');
            for (var i = 0; i < words.length; i++) {
                words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
            }
            return words.join(' ');
        }

        function fetchUserInfo() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', './php/get_user_info.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var userInfo = JSON.parse(xhr.responseText);
                    var formattedName = formatUserName(userInfo.name);
                    document.getElementById('username').innerText = formattedName;
                    var avatar = document.createElement('div');
                    avatar.className = 'avatar';
                    avatar.innerText = formattedName.charAt(0).toUpperCase(); 
                    document.getElementById('avatarContainer').appendChild(avatar);
                }
            };
            xhr.send();
        }

        window.onload = fetchUserInfo;
    </script>

    <script src="./js/search_script2.js"></script>

</body>

</html>

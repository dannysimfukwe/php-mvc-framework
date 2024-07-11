<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Little Devs | <?php echo $data['title']; ?></title>
    <meta name="description" content="" />
    <link rel="stylesheet" href="/css/global.css" />
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body>
    <div id="main-container">
        <nav>
            <ul class="navigation">
                <li class="logo" style="background: #dbd9d8; border-radius: 8px">
                    <a href="/"><img src="/images/littledevs.png" width="30"/></a>
                </li>
                <li>
                    <a class="" href="/">Home</a>
                </li>
                <li>
                    <a class="/courses" href="/our-work">OUR WORK</a>
                </li>
                <li>
                    <a class="/features" href="/features">Tech Stack</a>
                </li>
                <li class="sign-in">
                    <a href="/merch">Merch</a>
                </li>
                <li>
                    <a class="/features" href="/features">About Us</a>
                </li>
                <li class="button">
                    <a class="get-funded" href="/start-project">Start A Project</a>
                </li>
            </ul>
        </nav>
        
        <div class="mobile-menu menu-frontend">
            <a class="logo" href="/"><img src="/images/littledevs.png" width="80"/></a>
            <div class="lines" id="m-menu" onclick="showHide()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="mobile-menu-items">
            <div class="mobile-sign-in">
                <a class="mobi-sign" href="/login">SIGN IN</a>
                <a class="get-funded mobile-button" href="/register">GET FUNDED</a>
            </div>
            <ul>
                <li>
                    <a class="" href="/">Home</a>
                </li>
                <li>
                    <a  class="/courses" href="/our-work">OUR WORK</a>
                </li>
                <li>
                    <a class="/features" href="/features">RESOURCES</a>
                </li>
                <li>
                    <a class="" href="#">COMMUNITY</a>
                </li>
                <li class="sign-in">
                    <a href="/login">SIGN IN</a>
                </li>
            </ul>
            <div class="social">
                <ul>
                    <li>
                        <a target="_blank" href="https://instagram.com/trutraderfx"><span class="ig"></span></a> 
                        <a target="_blank" href="https://twitter.com/trutraderfx"><span class="twitter"></span></a>
                        <a target="_blank" href="https://discord.gg/e3kX4r23"><span class="discord"></span></a>
                    </li>
                </ul>
            </div>
        </div>
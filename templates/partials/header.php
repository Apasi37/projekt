<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>
<body>
    
<header id="postsHeader">
        <h1><a href="index.html">Regul Art</a></h1>

        <div class="searchBarDiv">
            <input type="text" class="searchBar" placeholder="Search...">
        </div>

        <nav>
            <a href="posts.html" class="aButton">Posts</a>
            <div class="aButton" onclick="toggleUser()">
                Switch User
            </div>
        </nav>


        <div class="profile" id="headerProfile" onclick="toggleProfileMenu()">
            <div>
                UserName
            </div>
            <img src="../assets/img/defaultprofile.png" alt="IMAGE">
        </div>

        <div id="profileMenu">
            <a href="" class="aButton">Profile</a>
            <a href="" class="aButton">Upload Image</a>
            <a href="" class="aButton">Log Out</a>
        </div>

        <div id="notLoggedIn">
            <div class="aButton" onclick="openLogIn()">Log In</div>
            <div class="aButton" onclick="openSignUp()">Sign Up</div>
        </div>

        <div class="login-signup" id="logIn">
            <form action="" class="headerForm">
                <label for="email">E-mail</label>
                <input type="email" id="email" required>
                <label for="password">Password</label>
                <input type="password" id="password" required>
                <input type="submit">
            </form>
        </div>

        <div class="login-signup" id="signUp">
            <form name="signUp" action="" class="headerForm" onsubmit="validatePassword()">
                <label for="email">E-mail</label>
                <input type="email" id="email" required>
                <label for="username">Username</label>
                <input type="text" id="username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <label for="passwordcheck">Repeat Password</label>
                <input type="password" id="passwordcheck" name="passwordcheck" required>
                <label for="checkbox">I have read the terms of service</label>
                <input type="checkbox" id="checkbox" required>
                <input type="submit">
            </form>
        </div>
        <div id="overlay"></div>
    </header>

<footer>
    <div id="info">
        <h2>Info</h2>
    <a href="aboutUs.html">About us</a>
    </div>
    <div>
        <p>Copyright &copy 2023 RegulArt All Rights Reserved</p>
    </div>
    <div id="contact">
        <h2>Contact</h2>
        <p>E-mail:<a href="mailto:peter_maluch@hotmail.com">peter_maluch@hotmail.com</a></p>
        <a href="tel:+421919030547">Tel.:+421919030547</a>
    </div>
</footer>

<?php
    $page_name = basename($_SERVER["SCRIPT_NAME"], '.php');
    $page_object  = new Page($page_name);
    echo($page_object->add_scripts());
?>

</body>
</html>
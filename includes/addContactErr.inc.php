<?php

//Error messages for add contact form
if (isset($_GET['empty'])) {
    echo '<text class="fail">Fill in every field</text><br />';
}

if (isset($_GET['invc'])) {
    echo '<text class="fail">Invalid characters</text><br />';
}

if (isset($_GET['invemail'])) {
    echo '<text class="fail">Invalid E-mail</text><br />';
}

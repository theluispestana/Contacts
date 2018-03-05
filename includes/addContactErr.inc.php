<?php

//Error messages for add contact form
if (isset($_GET['empty'])) {
    echo '<span class="fail">Fill in every field</span><br />';
}

if (isset($_GET['invc'])) {
    echo '<span class="fail">Invalid characters</span><br />';
}

if (isset($_GET['invemail'])) {
    echo '<span class="fail">Invalid E-mail</span><br />';
}

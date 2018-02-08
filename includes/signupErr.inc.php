<?php

if (isset($_GET['sempty'])) {
    echo '<span class="fail">Fill in every field</span><br />';
}

if (isset($_GET['invc'])) {
    echo '<span class="fail">Invalid characters</span><br />';
}

if (isset($_GET['inve'])) {
    echo '<span class="fail">Invalid E-mail</span><br />';
}

if (isset($_GET['tknu'])) {
    echo '<span class="fail">That user-name is taken</span>';
}

if (isset($_GET['success'])) {
    echo '<span class="success">Successfull sign-up</span>';
}

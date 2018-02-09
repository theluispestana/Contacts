<?php

if (isset($_GET['siempty'])) {
    echo '<span class="fail">Fill in every field</span><br />';
}

if (isset($_GET['logErr'])) {
    echo '<span class="fail">Your Username or Password is incorrect</span>';
}

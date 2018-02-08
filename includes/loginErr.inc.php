<?php

if (isset($_GET['siempty'])) {
    echo '<span class="fail"></span>Fill in every field<br />';
}

if (isset($_GET['logErr'])) {
    echo '<span class="fail">Your Username or Password is incorrect</span>';
}

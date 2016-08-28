<?php
include('../lib/app.php');

session_destroy();

header('location: ../index.php');
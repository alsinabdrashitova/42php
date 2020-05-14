<?php
session_start();

header('Location: http://127.0.0.1:8080/index.php?text=' . $_REQUEST['text']);

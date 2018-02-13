<?php

include_once 'includes/auth.inc.php';

logout();

header("Location: index.php?logout=success");
exit();

<?php

wp_logout();

header("location: login", true);
exit();
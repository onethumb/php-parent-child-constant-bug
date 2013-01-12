<?php
require("classes/foo.php");
require("classes/baz.php");
Baz::add();
require("classes/bar.php");
Bar::add();
Baz::add();

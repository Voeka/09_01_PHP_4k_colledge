<?php

$db = new PDO(
  "mysql:host=localhost;dbname=blog",
  "root", ""
);

session_start();
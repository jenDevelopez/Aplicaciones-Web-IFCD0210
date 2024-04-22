<?php
session_start();

function login($username,$password) {
  $_SESSION['user'] = $username;
  $user = $_SESSION['user'];
  return $user;
}
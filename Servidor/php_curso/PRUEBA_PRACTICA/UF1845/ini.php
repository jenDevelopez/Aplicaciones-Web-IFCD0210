<?php
session_start();

function login($username) {
  $_SESSION['user'] = $username;
  $user = $_SESSION['user'];
  return $user;
}
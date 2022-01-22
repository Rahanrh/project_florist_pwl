<?php
require_once 'session.php';

function set_flashdata($data)
{
  $_SESSION['flashdata'] = $data;
}

function get_flashdata()
{
  if (session_status() === PHP_SESSION_ACTIVE) {
    $flashdata = array_key_exists('flashdata', $_SESSION) ? $_SESSION['flashdata'] : null;
    unset($_SESSION['flashdata']);
    return $flashdata;
  }

  return null;
}

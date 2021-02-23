<?php 

function get_last_details() {
    global $db;
    $sql = "SELECT * FROM details LIMIT 3";
    $result = mysqli_query($db, $sql);
    $ldets = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $ldets;

}

function get_cars() {
    global $db;
    $sql = "SELECT * FROM cars";
    $result = mysqli_query($db, $sql);
    $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $cars;

}

function get_details() {
    global $db;
    $sql = "SELECT * FROM details";
    $result = mysqli_query($db, $sql);
    $dets = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $dets;

}

function get_users() {
    global $db;
    $sql = "SELECT * FROM users";
    $result = mysqli_query($db, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $users;

}

function get_orders($uid) {
    global $db;
    $sql = "SELECT * FROM users_orders WHERE u_id=".$uid;
    $result = mysqli_query($db, $sql);
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $orders;

}

function get_messages() {
    global $db;
    $sql = "SELECT * FROM messages";
    $result = mysqli_query($db, $sql);
    $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $messages;

}

function get_last_message() {
    global $db;
    $sql = "SELECT * FROM messages ORDER BY id DESC LIMIT 3";
    $result = mysqli_query($db, $sql);
    $lmes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $lmes;

}

function get_last_order() {
    global $db;
    $sql = "SELECT * FROM users_orders ORDER BY o_id DESC LIMIT 3";
    $result = mysqli_query($db, $sql);
    $lord = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $lord;

}

function get_car($rid) {
    global $db;
    $sql = "SELECT * FROM cars where rs_id=".$rid;
    $result = mysqli_query($db, $sql);
    $rows=mysqli_fetch_assoc($result);
    return $rows;

}

function get_detailss($cid) {
    global $db;
    $sql = "SELECT * FROM details where rs_id=".$cid;
    $result = mysqli_query($db, $sql);
    $detss=mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $detss;

}
<?php


// Get Categories

function getCat()
{

    global $con;

    $getCat = $con->prepare("SELECT * FROM categories ORDER BY ID ASC");

    $getCat->execute();

    $cats = $getCat->fetchAll();

    return $cats;
}

// Get Items

function getItems($where, $value, $approve = NULL)
{

    global $con;

    if ($approve == NULL) {

        $sql =  'AND Approve = 1';
    }
    else {
        $sql = '';
    }

    $getItems = $con->prepare("SELECT * FROM items WHERE $where = ? $sql ORDER BY Item_ID DESC");

    $getItems->execute(array($value));

    $items = $getItems->fetchAll();

    return $items;
}

function checkUserStatus($user)
{
    // check if user exist in db

    global $con;

    $stmtx = $con->prepare("SELECT
    Username, RegStatus 
FROM 
    users 
WHERE 
    Username = ? 
AND 
    RegStatus = 0");
    $stmtx->execute(array($user));

    $status = $stmtx->rowCount();

    return $status;
}

function getTitle()
{


    global $pageTitle;

    if (isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo "Default";
    }
}

function redirectHome($theMsg, $url = null, $secods = 1)
{

    if ($url === null) {

        $url = 'index.php';

        $link = 'Homepage';
    } else {
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {

            $url = $_SERVER['HTTP_REFERER'];

            $link = 'Previous Page';
        } else {
            $url = 'index.php';

            $link = 'Homepage';
        }
    }

    echo $theMsg;

    echo "<div class='alert alert-info'>you will be Redirect to $link page After $secods Seconds.</div>";

    header("refresh:$secods;url=$url");

    exit();
}

function checkItem($select, $from, $value)
{

    global $con;

    $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

    $statement->execute(array($value));

    $count = $statement->rowCount();

    return $count;
}

function countItems($item, $table)
{

    global $con;

    $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

    $stmt2->execute();

    return $stmt2->fetchColumn();
}




function getLatest($select, $table, $order, $limit = 5)
{

    global $con;

    $getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

    $getStmt->execute();

    $rows = $getStmt->fetchAll();

    return $rows;
}

<?php

class Crud
{

    public $dbcon;

    public function __construct($con)
    {
        $this->dbcon = $con;
    }

    function Create()
    {
        if (isset($_POST['do_post'])) {
            $text = $_POST['text'];
            $result = $this->dbcon->execute("INSERT INTO `todolist` (`text`) VALUES ('$text')", array());

            if ($result) {

                echo 'ok';
            } else {
                echo 'fail';
            }
            exit();
        }
    }

    function Read()
    {
        $array = "";
        $result = $this->dbcon->execute("select * from `todolist`", array());
        $array = $result->fetchAll();

        return $array;
    }

    function Update()
    {
        if (isset($_REQUEST['do_update'])) {
            $text = $_REQUEST['text'];
            $id = $_REQUEST['id'];
            $result = $this->dbcon->execute("UPDATE `todolist` SET `text`='$text' WHERE `id`='$id'", array());

            if ($result) {

                echo 'ok';
            } else {
                echo 'fail';
            }
            exit();
        }
    }

    function Delete()
    {
        if (isset($_REQUEST['do_delete'])) {
            $id = $_REQUEST['id'];
            $result = $this->dbcon->execute("DELETE FROM `todolist` where `id`=$id", array());

            if ($result) {

                echo 'ok';
            } else {
                echo 'fail';
            }
            exit();
        }
    }
}
?>
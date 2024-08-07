<?php
require_once('connection.php');

function createData($post)
{
  createTodoData($post['content']);
  // $postの中に連想配列としてユーザーが入力した内容が入ってると意味している
}

function getTodoList()
{
    return getAllRecords();
}
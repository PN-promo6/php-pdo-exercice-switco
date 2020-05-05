<?php
include_once "PDO.php";

function GetOneCommentFromId($id)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM comment WHERE id = " . $id);
  return $response->fetch();
}

function GetAllComments()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM comment ORDER BY created_at ASC");
  return $response->fetchAll();
}

function GetAllCommentsFromUserId($userId)
{
  global $PDO;
  $response = $PDO->query(
    "SELECT c.*, u.nickname FROM comment AS c LEFT JOIN user AS u ON c.user_id = u.id WHERE c.user_id = $userId ORDER BY c.created_at ASC"
  );
  return $response->fetchAll();
}

function  GetAllCommentsFromPostId ($postId) 
{
  global $PDO;
  $response = $PDO->query(
    "SELECT c.*, u.nickname FROM comment AS c LEFT JOIN user AS u ON c.user_id = u.id WHERE c.post_id = $postId"
);
  return $response->fetchAll();
}




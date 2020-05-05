<?php
include_once "PDO.php";

function GetOnePostFromId($id)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM post WHERE id = " . $id);
  return $response->fetch();
}

function GetAllPosts()
{
  global $PDO;
  $response = $PDO->query(
    "SELECT post.*, user.nickname "
      . "FROM post LEFT JOIN user on (post.user_id = user.id) "
      . "ORDER BY post.created_at DESC"
  );
  return $response->fetchAll();
}

function GetAllPostsFromUserId($userId)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM post WHERE user_id = " . $userId . " ORDER BY created_at DESC");
  return $response->fetchAll();
}

function  GetPostsWithLike($search) 
{
  global $PDO;
  $response = $PDO->query(
    "SELECT p.*, u.nickname FROM post AS p LEFT JOIN user AS u ON p.user_id = u.id WHERE p.content LIKE '%$search%'"
);
  return $response->fetchAll();
}


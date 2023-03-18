<?php
require_once "config.php";
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id_cc"]))
         {
            $id=intval($_GET["id_cc"]);
            get_cc($id);
         }
         else
         {
            get_ccc();
         }
         break;
   case 'POST':
         if(!empty($_GET["id_cc"]))
         {
            $id=intval($_GET["id_cc"]);
            update_cc($id);
         }
         else
         {
            insert_cc();
         }     
         break; 
   case 'DELETE':
          $id=intval($_GET["id_cc"]);
            delete_cc($id);
            break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
 }



   function get_ccc()
   {
      global $mysqli;
      $query="SELECT * FROM creator";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List Creator Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   function get_cc($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM creator";
      if($id != 0)
      {
         $query.=" WHERE id_cc=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get Creator Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
        
   }
 
   function insert_cc()
      {
         global $mysqli;
         if(!empty($_POST["username"])){
            $data=$_POST;
         }else{
            $data = json_decode(file_get_contents('php://input'), true);
         }

         $arrcheckpost = array('account_id' => '', 'username' => '','creator_field' => '');
         $hitung = count(array_intersect_key($data, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "INSERT INTO creator SET
               account_id '$data[account_id]',
               username = '$data[username]',
               creator_field = '$data[creator_field]'");                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Creator Added Successfully.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Creator Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function update_cc($id)
      {
         global $mysqli;
         if(!empty($_POST["username"])){
            $data=$_POST;
         }else{
            $data = json_decode(file_get_contents('php://input'), true);
         }

         $arrcheckpost = array('account_id' => '', 'username' => '','creator_field' => '');
         $hitung = count(array_intersect_key($data, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
              $result = mysqli_query($mysqli, "UPDATE creator SET
              account_id '$data[account_id]',
              username = '$data[username]',
              creator_field = '$data[creator_field]'
              WHERE id_cc='$id'");
          
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Creator Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Creator Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function delete_cc($id)
   {
      global $mysqli;
      $query="DELETE FROM creator WHERE id_cc=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Creator Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Creator Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }

 
?> 

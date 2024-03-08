<?php


function createHistory(
    $user_id,
    $event,
    $previous_state,
    $new_state,
    $pdo
    ) 
    {

    $sql = "INSERT INTO histories (user_id,event,previous_state,new_state) VALUES (:user_id , :event , :previous_state , :new_state)";  
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':event', $event);
    $stmt->bindParam(':previous_state', $previous_state);
    $stmt->bindParam(':new_state', $new_state);
    
    $stmt->execute();
    

}
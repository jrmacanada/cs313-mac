<?php

/**************************************
 * 
 *  File: add_verse.php
 *  Created by: jsimpson
 *  Date: May 24, 2016 7:27:22 AM
 *  Description: Week L06 Team Activity
 * 
 *  Adapted by: Michael Cavey
 *  Date: May 28, 2016
 * 
 ****************************************/

include "db_funcs.php";


//Add the scrpture verse
$newId = addVerse();

//Add to Topics Table
addTopics($newId);

//Get Topics
$topics = getTopics();

//Display Scriptures by Topic
displayScriptures($topics);





function displayScriptures($topics)
{
    $db = OpenDB("cavey313");
    
    echo "<h1>Scriptures by Topic</h1>";
    
    foreach($topics as $item)
    {
      $curTopic = $item['id'];  
      $statement = $db->query("select scriptures.id, scriptures.book, scriptures.chapter, 
       scriptures.verse, scriptures.content, topics.name as topics 
       from scriptures,topics,verse_topic 
       where scriptures.id = verse_topic.vs_id 
	and topics.id = verse_topic.topic_id and topics.id=$curTopic
	order by scriptures.id asc;");

       $displayInfo = $statement->fetchAll(PDO::FETCH_ASSOC);
       
       echo "<strong>Topic:" . $item['name']. "</strong><br/>";
       
       foreach($displayInfo as $row)
       {   
           echo $row['book'] ." " .$row['chapter'] .":"
                .$row['verse'] ." - " .$row['content'] . "<br/>";
       
       }
       
       echo "<br/>";  
        
    }
    
    $db = null;
       
}




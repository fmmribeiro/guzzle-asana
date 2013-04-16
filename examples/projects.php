<?php
/**
 * CRUD projects
 * 
 * Create, get update and delete a project
 */

require dirname(__FILE__). '/../apikey.php';

require dirname(__FILE__).'/../vendor/autoload.php';

use AJT\Asana\AsanaClient;

// Get the asana client with your asana api key
$asana_client = AsanaClient::factory(array('api_key' => $asana_api_key));

/*
 * Change this to the id of the workspace you want to add the project to
 *
 * You can use the get-workspaces.php file to get the workspace id's
 */
$workspace_id = 4785243965702; 

// Create a project
print "createProject\n";
$project = $asana_client->createProject(
	array(
		'name'  	  => 'Test Project',
		'notes' 		  => "testing notes",
		'workspace' 	  => $workspace_id,
	)
);
print_r($project);
$projectid = $project['id'];

// Get a project
print "getProject\n";
$project = $asana_client->getProject(
	array(
		'project-id'  	  => $projectid,
	)
);
print_r($project);

print "updateProject\n";
$project = $asana_client->updateProject(
	array(
		'name'  	 => 'Updated Test Project',
		'notes' 	 => "updated testing notes",
		'project-id' => $projectid
	)
);
print_r($project);


print "DeleteProject\n";
$project = $asana_client->deleteProject(
	array(
		'project-id' => $projectid
	)
);
if(count($project) == 0){
	print "Task deleted\n";
}
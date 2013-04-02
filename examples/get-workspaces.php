<?php

require dirname(__FILE__). '/../apikey.php';

require dirname(__FILE__).'/../vendor/autoload.php';

use AJT\Asana\AsanaClient;

// Get the asana client with your asana api key
$asana_client = AsanaClient::factory(array('api_key' => $asana_api_key));

// Get all workspaces
$workspaces = $asana_client->getWorkspaces(array());
foreach($workspaces as $workspace){
	$id = $workspace['id'];
	print $workspace['name'] . "\n";

	// Get all tasks for this workspace
	$tasks = $asana_client->getTasksForWorkspace(array('workspace-id' => $id));
	print "This workspace has " . count($tasks) . " tasks\n";
	foreach ($tasks as $task){
		print $task['id'] . ' - ' . $task['name'] . "\n";
	}
}
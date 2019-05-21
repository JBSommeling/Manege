<?php

function index($feedback = "")
{
	session_start();
	render("home/index", array('feedback' => $feedback));	
}
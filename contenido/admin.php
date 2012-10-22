<?
session_start();
	if(!isset($_SESSION['Tipo']))
	{
		$_SESSION['Tipo'] = 0;
	}		
	if($_SESSION['Tipo'] >= 1)
	{
		echo 'Session iniciada';
	}
	else
	{
		echo 'No haz iniciado session.';
	}
?>
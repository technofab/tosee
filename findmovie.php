<?php
require('config.php');



// $movie = $_GET["movie"]; 

$movie = "Arrival";

$urlomdb = "http://www.omdbapi.com/?t=$movie&y=&plot=short&r=json";

$json = file_get_contents($urlomdb);
$json = json_decode($json);
$IMDB_ID = $json->imdbID;

echo $IMDB_ID;

$urltmdb = "https://api.themoviedb.org/3/find/$IMDB_ID?api_key=$tmdb_key&language=it-it&external_source=imdb_id";
$jsontmdb = file_get_contents($urltmdb);


$jsontmdb = json_decode($jsontmdb);

$tmdbID = $jsontmdb->movie_results[0]->id;
$Titolo =  $jsontmdb->movie_results[0]->original_title;
$Sommario = $jsontmdb->movie_results[0]->overview;
$Uscita = $jsontmdb->movie_results[0]->release_date;


echo  _('Il titolo del film è: ');
echo $Titolo ;
echo "\n\r";
echo  _('Breve sommario: '), $Sommario;
echo "\n\r";
echo  _('Data di uscita prevista: '), $Uscita
?>
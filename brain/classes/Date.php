<?php

class Date {
	public function transform($datetime) {
	    $now = time();
	    $created = strtotime($datetime);
	    // La différence est en seconde
	    $diff = $now-$created;
	    $m = ($diff)/(60); // on obtient des minutes
	    $h = ($diff)/(60*60); // ici des heures
	    $j = ($diff)/(60*60*24); // jours
	    $s = ($diff)/(60*60*24*7); // et semaines
	    if ($diff < 60) { // "il y a x secondes"
	        return $diff.' secondes';
	    }
	    elseif ($m < 60) { // "il y a x minutes"
	        $minute = (floor($m) == 1) ? 'minute' : 'minutes';
	        return floor($m).' '.$minute;
	    }
	    elseif ($h < 24) { // " il y a x heures, x minutes"
	        $heure = (floor($h) <= 1) ? 'heure' : 'heures';
	        $dateFormated = floor($h).' '.$heure;
	        /*if (floor($m-(floor($h))*60) != 0) {
	            $minute = (floor($m) == 1) ? 'minute' : 'minutes';
	            $dateFormated .= ', '.floor($m-(floor($h))*60).' '.$minute;
	        }*/
	        return $dateFormated;
	    }
	    elseif ($j < 7) { // " il y a x jours, x heures"
	        $jour = (floor($j) <= 1) ? 'jour' : 'jours';
	        $dateFormated = floor($j).' '.$jour;
	        /*if (floor($h-(floor($j))*24) != 0) {
	            $heure = (floor($h) <= 1) ? 'heure' : 'heures';
	            $dateFormated .= ', '.floor($h-(floor($j))*24).' '.$heure;
	        }*/
	        return $dateFormated;
	    }
	    elseif ($s < 5) { // " il y a x semaines, x jours"
	        $semaine = (floor($s) <= 1) ? 'semaine' : 'semaines';
	        $dateFormated = floor($s).' '.$semaine;
	        /*if (floor($j-(floor($s))*7) != 0) {
	            $jour = (floor($j) <= 1) ? 'jour' : 'jours';
	            $dateFormated .= ', '.floor($j-(floor($s))*7).' '.$jour;
	        }*/
	        return $dateFormated;
	    }
	    else { // on affiche la date normalement
	        return strftime("%d %B %Y à %H:%M", $created);
	    }
	}
}
<?php $e='http://dbpedia.org/sparql';
if(!$r=@str_replace('>','',$_GET['r'])) $r='http://dbpedia.org/resource/Berlin';
echo "<!DOCTYPE html><title>Browsing $e</title><meta charset=utf8>
<style>td,th{border-top:1px solid #aaa}a{text-decoration:none}</style>
<form>Entity URI: <input name=r value='$r' size=80><input type=submit></form>";
$q=urlencode("SELECT*{{<$r> ?po ?x}UNION{?x ?pi <$r>}}ORDER BY ?pi ?po ?x");
if(!$rsp=@file_get_contents("$e?query=$q")) die('<strong>Server error');
try{$x=@new SimpleXMLElement($rsp);}
catch(Exception $e){die('<strong>Client error: '.$e->getMessage());}
foreach($x->results->result as $res) {
  foreach($res->binding as $b) {
    $l=@"&nbsp;<a href='$b->uri'>".preg_replace('/.*[:#\/]/','',$b->uri).'</a>';
    if($b['name']!='x') $p=($b['name']=='po')?"has$l":"is$l&nbsp;of";
    elseif(@$b->uri) $o="<a href='?r=".urlencode($b->uri)."'>$b->uri</a>";
    else $o=(@$b->bnode?'_:':'').htmlspecialchars(@$b->bnode.$b->literal);
  }
  @$t.="<tr><td>$p<td>$o";
}
echo '<table><tr><th>Property<th>Value'.@$t.'</table>';

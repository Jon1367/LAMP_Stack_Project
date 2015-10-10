

<!-- https://farm1.staticflickr.com/439/18773811942_c35b67e1bd_m.jpg -->
<!-- "id": "18752765966",
"owner": "130143241@N07",
"secret": "c7e85cee64",
"server": "404",
"farm": 1,
 -->
<!--  -->
<?

for ($i=0; $i <= count($par2['photos']['photo']); $i++) { 
	# code...
	//var_dump($par2['photos']['photo'][$i]);
?>
<img src="https://farm<?echo $par2['photos']['photo'][$i]['farm'] ?>.staticflickr.com/<? echo $par2['photos']['photo'][$i]['server'] ?>/<?echo $par2['photos']['photo'][$i]['id'] ?>_<?echo $par2['photos']['photo'][$i]['secret'] ?>_m.jpg" alt=""/>
<?

		# code...
	}
?>

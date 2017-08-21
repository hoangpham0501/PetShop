@extends('master')

@section('title', 'Search')


@section('content')

<?php	
	$link = mysqli_connect('localhost','root','','test') or die("Could not connect");
     mysqli_set_charset($link,"utf8");
 	$db = sparql_connect( "http://localhost:8080/fuseki/animal/" );
	if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
	$db->ns( "xsd","http://www.w3.org/2001/XMLSchema#");
	$db->ns( "ont","http://www.semanticweb.org/apple/ontologies/2017/2/ont#");
	$db->ns( "owl", "http://www.w3.org/2002/07/owl#");

	if ((stripos($query, 'bao nhieu')!== FALSE)){
		if (stripos($query, 'cho') !== false) {
            $query = substr($query, 4);
        }
        if(stripos($query, 'con bao nhieu con') !== FALSE){
        	$query = substr($query, 0, strlen($query)-18);
        }
        else if(stripos($query, 'con bao nhieu') !== FALSE){
        	$query = substr($query, 0, strlen($query)-14);
        }
        else if(stripos($query, 'co bao nhieu con') !== FALSE){
        	$query = substr($query, 0, strlen($query)-17);
        }
        else if(stripos($query, 'co bao nhieu') !== FALSE){
        	$query = substr($query, 0, strlen($query)-13);
        }

        $sparql = 'SELECT ?id WHERE {?animal ont:chung_loai "'.$query.'".
							 		?animal ont:id ?id } limit 25';
	}
	else if ((stripos($query, 'thich')!== FALSE) && (stripos($query, 'mau')!== FALSE)){
		if((stripos($query, 'toi thich cho mau')!== FALSE)){
			$query = substr($query, 18);
		}
		if((stripos($query, 'toi thich cho co long mau')!== FALSE)){
			$query = substr($query, 26);
		}
		$sparql = 'SELECT ?id WHERE {?animal ont:mau_sac "'.$query.'".
							 		?animal ont:id ?id } limit 25';
	}
	else if ((stripos($query, 'thich')!== FALSE)){
		if((stripos($query, 'toi thich cho')!== FALSE)){
			$query = substr($query, 14);
		}
		if((stripos($query, 'toi thich cho co')!== FALSE)){
			$query = substr($query, 17);
		}
		$sparql = 'SELECT ?id WHERE {?animal ont:dac_diem "'.$query.'".
							 		?animal ont:id ?id } limit 25';
	}
	else
		$sparql = 'SELECT ?id WHERE {?animal ont:chung_loai "'.$query.'".
							 		?animal ont:id ?id } limit 25';
		
		$result = sparql_query( $sparql ); 
		if( !$result ) { 
			print sparql_errno() . ": " . sparql_error(). "\n"; 
			exit; 
		}
		$fields = sparql_field_array( $result );
		while( $row = sparql_fetch_array( $result ) ){			
			foreach( $fields as $field ){
                $sql = "select * from animal where ip=".$row[$field];
        		$result2 = mysqli_query($link,$sql);
        		if (mysqli_num_rows($result2) > 0) {
                	while($row2 = mysqli_fetch_assoc($result2)){
                   		$id = $row2['id'];
                  		$image= $row2['image'];
                  		$name = $row2['name'];
                  		$description = $row2['description'];
					?>
					<div class="container"> 
					<div class="main">
                  		<div class="view view-first">
 							<img src="/image/<?php echo $image; ?>" />
 
							<div class="mask">
 
							<h2><?php echo $name; ?></h2>
 
 
 							<div class="des"> 
							<?php echo $description; ?>
 							</div>
 							<a href="http://project.dev/list/view/{{ $id }}" class="info">Chi tiết</a>
 							</div>
 						</div>
 					</div>
 					</div>
 						<?php } ?> 
                <?php } ?> 
			<?php } ?> 
	<?php } ?> 
@endsection
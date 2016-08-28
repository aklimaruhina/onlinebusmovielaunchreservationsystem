 <?php
$servername = "www.db4free.net";
$username = "ruhina05"; 
$password = "0a4bfb";
$dbname = "ttticketing";
//  

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM launch_info INNER JOIN launch_reserve
ON launch_reserve.reserve_id  =launch_info.reserve_id WHERE launch_info.launch_id=".$_GET['q']); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result=$stmt->fetchAll();
   
$seat = [];
if(count($result) == 0){
    $stmt = $conn->prepare("SELECT * FROM launch_info WHERE launch_id =".$_GET['q']);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetchAll();

/*
echo "<pre>";
    print_r($row);
    echo "</pre>";die;
    */
$row=$row[0]; // $row is an array itself, it is an indexed array, and in this array every row is in array against each index, that's why it was happening, now why your selected seat not selecting exactly what I am clicking?its ok nw

    // while ($row = $stmt->fetch(PDO::FETCH_NUM) {
        echo "<div class='col-lg-12' style='white-space:nowrap'>";
    echo "<p>cabin : ".$row['launch_name']."</p>";
    echo "<p>Info : ".$row['launch_info']."</p>";
    echo "<p>Seat: ".$row['seat']."</p>";
    $number_of_set=$row['seat'];
    $free_seat_gif='images/W_chair.gif';
    $check_row=floor($number_of_set/2);
    $extra_seat=($number_of_set-$check_row*2)==0?0:1;
    $total_loop=floor($number_of_set/2)+$extra_seat;
    $k = 1;
    for ($j=1; $j < $total_loop+1; $j++) {
        echo "<div class='col-lg-2' style='text-align:center'>";
        for ($i=0; $i <2 ; $i++) { 
            $f_seat=$free_seat_gif;$selected='no';
            echo "<img src='".$f_seat."' class='".$selected."' id='".$k."' onclick='set_selected(this.id)'/>";
            
            $k++;
        }
        echo "</div>";
    }

    
}
elseif(count($result)>0)
{
	foreach ($result as $cabin) {
    //var_dump($cabin['setnum']);die();
    $seat = array_merge($seat,explode(',', $cabin['seat_number']));

    $total_reserve = count($seat);
    
    }

// var_dump($seat);die();
$seatnum = implode(",", $seat);
// $reserve_seat_id = explode(",", $cabin['setnum']);
    echo "<div class='col-lg-12' style='white-space:nowrap'>";
    echo "<p>cabin : ".$cabin['launch_name']."</p>";
    echo "<p>Info : ".$cabin['launch_info']."</p>";
    echo "<p> Total reserved : ".$total_reserve.'</p>';


$number_of_set=$cabin['seat'];
$researved_seat_gif='images/G_chair.gif';// ekhane seat image gulor link gulo boshan
$free_seat_gif='images/W_chair.gif';

$check_row=floor($number_of_set/2);
$extra_seat=($number_of_set-$check_row*2)==0?0:1;
$total_loop=floor($number_of_set/2)+$extra_seat;

$k=1;
for ($j=1; $j < $total_loop+1; $j++) { //eita thik na 


	echo "<div class='col-lg-2' style='text-align:center'>";
		for ($i=0; $i <2 ; $i++) { 

			$f_seat=$free_seat_gif;$selected='no';
			if(in_array($k, $seat)){
				$f_seat=$researved_seat_gif;
				$selected='selected';
			}
			
			echo "<img src='".$f_seat."' class='".$selected."' id='".$k."' onclick='set_selected(this.id)'/>";
			
			$k++;
		}
	echo "</div>";
}



//	}

}

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;


 ?>

 <script type="text/javascript">

function set_selected(id){
var seat_class=$("#"+id).attr('class');

if(seat_class=='selected'){
	alert('Seat already choosen');
}else{
var selected_seat_img='images/Gy_chair.gif';
$("#"+id).attr('src',selected_seat_img);
var selected_seat=$("#selected_seat").val();
if(selected_seat!=''){
	selected_seat=selected_seat+','+id;
}else{
	selected_seat=id;
}
$("#selected_seat").val(selected_seat);
}
//alert(seat_class); selected image kothai?


}

 </script>
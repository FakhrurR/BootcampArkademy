<?php 
function biodata($name,$age,$address,$hobbies,$is_married,$list_school,$skills,$interest_in_coding){
$bio = array ("Name"=>$name,"Age"=>$age,"Address"=>$address,"Hobbies"=>$hobbies,"Is_Married"=>$is_married,"Sekolah"=>$list_school,"Skills"=>$skills,
           "Interest_in_coding"=>$interest_in_coding);

$encodedJSON = json_encode($bio);

print($encodedJSON);

}

biodata("Fakhrur rijal",22,"Perumnas Bumi Indah Blok B No.156",array("Joging","Membaca","koding"),false,
        array('name'=>"SMAN 1 MAROS",'year_in'=> 2012,'year_out'=>2015,'major'=> "IPA"),
        array('PHP'=>"beginner",'JAVA'=>"beginner",'c++'=>"beginner"),true);
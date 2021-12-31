<!-- 정보 서버 -->
<?php
    include('db_test.php');
    session_start();

    $ID = $_SESSION['ID'];

    //새로운 사이즈에 해당하는 변수 $size 선언
    //$newsize = $_POST['newsize'];
    
    //DB에서 실제 ID와 일치하는 사용자의 사이즈를 변경한 값을 $inf_size_change 대입
    //$inf_size_change = "UPDATE member SET size = '" . $newsize . "' WHERE ID = '" . $ID . "';";

    //mysqli_query( $db, $inf_size_change );

    echo "<script>alert('성공적으로 정보변경이 완료되었습니다.')</script>";

    // // 사용자의 사이즈별 피부별에 맞는 추천 페이지로 이동 -->
    // if($newsize == "S" && $newtone == "cs"){
    //     echo "<meta http-equiv='refresh' content='0;url=../main/main_s_cs.php'>";
    // }
?>
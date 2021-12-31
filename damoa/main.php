<?php 
session_start();
include "HTML/db_test.php";
/* 세선 전역변수를 사용할 페이지의 상단부에 배치하면 된다. */
?>
<!-- 메인UI 화면 -->
<!DOCTYPE html>
<html>
    <head>
        <title>DAMOA</title>
        <meta charset="utf-8">
	    <meta name="keywords" content="HTML5, CSS, JQUERY">
        
        <!--반응형 웹 영역-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <!--글자폰트 영역-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Hi+Melody&family=Nanum+Gothic+Coding&family=Sunflower:wght@300&display=swap" rel="stylesheet">
      
        <!--이모티콘 영역-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/v4-shims.css">
       
        <!-- 외부 css연결 -->
        <link rel ="stylesheet" type ="text/css" href ="../CSS/main1.css">
    </head>
    
    <body>
    <div class="primary">
        <!-- 로그인 영역 -->
        <div style ="display: inline-block;">
                <?php
                if(!isset($_SESSION['ID']) || !isset($_SESSION['password'])) {
                    echo "로그인을 해주세요. <a href=\"html/login.php\"><i class=\"fas fa-sign-in-alt\"></i>로그인</a>";
                } else {
                    $ID = $_SESSION['ID'];
                    $password = $_SESSION['password'];
                    $nickname = $_SESSION['nickname'];
                    echo "$nickname 님 환영합니다. ";
                    echo "<a href=\"html/logout.php\"><i class=\"fas fa-sign-out-alt\"></i>로그아웃</a>";?>
                    <a href="html/jungbo.php" ><i class="fas fa-id-badge"></i>계정</a><!-- 계정UI 영역 -->
                    <?php 
                }
               ?>
        </div>
        </div>
        <!-- 로그인 영역 -->
        
        <!-- 헤더영역 시작  -->
        <header class="header">
            <span id="logo">
                <div><a href="main.php" style="color: white;">DAMOA</a></div>
            </span>
            <!-- 검색창 영역-->
            <span class = "box">
                <div class="container-1">
                  <span class="icon"><i class="fa fa-search"></i></span>
                  <input type="search" id="search" placeholder="Search..." style="height:35px;" />
                </div>
            </span>
            <!-- 검색창 영역-->
		</header>
		<!-- 헤더영역 끝 -->
        
        <!-- 콘텐츠 및 섹션 영역 시작 -->
        <div class="content_div">
            <article>
                <header>
                    <div class ="tab_wrapper">
					    <!-- 네비게이션 영역 시작 -->
						<nav class="nav">
							<a href="">낮은 가격순</a> 
							<a href="">높은 가격순</a>
							<a href="">별점 낮은순</a>
							<a href="">별점 높은순</a>
						</nav>
						<!-- 네비게이션 영역 끝 -->	
                        <hr style="border: solid 2px; color:gray;"><br>
                    </div>
                </header>   
            </article>
			<aside class="aside">
				<br>&emsp;<font size = "5px" color="black">&ensp;Menu</font><br><br>
				<footer>
					<a href="main.php"><div>&emsp;&emsp;침대</div></a><!-- 침대 -->
					<a href="html/knit.php"><div>&emsp;&emsp;옷장</div></a><!--옷장 -->
					<a href="html/jacket.php"><div>&emsp;&emsp;책상</div></a><!--책상 -->
					<a href="html/long.php"><div>&emsp;&emsp;의자</div></a><!--의자 영역 -->
					<a href="html/shirt.php"><div>&emsp;&emsp;소파</div></a><!--소파 -->
					<a href="html/cadigan.php"><div>&emsp;&emsp;식탁</div></a><!--식탁 -->
					<a href="html/hoodteeds.php"><div>&emsp;&emsp;서랍장/수납장</div></a><!--서랍장/수납장 -->  
				</footer>		
				<div class="lnb-cont accor-sect">
					<dl class="accor lnb-sort">
						<dt class="accor-tit on"><font size = "5px">&ensp;&ensp;브랜드</font></dt>
						<div style="display: block;">
							<ul class="lnb-sort-list" style="padding-inline-start: 20px;">
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> Blue</label></li>
							</ul>
						</div>
						<dt class="accor-tit on"><font size = "5px"><br>&emsp;가격대</font></dt>
						<div style="display: block;">
							<ul class="lnb-sort-list" style="padding-inline-start: 20px;">
								<li><label><input type="checkbox" name="color" value="blue"> 2만원대 이상</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> 5만원대 이상</label></li>
								<li><label><input type="checkbox" name="color" value="blue"> 10만원대 이상</label></li>
							</ul>
						</div>
					</dl>
				</div>
			</aside>
        </div>
        <!-- 콘텐츠 및 섹션 영역 끝 -->

        <div class= "row tm-gallary">
                <div class="tm-gallery-page">
                        <figcaption>
                            <!-- 데이터베이스 테이블 가져와서 순서대로 데이터 출력 영역-->
                                <?php
                                    $sql = "SELECT * FROM bed";
                                    $result = mysqli_query($db, $sql);
                                    while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <article class="padd max-width">    
                                    <a href="<?php echo $row["link"];?>"><img src="<?php echo $row["image"];?>" width="250px;" height="315px;"></a>
                                    <b>
                                    <?php
                                    echo $row["brand"]; ?> </b><br>
                                    <?php
                                        echo $row["product"];
                                    ?> <br>
                                    </figcaption>
                                    </article>
                                    <?php
                                    }
                                    mysqli_close($db); // 디비 접속 닫기
                                ?>
                        </div>
                    </div>
                    <!-- 데이터베이스 테이블 가져와서 순서대로 데이터 출력 영역-->
    </body>
</html>
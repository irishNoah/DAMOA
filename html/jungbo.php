<!-- 정보 변경 화면 -->
<?php 
/* 세선 전역변수를 사용할 페이지의 상단부에 배치하면 된다. */
session_start();
include('db_test.php');
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="description" content="학부융합프로젝트">
    <meta name="keywords" content="HTML5, CSS, JQUERY">
    <link rel="stylesheet" type="text/css" href="../CSS/Style.css">
    <title>정보 변경 | DAMOA</title>
	<style>
	@media(max-height: 888px) {
  .container{
    height: 100%;
  }
}
</style>
</head>
<!-- head 끝 -->

<!-- body 시작 -->
<body>
	<!-- form 시작 -->
    <!-- 실제 서버와 연동 -->
    <!-- 보안 전송을 위해 post를 이용 -->
	<form action="jungbo_server.php" method="post">
	<div class = "container">
		<div class="DAMOA-wrapper wrapper-member">
		<h1 class="header__title" style="font-size: 3em;">
			<?php
				if(isset($_SESSION['ID']) || isset($_SESSION['password'])) { 
					$ID = $_SESSION['ID'];
					$sql = "select * from member where ID = '$ID'";
					$result = mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($result);
					 }
			?>

			<!--사용자에 적합한 체형 및 피부톤 추천페이지로 이동 영역 -->
				<div><a href="../main.php" style="text-decoration: none; color: black;">DAMOA</a></div>
			
		</h1>
			

		<!-- Member -->
		<div class="n-member-area form-area">
			<!-- Header -->
			<header>
				<h1 style = "text-align: center">정보 확인</h1> <!-- 자신의 아이디, 닉네임, 이메일, 현재 사이즈, 현재 피부톤을 확인 가능 -->
			</header>
			<br>
			<div>
				<div>
					<label for="memberId">아이디 : </label> <!-- 확인하고 싶은 정보는 login_server에서 if(password_verify($password, $hash)
															부분에서 추가해주기 -->
					<?php
					$ID = $_SESSION['ID'];
					echo "$ID"
					?>
				</div>
				<br>
				<div>
					<label for="nickname">닉네임 : </label>
					<?php
					$nickname = $_SESSION['nickname'];
					echo "$nickname"
					?>
				</div>
				<br>
				<div>
					<label for="email">이메일 : </label>
					<?php
					$user_email = $_SESSION['user_email'];
					echo "$user_email"
					?>
				</div>
				<br>

			<div id="joinBtnDiv" class="member-btn">
				<button type="submit" id="update_Size_Tone" class="n-btn btn-md btn-accent" name="save">수정하기</button>
			</div>
		</div>
	</div>
		
	</div>
    </div>
</div>
<form>
	<!-- form 끝 -->
</body>
<!-- body 끝 -->
</html>
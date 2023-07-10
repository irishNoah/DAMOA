# Database-Study
- 해당 프로젝트는 SQL을 중점으로 한 팀 프로젝트입니다.
- 본 프로젝트는 가구 사이트를 토대로 만들었습니다.
- 사용 환경
  - 언어 : PHP / DBMS : MySQL
  
# 프로젝트 목적
- 팀 프로젝트에서는 다룬 SQL 수준보다 좀 더 고차원적인 SQL을 다루어 본다.
  - GROUP / HAVING / ORDER 등 
- 동적 SQL을 활용해 DB에 접근하여, 이를 기반으로 화면을 구성해본다.
  - 판매하는 상품이 적으면 몰라도, 많은 가운데 일일이 카테고리나 브랜드명마다 쿼리를 짜는 것은 비효율적인 방법이라 생각했기 때문

# 주요 구현 부분 설명
## 동적 SQL
### 동적 SQL 초기 상태
```php
$sql = "SELECT * FROM item WHERE 1 = 1";
```

- 실제 DB에 보낼 변수명을 sql이라 지정했다.
- 마지막 부분에 "WHERE 1=1"을 한 이유는 각 분야마다 동적 SQL 부분마다 AND 연산자로 이어지기 때문에 WHERE절 뒤에 바로 AND가 올 수 없으므로 "1=1"를 넣은 것이다.

### 동적 SQL(카테고리)
```php
if(isset($_POST['categoryCK'])){
    if(in_array('bed', $_POST['categoryCK'])){
        $text_category = " AND category = 'bed'";
    }
    else if(in_array('wardrobe', $_POST['categoryCK'])){ 
        $text_category = " AND category = 'wardrobe'";
    }
    else if(in_array('desk', $_POST['categoryCK'])){
        $text_category = " AND category = 'desk'";
    }
    else if(in_array('chair', $_POST['categoryCK'])){
        $text_category = " AND category = 'chair'";
    }
  
    $sql = $sql.$text_category;
}
```
- 초기 sql 변수에서 선택한 카테고리(가구 종류)에 맞게 AND문으로 연결해주었다.
- 이와 같이, ORDER BY와 같은 오름차순/내림차순이나 브랜드를 선택할 경우 위와 같이 AND로 연결해주었다.

## 화면단 소스 코드
### 브랜드 목록 출력(GROUP 및 ORDER 활용)
```php
<div style="display: block;">
    <ul class="lnb-sort-list" style="padding-inline-start: 20px;">
        <?php #브랜드별로 제품의 개수가 많은 순으로 item테이블에서 브랜드를 출력한다.
            $sql2 = "SELECT brand, count(*) FROM item GROUP BY brand ORDER BY count(*) desc";
            $result2 = mysqli_query($db, $sql2);
        ?>
         <li><label><input type="checkbox" name="brandCK[]" value="all" <?php if(isset($_POST['brandCK']) && in_array("all",
         $_POST['brandCK'])) echo 'checked="checked"' ?>/>전체</label></li>
        <?php    
            while($row = mysqli_fetch_assoc($result2)) {?>
                <li><label><input type="checkbox" name="brandCK[]" value="<?php echo $row["brand"];?>" <?php if(isset($_POST['brandCK']) && in_array($row["brand"],
                $_POST['brandCK'])) echo 'checked="checked"' ?>/><?php echo $row["brand"];?></label></li>
            <?php
        }?>
    </ul>
</div>
```
- DB에 적재되어 있는 브랜드가 많기 때문에, 각 브랜드를 DB에서 GROUP화를 한 이후 많은 순으로 보이도록 하였다.

### 카테고리
```php
<div style="display: block;">  
    <ul class="lnb-sort-list" style="padding-inline-start: 20px;">
        <li><label><input type="radio" name="categoryCK[]" value="bed" <?php if(isset($_POST['categoryCK']) && in_array("bed",
        $_POST['categoryCK'])) echo 'checked="checked"' ?>/>침대</label></li>
        <li><label><input type="radio" name="categoryCK[]" value="wardrobe" <?php if(isset($_POST['categoryCK']) && in_array("wardrobe",
        $_POST['categoryCK'])) echo 'checked="checked"' ?>/>옷장</label></li>
        <li><label><input type="radio" name="categoryCK[]" value="desk" <?php if(isset($_POST['categoryCK']) && in_array("desk",
        $_POST['categoryCK'])) echo 'checked="checked"' ?>/>책상</label></li>
        <li><label><input type="radio" name="categoryCK[]" value="chair" <?php if(isset($_POST['categoryCK']) && in_array("chair",
        $_POST['categoryCK'])) echo 'checked="checked"' ?>/>의자</label></li>
        <li><label><input type="radio" name="categoryCK[]" value="sofa" <?php if(isset($_POST['categoryCK']) && in_array("sofa",
        $_POST['categoryCK'])) echo 'checked="checked"' ?>/>소파</label></li>
        <li><label><input type="radio" name="categoryCK[]" value="dining" <?php if(isset($_POST['categoryCK']) && in_array("dining",
        $_POST['categoryCK'])) echo 'checked="checked"' ?>/>식탁</label></li>
        <li><label><input type="radio" name="categoryCK[]" value="dresser" <?php if(isset($_POST['categoryCK']) && in_array("dresser",
        $_POST['categoryCK'])) echo 'checked="checked"' ?>/>서랍장/수납장</label></li>
    </ul>
</div>
```
- 침대 / 옷장 / 책상 등 가구 목록들을 중복 체크할 수 있도록 하여, 추후 선택한 카테고리에 맞게 화면을 구성할 수 있도록 구현하였다.

### (낮은/높은) 가격순 및 (낮은/높은) 별점순
```php
<div class ="tab_wrapper">					    
    <label><input type="radio" name="od[]" value="lowprice" <?php if(isset($_POST['od']) && in_array("lowprice",
            $_POST['od'])) echo 'checked="checked"' ?>/> 낮은 가격순 </label>
    <label><input type="radio" name="od[]" value="highprice" <?php if(isset($_POST['od']) && in_array("highprice",
            $_POST['od'])) echo 'checked="checked"' ?>/> 높은 가격순</label>
    <label><input type="radio" name="od[]" value="lowpgrade" <?php if(isset($_POST['od']) && in_array("lowpgrade",
            $_POST['od'])) echo 'checked="checked"' ?>/> 별점 낮은순</label>
    <label><input type="radio" name="od[]" value="highgrade" <?php if(isset($_POST['od']) && in_array("highgrade",
            $_POST['od'])) echo 'checked="checked"' ?>/> 별점 높은순</label>
    <input type="submit" value= "검색">
</div>
```
- "낮은 가격순" 및 "높은 가격순" / "별점 낮은 순" 및 "별점 높은 순"을 선택할 수 있도록 하여, 추후 선택한 가격순 혹은 별점순에 맞게 화면을 구성할 수 있도록 구현하였다.
  
### 가격 범위 선택
```php
<div style="display: block;">
  <ul class="lnb-sort-list" style="padding-inline-start: 20px;">
                    <li><label><input type="radio" name="selectprice[]" value="allprice" <?php if(isset($_POST['selectprice']) && in_array("allprice",
                    $_POST['selectprice'])) echo 'checked="checked"' ?>/>전체</label></li>        
                    <li><label><input type="radio" name="selectprice[]" value="underprice" <?php if(isset($_POST['selectprice']) && in_array("underprice",
                    $_POST['selectprice'])) echo 'checked="checked"' ?>/>50만원 이하</label></li>
                    <li><label><input type="radio" name="selectprice[]" value="middleprice" <?php if(isset($_POST['selectprice']) && in_array("middleprice",
                    $_POST['selectprice'])) echo 'checked="checked"' ?>/>50만원 ~ 100만원</label></li>
                    <li><label><input type="radio" name="selectprice[]" value="topprice" <?php if(isset($_POST['selectprice']) && in_array("topprice",
                    $_POST['selectprice'])) echo 'checked="checked"' ?>/>100만원 이상</label></li>
  </ul>
</div>
```

![DBP_Category_RangePrice](https://github.com/irishNoah/Database-Programming/assets/80700537/901f7181-60fb-411f-9487-d548f30ecab3)
- [전체 / 50만원 이하 / 50~100만원 사이 / 100만원 이상]으로 구분하여, 추후 선택한 범위에 맞는 금액으로 화면을 구성할 수 있도록 구현하였다.

# 시연 영상
<div align="center">
  <img width="80%" src="https://user-images.githubusercontent.com/83913056/178137258-883967d4-705b-4a08-8f11-4bc565c7c171.gif"/> <br/>
  <p>회원가입</p>  
</div>

<div align="center">
  <img width="80%" src="https://user-images.githubusercontent.com/83913056/178754441-5bd9468e-f023-4275-b344-803d1bd8b6ad.gif"/> <br/>
  <p>로그인</p> 
</div>

<div align="center">
  <img width="80%" src="https://user-images.githubusercontent.com/83913056/178754573-7bc203e5-8a40-4682-9147-e0881803590e.gif"/> <br/>
  <p>브랜드 SELECT</p> 
</div>

<div align="center">
  <img width="80%" src="https://user-images.githubusercontent.com/83913056/178754670-1bc7df92-2c70-4de8-9730-399081e1694d.gif"/> <br/>
  <p>장바구니</p> 
</div>


# 마치며
- 다음 프로젝트에서는 범용적인 언어인 Java를 활용해서 SQL / DB / 동적 쿼리를 다뤄보고 싶다.
- 이 프로젝트에서는 애초에 DB 테이블 및 필드를 설계한 것으로만 진행되서 크게 변경될 점이 없었다.
- 하지만, 실무에서는 언제나 테이블이나 필드가 추가 및 삭제될 수 있다는 생각이 든다.
- 그 때마다, 이거에 맞게 각 파일에 있는 쿼리문을 변경???
  - 정말 개인적으로도 그리고 유지보수 측면에서 힘들 것 같다.
- Java에서는 스프링과 ORM을 활용해서 이를 더 쉽게 처리한다는데, 한 번 배워서 다음 팀 또는 토이 프로젝트에 접목해보고 싶다.

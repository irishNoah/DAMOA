# Database-Study
- 해당 프로젝트는 SQL을 중점으로 한 토이 프로젝트입니다.
- 본 프로젝트는 가구 사이트를 토대로 만들었습니다.
- 사용 환경
  - 언어 : PHP / DBMS : MySQL
    
# 프로젝트 목적
- 팀 프로젝트에서는 다룬 SQL 수준보다 좀 더 고차원적인 SQL을 다루어 본다.
  - GROUP / HAVING / ORDER 등 
- 동적 SQL을 활용해 화면단을 구성해본다.

# 주요 구현 부분 설명
## 브랜드 목록 출력(GROUP 및 ORDER 활용)
![DBP_Category_Brand_Dynamic](https://github.com/irishNoah/Database-Programming/assets/80700537/a260ea88-162e-40ea-92f1-e3aea6068255)
- DB에 적재되어 있는 브랜드가 많기 때문에, 각 브랜드를 DB에서 GROUP화를 한 이후 많은 순으로 보이도록 하였다.

## 카테고리
![DBP_Categor_Menu](https://github.com/irishNoah/Database-Programming/assets/80700537/d5aefd1f-de8e-483d-a1fd-5c356b744661)
- 침대 / 옷장 / 책상 등 가구 목록들을 중복 체크할 수 있도록 하여, 추후 선택한 카테고리에 맞게 화면을 구성할 수 있도록 구현하였다.
- 추후 선택한 카테고리에 맞게 화면 구성을 할 수 있도록 

## (낮은/높은) 가격순 및 (낮은/높은) 별점순
![DBP_Category_SortPrice](https://github.com/irishNoah/Database-Programming/assets/80700537/d2b89f69-d45d-487d-8ed0-5e40cf7a6091)
- "낮은 가격순" 및 "높은 가격순" / "별점 낮은 순" 및 "별점 높은 순"을 선택할 수 있도록 하여, 추후 선택한 가격순 혹은 별점순에 맞게 화면을 구성할 수 있도록 구현하였다.
  
## 가격 범위 선택
![DBP_Category_RangePrice](https://github.com/irishNoah/Database-Programming/assets/80700537/901f7181-60fb-411f-9487-d548f30ecab3)
- [전체 / 50만원 이하 / 50~100만원 사이 / 100만원 이상]으로 구분하여, 추후 선택한 범위에 맞는 금액으로 화면을 구성할 수 있도록 구현하였다.



# 마치며
- 다음 프로젝트에서는 범용적인 언어인 Java를 활용해서 SQL / DB / 동적 쿼리를 다뤄보고 싶다.
- 이 프로젝트에서는 애초에 DB 테이블 및 필드를 설계한 것으로만 진행되서 크게 변경될 점이 없었다.
- 하지만, 실무에서는 언제나 테이블이나 필드가 추가 및 삭제될 수 있다는 생각이 든다.
- 그 때마다, 이거에 맞게 각 파일에 있는 쿼리문을 변경???
  - 정말 개인적으로도 그리고 유지보수 측면에서 힘들 것 같다.
- Java에서는 스프링과 ORM을 활용해서 이를 더 쉽게 처리한다는데, 한 번 배워서 다음 팀 또는 토이 프로젝트에 접목해보고 싶다.

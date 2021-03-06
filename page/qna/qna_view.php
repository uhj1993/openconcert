<!DOCTYPE html>
<html lang="ko">
  <head>
    <?php include $_SERVER["DOCUMENT_ROOT"]."/openconcert/include/head.php" ?>
    <!-- css file -->
    <link rel="stylesheet" href="/openconcert/css/style.css" />
    <link rel="stylesheet" href="/openconcert/css/subpage.css" />
    <link rel="stylesheet" href="/openconcert/css/media.css" />
    <title>OPEN CONCERT</title>
  </head>
  <body>
    <div class="wrap">
      <?php include $_SERVER["DOCUMENT_ROOT"]."/openconcert/include/header.php" ?>
      <?php
        $qna_detail_num=$_GET['num'];
        include $_SERVER['DOCUMENT_ROOT'].'/openconcert/process/connect/db_connect.php';
        // 해당 게시물 정보
        $sql="select * from opc_qna where OPC_QNA_num=$qna_detail_num";
        $result=mysqli_query($dbConn, $sql);
        $row=mysqli_fetch_array($result);
        $qna_detail_tit=$row['OPC_QNA_tit'];
        $qna_detail_name=$row['OPC_QNA_name'];
        $qna_detail_des=$row['OPC_QNA_desc'];
        $qna_detail_new_des=nl2br($qna_detail_des);
        $qna_detail_hit=$row['OPC_QNA_hit'];
        $new_hit=$qna_detail_hit + 1;
        $sql="update opc_qna set OPC_QNA_hit=$new_hit where OPC_QNA_num=$qna_detail_num";
        $qna_detail_reg=$row['OPC_QNA_reg'];
        mysqli_query($dbConn, $sql);
        // DB ROW COUNT
        $query = "SELECT * FROM opc_qna";
        $data = mysqli_query($dbConn, $query);
        $total_rows = mysqli_num_rows($data);
      ?>
      <section class="view__section">
        <div class="sub-title">
          <h2><a href="/openconcert/page/qna/qna.php?page=1">Q&A</a></h2>
        </div>
        <div class="view__container center">
          <div class="view-title">
            <h4><?=$qna_detail_tit?></h4>
          </div>
          <div class="view-reg">
            <p>등록일: <?=$qna_detail_reg?></p><p>조회수: <?=$qna_detail_hit?></p>
          </div>
          <div class="view-des">
            <p><?=$qna_detail_new_des?></p>
          </div>
          <div class="answer-box">
            <ul class="list-reply">
              <li id="#" class="reply-item">
                답글1
                <ul class="list-reply-comment">
                  <li>답글2</li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- view-list start -->
            <div class="view-list">이전글<span class="view-prev">
            <?php
            if($qna_detail_num - 1 == 0){
              include $_SERVER['DOCUMENT_ROOT'].'/openconcert/process/connect/db_connect.php';
              $sql="SELECT * FROM opc_qna WHERE OPC_QNA_num > $qna_detail_num";
              $prev_result=mysqli_query($dbConn, $sql);
              $prev_row=mysqli_fetch_array($prev_result);
              $prev_qna_detail_tit=$prev_row['OPC_QNA_tit'];
            ?>
              등록된 이전글이 없습니다.
              </span>
            </div>
            <?php
                } else {
              // 이전글 넘버
              $sql="SELECT * FROM opc_qna WHERE OPC_QNA_num < $qna_detail_num ORDER BY OPC_QNA_num desc limit 1";
              $prev_result=mysqli_query($dbConn, $sql);
              $prev_row=mysqli_fetch_array($prev_result);
              $prev_num=$prev_row['OPC_QNA_num'];
              $prev_qna_detail_tit=$prev_row['OPC_QNA_tit'];
            ?>
            <a href="/openconcert/page/qna/qna_view.php?num=<?=$prev_num?>">
              <?=$prev_qna_detail_tit?></a></span>
              </div>
            <?php
                }
            ?>
            <div class="view-list">다음글<span class="view-next">
            <?php
            // 현재 페이지가 마지막 페이지?
            $sql="SELECT * FROM opc_qna WHERE OPC_QNA_num ORDER BY OPC_QNA_num desc limit 1";
            $result=mysqli_query($dbConn, $sql);
            $row=mysqli_fetch_array($result);
            $number=$row['OPC_QNA_num'];
            if($qna_detail_num==$number){
              // 현재 페이지 번호 31번, 전체 로우 갯수 28개, 다음 게시글??
              // 전체 로우 갯수를 세고, 
            ?>
              등록된 다음글이 없습니다.
            </span>
            </div>
            <?php
                } else {
            // 다음글 넘버
              $next_sql="SELECT * FROM opc_qna WHERE OPC_QNA_num > $qna_detail_num limit 1";
              $next_result=mysqli_query($dbConn, $next_sql);
              $next_row=mysqli_fetch_array($next_result);
              $next_num=$next_row['OPC_QNA_num'];
              $next_qna_detail_tit=$next_row['OPC_QNA_tit'];
            ?>
              <a href="/openconcert/page/qna/qna_view.php?num=<?=$next_num?>">
              <?=$next_qna_detail_tit?>
              </a></span>
            </div>
            <?php
                }
            ?>
          <div class="qna__btns">
            <div class="qna__btn">
              <a href="/openconcert/page/qna/qna.php?page=1" class="list-btn">목록</a>
            </div>
          <?php
            if($userid == $qna_detail_name){
          ?>
            <div class="qna__btn">
              <a href="/openconcert/page/qna/qna_modi.php?num=<?=$qna_detail_num?>" class="modi-btn">수정</a>
              <button class="delete-btn" onclick="confirmDel()">삭제</button>
            </div>
            <?php
                } else if($userlevel == 1){
            ?>
              <div class="qna__btn">
              <a href="/openconcert/page/qna/qna_modi.php?num=<?=$qna_detail_num?>" class="modi-btn">수정</a>
              <button class="delete-btn" onclick="confirmDel()">삭제</button>
            </div>
            <?php
                } else {
            ?>
            <?php
                }
            ?>
          </div>
        </div>
      </section>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/openconcert/include/footer.php" ?>
    </div>
    <!-- js script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/openconcert/js/custom.js"></script>
    <script>
                function confirmDel(){
                let confirmCheck = confirm('정말로 삭제하시겠습니까?')
                if(confirmCheck == false){
                  return false;
                } else {
                  location.href='/openconcert/process/qna/qna_delete.php?num=<?=$qna_detail_num?>';
                }            
              }
    </script>
  </body>
</html>

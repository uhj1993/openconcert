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
      <section class="perform__section">
        <div class="sub-title">
          <h2>UPLOAD</h2>
        </div>
        <div class="perform__container center">
          <form action="/openconcert/process/perform/perform_insert.php" method="post" name="perform_form" enctype="multipart/form-data">
            <label for="performTitle">제목</label>
            <input type="text" placeholder="공연 제목을 입력해주세요." id="performTitle" name="perform_title" spellcheck="false" class="perform-info">

            <label for="performGenre">장르</label>
            <input type="text" placeholder="장르를 입력해주세요." id="performGenre" name="perform_genre" spellcheck="false" class="perform-info">

            <label for="performActor">배우</label>
            <input type="text" placeholder="배우를 입력해주세요." id="performActor" name="perform_actor" spellcheck="false" class="perform-info">

            <label for="performEsrb">콘텐츠 등급</label>
            <input type="text" placeholder="콘텐츠 등급을 입력해주세요." id="performEsrb" name="perform_esrb" spellcheck="false" class="perform-info">

            <label for="performThumb">줄거리</label>
            <input type="text" placeholder="간략 줄거리를 입력해주세요." id="performThumb" name="perform_thumb" spellcheck="false" class="perform-info">

            <label for="performDesc">상세 줄거리</label>
            <textarea id="performDesc" placeholder="상세 줄거리를 입력해주세요." name="perform_desc" spellcheck="false" class="perform-desc"></textarea>

            <!-- img -->
              <div>
                <div class="img-input">
                  <input class="uploadName" placeholder="Main Image">
                  <label for="performImg" class="perform-img">포스터 이미지</label>
                  <input type="file" id="performImg" class="uploadHidden" name="perform_img">
                </div>
                <div class="img-box">
                  <img id="per-img">
                </div>
              </div>
          <!-- end img -->
          </form>
          <div class="submit__btns">
            <button class="write-btn">등록하기</button>
          </div>
        </div>
      </section>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/openconcert/include/footer.php" ?>
    </div>
    <!-- js script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/openconcert/js/custom.js"></script>
    <script src="/openconcert/js/input_img.js"></script>
    <script>
        const submitBtn = document.querySelector(".write-btn");
        submitBtn.addEventListener('click', function(){
          document.perform_form.submit();
        });
    </script>
  </body>
</html>

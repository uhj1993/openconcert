<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- favicon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="/openconcert/img/favicon.png"
    />
    <!-- awesome font -->
    <script
      src="https://kit.fontawesome.com/4d645dbcdc.js"
      crossorigin="anonymous"
    ></script>
    <!-- css file -->
    <link rel="stylesheet" href="/openconcert/css/style.css" />
    <link rel="stylesheet" href="/openconcert/css/media.css" />
    <title>OPEN CONCERT</title>
  </head>
  <body>
    <div class="wrap">
      <?php include $_SERVER["DOCUMENT_ROOT"]."/openconcert/include/header.php" ?>
      <section class="search__section">
        <div class="search__container">
          <input
            type="text"
            class="search__input"
            placeholder="제목을 입력해주세요"
          />
          <button type="button" class="send__btn">검색</button>
        </div>
        <div class="movie__back">
          <video loop autoplay muted controls>
            <source src="/openconcert/img/movie1.mov" />
          </video>
        </div>
      </section>
      <section class="best__section center">
        <div class="best__container">
          <h2 class="best__title">Best Contents</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat
            corporis reiciendis voluptate id, rem iste cupiditate amet quos
            nihil consequuntur molestiae dolor perferendis quis commodi suscipit
            distinctio hic reprehenderit ipsum!
          </p>
        </div>
        <ul class="best__lists">
          <li class="best__list">
            <div class="best__video">1</div>
            <h3>꽃이 없으면 쓸쓸한</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel
              nostrum consequuntur,
            </p>
          </li>
          <li class="best__list">
            <div class="best__video">1</div>
            <h3>꽃이 없으면 쓸쓸한</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel
              nostrum consequuntur,
            </p>
          </li>
          <li class="best__list">
            <div class="best__video">1</div>
            <h3>꽃이 없으면 쓸쓸한</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel
              nostrum consequuntur,
            </p>
          </li>
        </ul>
      </section>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/openconcert/include/footer.php" ?>
    </div>
    <!-- js script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/openconcert/js/custom.js"></script>
  </body>
</html>

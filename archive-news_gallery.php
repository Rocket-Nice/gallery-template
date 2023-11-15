<?php get_header(); ?>
    <main>
        <section class="news">
            <div class="news__container">
                <div class="news-title">
                    <div class="news-title__text">События</div>
                    <div class="news-tags">
                        <input class="news-tags__item-checkbox" data-news-type="fashion" id="1" type="checkbox">
                        <label for="1" class="news-tags__item">Модный блог</label>
                        <input class="news-tags__item-checkbox" data-news-type="news" id="2" type="checkbox">
                        <label for="2" class="news-tags__item">Новости</label>
                        <input class="news-tags__item-checkbox" data-news-type="promotion" id="3" type="checkbox">
                        <label for="3" class="news-tags__item">Акции</label>
                    </div>
                </div>
                <div class="news__inner">
                </div>
                <div class="lds-ellipsis--container">
                    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                </div>
            </div>
        </section>
    </main>
    <?php get_footer(); ?>
</body>
</html>
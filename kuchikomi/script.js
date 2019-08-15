$(function(){
  const API_KEY = 'AIzaSyC1WgZ9btQl-x5RkUGEg-BOlQEfZx8ai-E';

  $.getScript('https://maps.google.com/maps/api/js?key=' + API_KEY + '&libraries=places', function(){
    const service = new google.maps.places.PlacesService(document.createElement('div'));

    // 全レビュー格納所
    const allReview = [];
    // プレイスIDを持つラッパー
    const $review_wrap = $('#js_review_wrap');
    // 全レビュー出力場所
    const $review_all = $('#js_review_all');
    // ☆4以上のレビュー出力場所
    const $review_over4 = $('#js_review_over4');

    service.getDetails({
      // プレイスIDは投稿を想定しているためHTMLから取得
      placeId: $review_wrap.data('place-id'),
      fields: ['review']
    }, function(place, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        console.log(place);
        $.each(place.reviews, function(){

          // レビューの氏名・レート・内容を取得し格納
          const reviewObj = {};
          reviewObj['name'] = this.author_name;
          reviewObj['rate'] = this.rating;
          reviewObj['content'] = this.text;

          // 全レビュー格納所へin
          allReview.push(reviewObj);
        });

        //place.places.nextPage();
        // $.each(place.reviews, function(){

        //   // レビューの氏名・レート・内容を取得し格納
        //   const reviewObj = {};
        //   reviewObj['name'] = this.author_name;
        //   reviewObj['rate'] = this.rating;
        //   reviewObj['content'] = this.text;

        //   // 全レビュー格納所へin
        //   allReview.push(reviewObj);
        // });
      }

      // 全クチコミを回す
      for (const key in allReview) {
        // 全クチコミ格納dl
        const $dl = $('<dl class="list-review-output" data-rate="' + allReview[key].rate + '" />');
        // ☆4以上の口コミ格納dl
        const $dl_rate_over4 = $('<dl class="list-review-output" data-rate="' + allReview[key].rate + '" />');

        // レートが☆4以上なら
        if (allReview[key].rate >= 4) {
          $dl_rate_over4.append('<dt class="ttl">名前</dt><dd class="data">' + allReview[key].name + '</dd>');
          $dl_rate_over4.append('<dt class="ttl">テキスト</dt><dd class="data">' + allReview[key].content + '</dd>');
          // ☆4以上用のdlへ入れる
          $review_over4.append($dl_rate_over4);
        }

        $dl.append('<dt class="ttl">名前</dt><dd class="data">' + allReview[key].name + '</dd>');
        $dl.append('<dt class="ttl">テキスト</dt><dd class="data">' + allReview[key].content + '</dd>');
        // 全クチコミ用格納dlにどんどん追加する
        $review_all.append($dl);
      }
    });
  });
});
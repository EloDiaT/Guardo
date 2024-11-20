jQuery(document).ready(function($) {
  var botCheckFlag = false;
  function botCheck() {
    var botPattern = "(googlebot\/|Googlebot-Mobile|Googlebot-Image|Google favicon|Mediapartners-Google|bingbot|slurp|java|wget|curl|Commons-HttpClient|Python-urllib|libwww|httpunit|nutch|phpcrawl|msnbot|jyxobot|FAST-WebCrawler|FAST Enterprise Crawler|biglotron|teoma|convera|seekbot|gigablast|exabot|ngbot|ia_archiver|GingerCrawler|webmon |httrack|webcrawler|grub.org|UsineNouvelleCrawler|antibot|netresearchserver|speedy|fluffy|bibnum.bnf|findlink|msrbot|panscient|yacybot|AISearchBot|IOI|ips-agent|tagoobot|MJ12bot|dotbot|woriobot|yanga|buzzbot|mlbot|yandexbot|purebot|Linguee Bot|Voyager|CyberPatrol|voilabot|baiduspider|citeseerxbot|spbot|twengabot|postrank|turnitinbot|scribdbot|page2rss|sitebot|linkdex|Adidxbot|blekkobot|ezooms|dotbot|Mail.RU_Bot|discobot|heritrix|findthatfile|europarchive.org|NerdByNature.Bot|sistrix crawler|ahrefsbot|Aboundex|domaincrawler|wbsearchbot|summify|ccbot|edisterbot|seznambot|ec2linkfinder|gslfbot|aihitbot|intelium_bot|facebookexternalhit|yeti|RetrevoPageAnalyzer|lb-spider|sogou|lssbot|careerbot|wotbox|wocbot|ichiro|DuckDuckBot|lssrocketcrawler|drupact|webcompanycrawler|acoonbot|openindexspider|gnam gnam spider|web-archive-net.com.bot|backlinkcrawler|coccoc|integromedb|content crawler spider|toplistbot|seokicks-robot|it2media-domain-crawler|ip-web-crawler.com|siteexplorer.info|elisabot|proximic|changedetection|blexbot|arabot|WeSEE:Search|niki-bot|CrystalSemanticsBot|rogerbot|360Spider|psbot|InterfaxScanBot|Lipperhey SEO Service|CC Metadata Scaper|g00g1e.net|GrapeshotCrawler|urlappendbot|brainobot|fr-crawler|binlar|SimpleCrawler|Livelapbot|Twitterbot|cXensebot|smtbot|bnf.fr_bot|A6-Indexer|ADmantX|Facebot|Twitterbot|OrangeBot|memorybot|AdvBot|MegaIndex|SemanticScholarBot|ltx71|nerdybot|xovibot|BUbiNG|Qwantify|archive.org_bot|Applebot|TweetmemeBot|crawler4j|findxbot|SemrushBot|yoozBot|lipperhey|y!j-asr|Domain Re-Animator Bot|AddThis)";
    var re = new RegExp(botPattern, 'i');
    var userAgent = navigator.userAgent;
    if (re.test(userAgent)) {
      $('.wow').css('visibility', 'visible');
      botCheckFlag = true;
    } else {
      wow = new WOW();
      wow.init();
      botCheckFlag = false
    }
  }
  botCheck();
  
  function mainPadding() {
    var winWidth = $(window).width();
    var _headerHeight = 0
    var _playerHeight = 0
    _headerHeight = parseInt(document.querySelector('header').getBoundingClientRect().height);
    
    if(winWidth <= 700) {
      
      if(!$('header').hasClass('main_page')) {

        if($('.podcast_player').hasClass('visible')) {
          _playerHeight = parseInt(document.querySelector('.podcast_player.visible .audio-player').getBoundingClientRect().height);
          $('.podcast_player.visible .audio-player').css('top', _headerHeight);
          $('main').css('padding-top', _headerHeight + _playerHeight);
        } else {
          $('main').css('padding-top', _headerHeight);          
        }
        $('header').addClass('fixed');
      }
    } else {
      if(!$('header').hasClass('main_page')) {
        $('main').css('padding-top', _headerHeight);
        $('header').removeClass('fixed');
        $('header').addClass('abs');        
      }
    }
    
  }
  mainPadding();
  $(window).on('scroll resize', mainPadding);
  
  
  
  $(function () {
    $("a[href^='#']").bind('click', function () {
      var _href = $(this).attr("href");
      if(!$(this).parents('.menu-item').hasClass('menu-item-has-children')) {
        $("html, body").animate({
          scrollTop: $(_href).offset().top + "px"
        }, 800);
        return false;
      }
    });
  });
  
  $('.js_number_item').hover(
    function() {
      var number = $(this).attr('data-number');
      $('.num_wrapper_' + number).addClass('active');
      $('.line_item_' + number).addClass('active');
      $('.knight_point--item_' + number).addClass('active');
    }, function() {
      $('.line_item').removeClass('active');
      $('.inner').removeClass('active');
      $('.knight_point').removeClass('active');
    }
  );

  $('.knight_point').hover(
    function() {
      var number = $(this).attr('data-number');
      $('.num_wrapper_' + number).addClass('active');
      $('.line_item_' + number).addClass('active');
      $('.knight_point--item_' + number).addClass('active');
    }, function() {
      $('.line_item').removeClass('active');
      $('.inner').removeClass('active');
      $('.knight_point').removeClass('active');
    }
  );



  
  
  $(document).on('click', '.burger_wrapper', function (e) {
    e.preventDefault();
    $('.burger').toggleClass('active');
    $('.menu_wrapper').toggleClass('visible');
    $('body').toggleClass('fix');
    $('.bgr_mask').toggleClass('visible');
  });
  
  $(document).on('click', 'main', function (e) {
    $('.burger').removeClass('active');
    $('.menu_wrapper').removeClass('visible');
    $('body').removeClass('fix');
    $('.bgr_mask').removeClass('visible');
  });
  
  $(document).on('click', '.bgr_mask, .main_menu .btn, .main_menu > .menu > li > ul > li > a', function (e) {
    $('.burger').removeClass('active');
    $('.menu_wrapper').removeClass('visible');
    $('body').removeClass('fix');
    $('.bgr_mask').removeClass('visible');
  });
  
  function getHubspotForm() {
    
    $('.hs-form-iframe').each(function () {
      
      var iframeName = $(this);
      var iframeContent = iframeName[0].contentDocument;
      var iframeLink = document.createElement('link');
      var iframeLink_sb = document.createElement('link');
      var iframeLink_pr = document.createElement('link');
      var iframeLink_demo = document.createElement('link');
      var parent_type = $(this).parents('.form_item').attr('data-form-type');
      var timestamp = Date.now();
      
      
      if(parent_type == 'subscribe') {
        
        iframeLink_sb.href = 'https://guardora.ai/wp-content/themes/guardora/static/css/hubspot_style_sb.css?v=' + timestamp;
        iframeLink_sb.rel = 'stylesheet';
        iframeLink_sb.type = 'text/css';
        
        iframeContent.head.appendChild(iframeLink_sb);
        
      } else if(parent_type == 'pricing') {
        
        iframeLink_pr.href = 'https://guardora.ai/wp-content/themes/guardora/static/css/hubspot_style_pr.css?v=' + timestamp;
        iframeLink_pr.rel = 'stylesheet';
        iframeLink_pr.type = 'text/css';
        
        iframeContent.head.appendChild(iframeLink_pr);
        
      } else if(parent_type == 'get_demo') {
        
        iframeLink_demo.href = 'https://guardora.ai/wp-content/themes/guardora/static/css/hubspot_style_demo.css?v=' + timestamp;
        iframeLink_demo.rel = 'stylesheet';
        iframeLink_demo.type = 'text/css';
        
        iframeContent.head.appendChild(iframeLink_demo);
        
        
      } else {
        
        iframeLink.href = 'https://guardora.ai/wp-content/themes/guardora/static/css/hubspot_style.css?v=' + timestamp;
        iframeLink.rel = 'stylesheet';
        iframeLink.type = 'text/css';
        
        iframeContent.head.appendChild(iframeLink);
        
      }
      
      setTimeout(() => {
        iframeName.css('width', '99%');
      }, 1000);
      setTimeout(() => {
        iframeName.css('width', '100%');
      }, 3000);
      
    })
    
  }
  window.onload = () => {
    getHubspotForm();
  }
  $('.hs-form-iframe').onload = function () {
    getHubspotForm();
  };
  setTimeout(function () {
    // getHubspotForm();
  }, 1000);
  
  
  function f_getScrollTop() {
    var scroll = parseInt($(window).scrollTop());
    var btn = $('.scroll_top');
    
    if ($('.main_page').hasClass('no-touch')) {
      
      if ($('.main_page').attr('data-curr-slide') > 0) {
        btn.addClass('visible');
      } else {
        btn.removeClass('visible');
      }
    } else {
      if (scroll > 200) {
        btn.addClass('visible');
      } else {
        btn.removeClass('visible');
      }
    }
  }
  f_getScrollTop();
  $(window).on('scroll resize', f_getScrollTop);
  
  
  $('body').on('click', '.scroll_top', function () {
    var btn = $('.scroll_top');
    
    if ($('.main_page').hasClass('no-touch')) {
      
      $('a[href$="#main_window"]').trigger('click');
      $('#product_demo').removeAttr('style');
      btn.removeClass('visible');
      
    } else {
      
      $("html, body").animate({
        scrollTop: 0 + "px"
      }, 300);
      
    }
  })
  
  $('.js_menu_trigger').on('click', function () {
    $(this).toggleClass('active');
    $('.main_menu ul').toggleClass('visible');
  });
  
  $('.main_menu ul li a').on('click', function () {
    $(this).removeClass('active');
    $('.main_menu ul').removeClass('visible');
  });
  
  function menuCheck() {
    var winWidth = $(window).width();
    if (winWidth > 700) {
      $(this).removeClass('active');
      $('.main_menu ul').removeClass('visible');
    }
    
  }
  menuCheck()
  window.onresize = menuCheck;
  
  
  $.fn.animate_Text = function () {
    var string = this.text();
    return this.each(function () {
      var $this = $(this);
      $this.html(string.replace(/./g, '<span class="new">$&</span>'));
      $this.find('span.new').each(function (i, el) {
        setTimeout(function () { $(el).addClass('div_opacity'); }, 20 * i);
      });
    });
  };
  $('#example').show();
  $('#example').animate_Text();
  
  
  
  function get_text_position() {
    if (!botCheckFlag) {
      $('.animate_words').each(function () {
        var _el = $(this);
        var text = _el.text().split(' ');
        _el.html('')
        text.forEach(element => {
          _el.append('<span class="anim_item">' + element + '&nbsp;</span>');
        });
      })
    }
    
  }
  get_text_position()
  window.onresize = menuCheck;
  
  function compare_text_position() {
    if(!botCheckFlag) {
      var scroll = parseInt($(window).scrollTop());
      var winHeight = $(window).height();
      var bottom = scroll + winHeight * 0.9;
      
      $('.animate_words').each(function () {
        var _el = $(this);
        var length = _el.find('.anim_item').length;
        if (bottom > _el.offset().top) {
          for (let i = 0; i < length; i++) {
            setTimeout(() => {
              _el.find('.anim_item').eq(i).addClass('_show')
            }, 50 * i);
          }
        }
        
      });
    }
  }
  compare_text_position();
  $(window).on('scroll resize', compare_text_position);
  
  $('.industry_carusel').slick({
    dots: false, // Отключаем стандартные точки
    arrows: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: $('.slider-pagination-prev'),
    nextArrow: $('.slider-pagination-next')
  });
  $('.industry_carusel').on('afterChange', function(event, slick, currentSlide){
    var ci=$(slick.$slides.get(currentSlide));
    let curSlide = +(ci[0].getAttribute('data-slick-index')) + 1
    if (curSlide <= 9) {
      curSlide = '0' + String(curSlide);
      $('.current-slide').text(curSlide)
    } else {
      $('.current-slide').text(curSlide)
    }
  });
  function closest(el, selector) {
    if (Element.prototype.closest) {
      return el.closest(selector);
    }
    
    let parent = el;
    
    while (parent) {
      if (parent.matches(selector)) {
        return parent;
      }
      
      parent = parent.parentElement;
    }
    
    return null;
  }
  
  
  
  
  
  var winWidth = $(window).width();
  var audios = new Array();
  var current_scr = '';
  var current_index = 0;
  
  function playerInit() {
    audios = []
    
    
    $('.podcast_player').each(function(index) {
      var _this = $(this);
      
      const audioPlayer = _this.find(".audio-player")[0];
      
      const playBtn = audioPlayer.querySelector(".controls .toggle-play");
      const closeBtn = audioPlayer.querySelector(".controls .close_btn");
      const playBtnMobile = audioPlayer.closest(".podcast_player").querySelector('.player_indicator .toggle-play');
      const btnText = audioPlayer.querySelector(".controls .btn_name");
      
      const src = _this.find('.audio-player').attr('data-source');
      // const audio = new Audio(src);
      const audio = new Howl({
        src: [src],
        html5: true,
        
        onload: function(e) { 
          _this.find(".time .length").text(getTimeCodeFromNum(audio._duration));
          audio._volume = .75;
        },
        onplay: function() { 
          _this.find('.toggle-play').removeClass('play').addClass('pause');
        },
        onpause: function() {
          _this.find('.toggle-play').removeClass('pause').addClass('play');
        }
      });
      
      audios.push(audio)
      
      $(document).on('click', ".podcast_player", function(e) {
        e.stopPropagation();
        e.preventDefault();
      });
      
      // Отображение ползунка громкости
      _this.find('.volume-container').hover(
        function() {
          _this.find('.timeline').addClass('small');
          _this.find('.volume-button').addClass('active');
          _this.find('.volume-container').addClass('expanded');
        }, function() {
          _this.find('.timeline').removeClass('small');
          _this.find('.volume-button').removeClass('active');
          _this.find('.volume-container').removeClass('expanded');
        }
      );
      
      
      // Клик по таймлайну для перемотки
      const timeline = audioPlayer.querySelector(".timeline");
      timeline.addEventListener("click", e => {
        const timelineWidth = window.getComputedStyle(timeline).width;
        const timeToSeek = e.offsetX / parseInt(timelineWidth) * audio._duration;
        audio.seek(timeToSeek);
        console.log(timeToSeek)
      }, false);
      
      // Движение таймлайна и текущего времени при проигрывании
      setInterval(() => {
        const progressBar = audioPlayer.querySelector(".progress");
        progressBar.style.width = audio.seek() / audio._duration * 100 + "%";
        audioPlayer.querySelector(".time .current").textContent = getTimeCodeFromNum(
          audio.seek()
        );
      }, 500);      
      
      // Клик по ползунку громкости
      const volumeSlider = audioPlayer.querySelector(".controls .volume-slider");
      volumeSlider.addEventListener('click', e => {
        const sliderWidth = window.getComputedStyle(volumeSlider).width;
        const newVolume = e.offsetX / parseInt(sliderWidth);
        audio.volume(newVolume);
        audioPlayer.querySelector(".controls .volume-percentage").style.width = newVolume * 100 + '%';
      }, false);
      
      // Mute
      audioPlayer.querySelector(".volume-button").addEventListener("click", () => {
        const volumeEl = audioPlayer.querySelector(".volume-container .volume");
        audio.muted = !audio.muted;
        if (audio.muted) {
          audio.mute(true)
          volumeEl.classList.remove("icono-volumeMedium");
          volumeEl.classList.add("icono-volumeMute");
        } else {
          audio.mute(false)
          volumeEl.classList.add("icono-volumeMedium");
          volumeEl.classList.remove("icono-volumeMute");
        }        
      });
      
      // Триггер запуска/паузы
      playBtn.addEventListener('click', function() {
        if(playBtn.classList.contains('play')) {
          pauseAll();
          audio.play();
        } else if (playBtn.classList.contains('pause')) {
          audio.pause();
        }
      });
      
      // Мобильный триггер запуска
      playBtnMobile.addEventListener('click', function() {
        if(playBtn.classList.contains('play')) {
          pauseAll();
          audio.play();
          $('.podcast_player').removeClass('visible');
          $(_this).addClass('visible');
          _this.parents('.blog_list_item').css('z-index', 10);
          mainPadding();            
        } else if (playBtn.classList.contains('pause')) {
          audio.pause();
          _this.parents('.blog_list_item').css('z-index', 'initial');
          mainPadding();
        }
      });
      
      // Закрыть плеер
      closeBtn.addEventListener('click', function() {
        audio.pause();
        _this.parents('.blog_list_item').css('z-index', 'initial');
        $('.podcast_player').removeClass('visible');
        mainPadding();
      });
    })
  }
  
  playerInit();
  
  
  function pauseAll() {
    $.each(audios, function(idx, obj) {
      obj.pause();
    });    
  }
  
  
  //turn 128 seconds into 2:08
  function getTimeCodeFromNum(num) {
    let seconds = parseInt(num);
    let minutes = parseInt(seconds / 60);
    seconds -= minutes * 60;
    const hours = parseInt(minutes / 60);
    minutes -= hours * 60;
    
    if (hours === 0) return `${minutes}:${String(seconds % 60).padStart(2, 0)}`;
    return `${String(hours).padStart(2, 0)}:${minutes}:${String(
      seconds % 60
    ).padStart(2, 0)}`;
  }
  
  
  
  
  
  
  
  var schemeNumber = 0;  
  
  $('.js-scheme-number').hover(
    function() {
      $('.text_item').removeClass('active');
      $('.inner').removeClass('active');
      $('.line').removeClass('active');
      
      schemeNumber = $(this).attr('data-number');
      $(this).addClass('active');
      $('.text_item_' + schemeNumber).addClass('active');
      $('.line_' + schemeNumber).addClass('active');
      $('.inner_2').removeClass('pulse');
    }, function() {
      $('.text_item').removeClass('active');
      $('.inner').removeClass('active');
      $('.line').removeClass('active');
    }
  );
  
  
  
  
  
  
  
  
  
  
  
  
  
  
});




function questions_answer(item) {
  const answer = document.getElementById(`content_questions_answer-${item}`),
  icon = document.getElementById(`questions_top_icon-${item}`),
  questions = document.getElementById(`questions_top_question-${item}`)
  let key = answer.getAttribute('data-key') === 'true';
  key = !key;
  answer.setAttribute('data-key', key);
  
  if (key) {
    answer.classList.add('answer_true');
    icon.style.transform = 'rotate(135deg)';
    questions.classList.add('question-active')
    answer.classList.remove('answer_false');
  } else {
    answer.classList.remove('answer_true');
    questions.classList.remove('question-active')
    icon.style.transform = 'rotate(0)';
    answer.classList.add('answer_false');
  }
}










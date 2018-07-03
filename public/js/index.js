$(function () {
    // 加载初始化
    $(window).load(function () {
        adjustHeightOfPage(1)
        $('.gallery-two').magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {enabled: true}
        });
        $('#tmNavbar a').click(function () {
            $('#tmNavbar').collapse('hide');
            adjustHeightOfPage($(this).data("no")); // Adjust page height
        });
        $(window).resize(function () {
            var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");
            setTimeout(function () {
                adjustHeightOfPage(currentPageNo);
            }, 1000);
        });
        $('body').addClass('loaded');
    });

    function adjustHeightOfPage(pageNo) {
        var offset = 80;
        var pageContentHeight = 0;
        var pageType = $('div[data-page-no="' + pageNo + '"]').data("page-type");
        if (pageType != undefined && pageType == "gallery") {
            pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .tm-img-gallery-container").height();
        }
        else {
            pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height();
        }
        if ($(window).width() >= 992) {
            offset = 120;
        }
        else if ($(window).width() < 480) {
            offset = 40;
        }
        // Get the page height
        var totalPageHeight = 15 + $('.cd-slider-nav').height()
            + pageContentHeight + offset
            + $('.tm-footer').height();
        // Adjust layout based on page height and window height
        if (totalPageHeight > $(window).height()) {
            $('.cd-hero-slider').addClass('small-screen');
            $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
        }
        else {
            $('.cd-hero-slider').removeClass('small-screen');
            $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
        }
    }

    function formSubmit() {
        let formData = new FormData(document.querySelector("#formData"));
        // let formData= new FormData($('#formData')[0]);
        // formData.append("CustomField", "This is some extra data");
        console.log(formData.getAll('name'))
        $.ajax({
            url: "{{ url('api/email') }}",
            type: "post",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
        }).success(function (res) {
            alert('提交信息成功');
            $('submit').attr('disabled', 'disabled');
            console.log(res)
        }).fail(function (res) {
            alert('提交信息失败');
            console.log(res)
        });
        return false;
    }

    // 高德地图
    // var map = new AMap.Map('map', {
    //   resizeEnable: true,
    //   zoom: 15,
    //   center: [121.3620145118, 31.1360110791]
    // });
    // map.plugin(['AMap.ToolBar', 'AMap.Scale', 'AMap.OverView'],
    //   function () {
    //     map.addControl(new AMap.ToolBar());
    //     map.addControl(new AMap.Scale());
    //     map.addControl(new AMap.OverView({ isOpen: true }));
    //   });
    // var marker = new AMap.Marker({
    //   position: [121.3620145118, 31.1360110791]
    // });
    // marker.setMap(map);
})

// 谷歌地图
function initMap() {
    var uluru = {lat: 31.136, lng: 121.362};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }




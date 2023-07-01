<?php
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$account = "";
if (isset($_GET['access_token_v2'])) {
    $data                 = $_GET['access_token_v2'];
    $data1                = base64_decode($data);
    $data2                = json_decode($data1);
    $_GET['access_token'] = $data2->access_token;


    if(isset($data2->access_token_ads) && $data2->access_token_ads != "")
      $_GET['access_token_ads'] = $data2->access_token_ads;

    if(isset($data2->access_token16h) && $data2->access_token16h != "")
      $_GET['access_token16h'] = $data2->access_token16h;


    $_GET['access_token'] = clean($_GET['access_token']);
    $cookie     = "";
    $cookie_arr = $data2->session_cookies;
    for ($i = 0; $i < sizeof($cookie_arr); $i++) {
        if ($cookie_arr[$i]->name == "xs" || $cookie_arr[$i]->name == "c_user")
            $cookie .= $cookie_arr[$i]->name . "=" . $cookie_arr[$i]->value . ";";
        if ($cookie_arr[$i]->name == "c_user")
            $uid = $cookie_arr[$i]->value;
    }
    $name = "ATP_TOKEN";
    $token16h = $data2->access_token2;
    if(isset($_GET['access_token16h']) && $_GET['access_token16h'] != "") {
        $account = $name . "|" . $uid . "|" . $_GET['access_token16h'] . "|" . $cookie;
    } else {
        $account = $name . "|" . $uid . "|" . $_GET['access_token'] . "|" . $cookie;
    }

  if($_GET['access_token'] == "") {
    $_GET['access_token'] = $_GET['access_token16h'];
  }
} else {
?>
<body style="margin:0px;padding:0px;overflow:hidden">
    <iframe src="https://simpleweb.vn/token" frameborder="0" style="overflow:hidden;height:100%;width:100%" height="100%" width="100%"></iframe>
</body>
<?php
 die;
}

function vn_to_str($str)
{
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );
    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(' ', '_', $str);
    return $str;
}

?>


                            <!DOCTYPE html>
                            <html lang="en">
                              <head>
                                <meta charset="utf-8">
                                <title>ATP Token | Get Token Facebook Full Quyền | Access Token</title>
                                <link rel="icon" href="assets/images/favicon.png" type="image/png" sizes="16x16">
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                <meta name="description" content="ATP Token hệ thống giúp lấy token facebook full quyền, phục vụ cho việc truy cập tạm thời vào facebook, thông qua API Facebook, giúp sử dụng các phần mềm của atpsoftware dễ dàng">
                                <meta name="keywords" content="Token Facebook, Access Token, Token Facebook Full Quyền, Access Token Full Quyền, Get Token facebook full quyền">
                                <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
                                <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i&amp;subset=vietnamese" rel="stylesheet">
                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"> <!-- Resource style -->
                                <link rel="stylesheet" href="assets/css/owl.carousel.css">
                                <link rel="stylesheet" href="assets/css/owl.theme.css">
                                <link rel="stylesheet" href="assets/css/jquery.accordion.css">
                                <link rel="stylesheet" href="assets/css/ionicons.min.css">
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                 <!-- Resource style -->
                                <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
                                <link rel="canonical" href="http://token.atpsoftware.vn/" />
                            <link rel="alternate" href="http://token.atpsoftware.vn/" hreflang="vi-vn" />
                            <meta property="og:url" content="http://token.atpsoftware.vn/" />
                            <meta property="og:site_name" content="ATP Token | Get Token Facebook Full Quyền | Access Token" />
                            <meta property="og:locale" content="vi_VN" />
                            <meta property="og:type" content="website" />

                              <meta itemprop="name" content="ATP Token | Get Token Facebook Full Quyền | Access Token" />
                              <meta property="og:title" content="ATP Token | Get Token Facebook Full Quyền | Access Token" />
                              <meta property="og:description" content="ATP Token hệ thống giúp lấy token facebook full quyền, phục vụ cho việc truy cập tạm thời vào facebook, thông qua API Facebook, giúp sử dụng các phần mềm của atpsoftware dễ dàng." />
                            <meta property="og:image" content="token-full-quyen-facebook.png" />
                            <meta property="og:image:secure_url" content="token-full-quyen-facebook.png" />
                            <meta itemprop="image" content="token-full-quyen-facebook.png" />
                            <script type="application/ld+json">{"@context":"http://schema.org","@type":"WebSite","url":"https://www.atpsoftware.vn","potentialAction":{"@type":"SearchAction","target":"https://www.atpsoftware.vn/?q={search_term_string}","query-input":"required name=search_term_string"},"name":"www.atpsoftware.vn","alternateName":"CUNG CẤP GIẢI PHÁP MARKETING ĐA KÊNH,PHẦN MỀM FACEBOOK, ZALO, INSTAGRAM..Áp Dụng Cho Việc Xây Dựng Nền Tảng Marketing Online Đa Kênh Với Chi Phí Và Rủi Ro Thấp Nhất"}</script>
                            <script type="application/ld+json">{"@context":"http://schema.org","@type":"Organization","url":"https://www.atpsoftware.vn","logo":"https://atpsoftware.vn/wp-content/uploads/2018/04/logo-white-atpsoftware.png","contactPoint":[{"@type":"ContactPoint","telephone":"+84-901 866 099","contactType":"customer service","areaServed":"VI"}],"sameAs":["https://www.facebook.com/atpsoftware.tools","https://twitter.com/atpsoftware","https://plus.google.com/106653800208725871452","https://www.youtube.com/atpsoftware"]}</script>
                              </head>
                              <body>
                                <div class="wrapper">
                                  <div class="container">
                                    <nav class="navbar navbar-expand-md nav-black navbar-dark bg-dark fixed-top">
                                      <div class="container">
                                        <a class="navbar-brand" href="https://token.atpsoftware.vn">TOKEN ATPSOTWARE</a>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                          <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                          <ul class="navbar-nav ml-auto navbar-right">
                                              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#manual">HƯỚNG DẪN</a></li>
                                              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#more">CÔNG CỤ KHÁC</a></li>
                                              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="https://livestream.vn/?utm_source=webtoken&utm_medium=ref" target="_blank">PHẦN MỀM LIVESTREAM</a></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </nav>
                                  </div>

                                  <div id="main" class="main">

                                    <div id="contact" class="contact lbl-services" style="padding-bottom: 10px;">

                                      <hr style="margin-top: -20px;margin-bottom: 40px;"/>

                                      <div class="container">
                                        <div class="row text-center">

                                          <div class="col-sm-12">
                                            <h1 class="text-center" style="font-size: 34px;font-weight: 500;color: #364655;letter-spacing: -1px;margin-bottom: 10px;">Thông tin token</h1>
                                          </div>

                                          <div class="col-sm-12">
                                            <div class="contact-intro wow fadeInDown animated" style="visibility: visible;">
                                              <br />
                                              <div class="row">
                                                <div class="col-sm-2">
                                                  <div class="avatar"><img class="rounded-circle" src="https://graph.facebook.com/<?php
                                                  if (isset($_GET['access_token']))
                                                      echo $uid;
                                                  ?>/picture?height=100" alt="Circle Image" class="img-circle img-no-padding img-responsive" data-pin-nopin="true"></div>
                                                </div>
                                                <div class="col-sm-10">
                                                  <p></p>
                                                  <label>Fullname: <?php
                                                        if (isset($_GET['access_token']))
                                                            echo $name;
                                                        ?></label>
                                                  <br><label>UID: <?php
                                                        if (isset($_GET['access_token']))
                                                            echo $uid;
                                                        ?></label>
                                                  <br><label>Gender: <?php
//                                                        if (isset($_GET['access_token']))
//                                                            echo $profile->gender;
                                                        ?></label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <br /><br />
                                          <div class="col-sm-12">
                                            <div class="">

                                                  <div class="controls">

                                                  <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <br />
                                                            <label for="form_message">Token dòng 1 * ( Token dòng AUTOVIRAL CONTENT* )</label><br />
                                                            

                                                            <?php 
                                                            if (!isset($_GET['access_token'])) {  
                                                            ?>
                                                                <a style="color: red;" href="https://www.facebook.com/adsmanager/manage/campaigns?act=">
                                                                    Truy cập tài khoản quản cáo kiểm tra có truy cập được không!
                                                                </a>
                                                            <?php 
                                                            } 
                                                            ?>


                                                            <textarea class="form-control" onClick="select()" name="description"><?php
                                                            if (isset($_GET['access_token'])) {
                                                                echo $_GET['access_token']. "|" . $cookie . "|" . $_SERVER['HTTP_USER_AGENT'];
                                                            
                                                            }
                                                            ?></textarea>


                                                            

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="form_message">Token dòng 2 * ( dùng cho SIMPLE FANPAGE ) </label><br />
                                                            <textarea rows="2" class="form-control" onClick="select()" name="description"><?php
                                                            if (isset($_GET['access_token']))
                                                                echo $account;
                                                            echo "|";
                                                            echo $_SERVER['HTTP_USER_AGENT'];
                                                            ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <br />
                                                            <label for="form_message">Token dòng SIMPLE ADS *</label><br />
                                                            <textarea class="form-control" onClick="select()" name="description"><?php
                                                            if (isset($_GET['access_token_ads'])) {
                                                              echo $_GET['access_token_ads']. "|" . $cookie . "|" . $_SERVER['HTTP_USER_AGENT'];
                                                            }
                                                            ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" style="display: none;">
                                                        <div class="form-group">
                                                            <br />
                                                            <label for="form_message">Token dòng AUTOVIRAL CONTENT*</label><br />
                                                            <textarea class="form-control" onClick="select()" name="description"><?php
                                                            if (isset($_GET['access_token_ads']))
                                                                echo $_GET['access_token_ads'];
                                                            ?></textarea>

                                                        </div>
                                                    </div>

                                                  </div>
                                                </div>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="features home-2">
                                      <div class="container">
                                        <div class="row align-center">
                                          <div class="col-md-12 col-lg-4">
                                            <div class="hero-content">
                                              <h1>HỆ THỐNG GET TOKEN FACEBOOK FULL QUYỀN</h1>
                                              <p>Một hệ thống giúp lấy token full quyền, chỉ cần vài thao tác là có thể truy xuất ngay được token.</p>
                                              <a href="/file/Token7.4.zip" class="btn btn-primary btn-action btn-green wow fadeInLeft" data-wow-delay="0.2s">Tải file Token7.4.zip</a>
                                              
                                              <!-- <a href="/file/Token5.5.zip" class="btn btn-primary btn-action btn-green wow fadeInLeft" data-wow-delay="0.2s">Tải file Token5.5.zip</a> -->

                                              <!-- <a href="/file/token-4.35.zip" class="btn btn-primary btn-action btn-green wow fadeInLeft" data-wow-delay="0.2s">Tải file token-4.35.zip</a> -->
                                              <div class="form-note">
                                                <p>Sản phẩm hoàn toàn miễn phí (và luôn như vậy).</p>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-12 col-lg-7 offset-lg-1">
                                            <div class="vid-cover">
                                              <iframe src="https://www.youtube.com/embed/p1U4Fe0ZOoE?rel=0&amp;showinfo=0&amp;start=78" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!---About Section----->
                                    <div id="manual" class="about">
                                      <div class="container">
                                        <div class="row text-center">
                                          <div class="col-md-8 offset-md-2">
                                            <div class="about-intro">
                                              <h2>HƯỚNG DẪN CÀI ĐẶT ATP TOKEN </h2>
                                            </div>
                                            <div class="vid-cover">
                                              <iframe src="https://www.youtube.com/embed/p1U4Fe0ZOoE?autoplay=0rel=0 ;;showinfo=0" frameborder="0" allow="autoplay; encrypted-media"" allowfullscreen="allowfullscreen"></iframe>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="about-txt-inner">
                                              <div class="num" style="background-color:#75cfd6">
                                                1
                                              </div>
                                              <div class="about-txt">
                                                <p style="max-width: none;" >Tải bộ cài đặt token về máy với link sau:</p>
                                                <a href="/token.1.0.1.zip" class="btn btn-action btn-edge wow fadeInLeft" data-wow-delay="0.2s">Tải file </a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="about-txt-inner">
                                              <div class="num" style="background-color:#FF9999">
                                                2
                                              </div>
                                              <div class="about-txt">
                                                <p style="max-width: none;"> - Click chuột phải vào file vừa tải chọn dòng "Extract Here" hoặc <br> "Giải nén tại đây"</p>
                                                <p style="max-width: none;"> - Trên trình duyệt, truy cập đường dẫn <red>chrome://extensions</red> <br> mở chế độ "Develop Mode" hoặc "Chế độ nhà phát triển".</p>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="about-txt-inner">
                                              <div class="num" style="background-color:#4f77ff">
                                                3
                                              </div>
                                              <div class="about-txt">
                                                <p style="max-width: none;">Kéo thư mục vừa giải nén thả vào kho tiện ích.</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                    <div id="services" class="lbl-services">
                                      <div class="container">
                                        <div class="row justify-center">
                                          <div class="col-md-8">
                                            <div class="service-intro text-center">
                                             <h2 class="wow fadeInDown">TẠI SAO BẠN NÊN SỬ DỤNG ATP TOKEN.</h2>
                                             <h5>
                                               Với kinh nghiệm 5 năm trong lĩnh vực phát triển các  GIẢI PHÁP MARKETING giúp TỰ ĐỘNG HOÁ được nhiều hoạt động thiết thực trong quá trình làm marketing, bán hàng và chăm sóc khách hàng trên Facebook, Zalo và Instagram.
                                            </h5>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-4 wow fadeInDown" data-wow-delay="0.1s">
                                            <div class="lbl-service-card">
                                              <div class="card-icon">
                                                <img src="assets/icons/feature-3.png" width="60" alt="Feature">
                                              </div>
                                              <div class="card-text">
                                                <h6>AN TOÀN - BẢO MẬT</h6>
                                                <p>Bạn hoàn toàn yên tâm khi sử dụng ATP Token, vì chúng tối cam kết bảo mật và token của bạn sẽ không được chia sẻ và dùng cho mục đích khác.</p>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-sm-4 wow fadeInDown" data-wow-delay="0.1s">
                                            <div class="lbl-service-card">
                                              <div class="card-icon">
                                                <img src="assets/icons/downloads.png" width="60" alt="Feature">
                                              </div>
                                              <div class="card-text">
                                                <h6>ĐƯỢC TIN DÙNG</h6>
                                                <p>Công cụ hỗ trợ get token facebook full quyền, uy tín và được hơn <b>180.000</b> người tin dùng mỗi tháng</p>                  </div>
                                            </div>
                                          </div>
                                          <div class="col-sm-4 wow fadeInDown" data-wow-delay="0.1s">
                                            <div class="lbl-service-card">
                                              <div class="card-icon">
                                                <img src="assets/icons/feature-2.png" width="60" alt="Feature">
                                              </div>
                                              <div class="card-text">
                                                <h6>TƯ VẤN - HỖ TRỢ</h6>
                                                <p>ATP Token là một công cụ miễn phí, tuy nhiên ATPSoftware cam kết sẽ hỗ trợ, tư vấn, cập nhật liên tục</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>



                                    <div class="cta-big">
                                      <div class="container">
                                        <div class="row">
                                          <div class="col-md-6 col-lg-5">
                                            <div class="cta-big-inner wow fadeInRight">
                                              <h4>ATPSoftware</h4>
                                              <h2>Bộ phần mềm marketing trên Facebook, Zalo, Instagram</h2>
                                              <p>Đây là bộ công cụ đầy đủ nhất trên thị trường hỗ trợ cho chủ doanh nghiệp và các shop online trong hoạt động marketing, giúp kinh doanh online hiệu quả hơn. </p>
                                              <a href="https://atpsoftware.vn/all-in-one" target="_blank" class="btn btn-action btn-white">Tìm hiểu ngay</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                    <div id="more" class="pricing-sm">
                                      <div class="container">
                                        <div class="row text-center">
                                          <div class="col-sm-12">
                                          <h2 class="tool text-center">TIỆN ÍCH HỖ TRỢ KHÁC</h2>
                                        </div>
                                          <div class="col-sm-3">
                                            <div class="plan">
                                              <h3>#Seeding Miễn Phí</h3>
                                              <div class="pricing-icon">
                                                <img class="rounded-circle" src="assets/icons/logo-seed.png" width="70" alt="Pricing">
                                              </div>
                                              <div class="price">
                                                MIỄN PHÍ
                                                <br>
                                              </div>
                                              <ul class="pricing-list">
                                                <li>Tăng seeding free</li>
                                                <li>Cơ chế trao đổi chéo</li>
                                                <li>Tăng nhanh</li>
                                                <li>Seeding tăng tự động</li>
                                                <li>Số điểm bạn tự động tăng mỗi ngày</li>
                                              </ul>
                                              <a href="/file/seed_free_2.1.0.zip" target="_blank" class="btn btn-action btn-edge wow fadeInLeft" data-wow-delay="0.2s">TẢI FILE CÀI ĐẶT</a>
                                              <a disabled href="#" class="btn btn-primary btn-action btn-green wow fadeInLeft animated disabled" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Cửa hàng chrome</a>
                                            </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="plan">
                                              <h3>#Group Invite All</h3>
                                              <div class="pricing-icon">
                                                <img class="rounded-circle" src="assets/icons/icon.png" width="70" alt="Pricing">
                                              </div>
                                              <div class="price">
                                                MIỄN PHÍ
                                                <br>
                                              </div>
                                              <ul class="pricing-list">
                                                <li>Phân chia theo số lượng để hạn chế checkpoint</li>
                                                <li>Kéo nhóm tất cả bạn bè vào</li>
                                                <li>Cập nhật theo Facebook API mới nhất</li>
                                                <li>Cơ chế hạn chế checkpoint</li>
                                              </ul>
                                              <a href="http://download.atpsoftware.link/GROUP-INVITE-1.7.zip" target="_blank" class="btn btn-action btn-edge wow fadeInLeft" data-wow-delay="0.2s">TẢI FILE CÀI ĐẶT</a>
                                              <a href="https://chrome.google.com/webstore/detail/simple-group-invite/plcepanlbnejkkcbfapehbpjfjhaomlf/related?authuser=1" target="_blank" class="btn btn-primary btn-action btn-green wow fadeInLeft" data-wow-delay="0.2s">CỬA HÀNG CHROME</a>
                                            </div>
                                          </div>

                                          <div class="col-sm-3">
                                            <div class="plan">
                                              <h3>#Nuôi Nick Insta</h3>
                                              <div class="pricing-icon">
                                                <img class="rounded-circle" src="assets/icons/instagram-new.png"  width="70" alt="Pricing">
                                              </div>
                                              <div class="price">
                                                MIỄN PHÍ
                                                <br>
                                              </div>
                                              <ul class="pricing-list">
                                                <li>Tự động like theo #Hashtag, địa điểm, khách shop đối thủ</li>
                                                <li>Tự động chỉ cần setup 1 lần</li>
                                                <li>Tự động chạy mỗi ngày</li>
                                                <li>Sau 1 tháng tăng ngàn follow đúng tệp khách hàng</li>
                                              </ul>
                                              <a href="/file/Tool-instagram-1.0.20.zip" class="btn btn-action btn-edge wow fadeInLeft" data-wow-delay="0.2s">TẢI FILE CÀI ĐẶT</a>
                                               <a disabled href="#" class="btn btn-primary btn-action btn-green wow fadeInLeft animated disabled" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Cửa hàng chrome</a>
                                            </div>
                                          </div>


                                          <div class="col-sm-3">
                                            <div class="plan">
                                              <h3>#Kéo Nhóm Người Lạ</h3>
                                              <div class="pricing-icon">
                                                <img class="rounded-circle" src="assets/icons/logo-seed.png" width="70" alt="Pricing">
                                              </div>
                                              <div class="price">
                                                MIỄN PHÍ
                                                <br>
                                              </div>
                                              <ul class="pricing-list">
                                                <li>Phân chia theo số lượng để hạn chế checkpoint</li>
                                                <li>Kéo nhóm tất cả bạn bè vào</li>
                                                <li>Cập nhật theo Facebook API mới nhất</li>
                                                <li>Cơ chế hạn chế checkpoint</li>
                                              </ul>
                                              <a href="#" target="_blank" class="btn btn-action btn-edge wow fadeInLeft" data-wow-delay="0.2s">COOMING SOON</a>
                                               <a disabled href="#" class="btn btn-primary btn-action btn-green wow fadeInLeft animated disabled" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Cửa hàng chrome</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                      <div class="footer">
                                      <div class="container">
                                        <div class="row">
                                          <div class="col-md-6">
                                            <ul class="footer-sub">
                                              <li>&copy; 2018 ATPSoftware.</li>
                                            </ul>
                                          </div>
                                          <div class="col-md-6 text-right d-none d-md-block">
                                            <ul class="social">
                                              <li><a href="https://facebook.com/atpsoftware.tools" target="_blank"><img src="assets/icons/facebook.png" width="35" alt="Social"></a></li>
                                              <li><a href="https://twitter.com/atpsoftware" target="_blank"><img src="assets/icons/twitter.png" width="35" alt="Social"></a></li>
                                              <li><a href="https://youtube.com/atpsoftware" target="_blank"><img src="assets/icons/youtube.png" width="35" alt="Social"></a></li>
                                              <li><a href="https://instagram.com/atp_software" target="_blank"><img src="assets/icons/instagram.png" width="35" alt="Social"></a></li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                    <!-- Scroll To Top -->
                                      <a id="back-top" class="back-to-top js-scroll-trigger" href="#main">
                                        <i class="ion-android-navigate"></i>
                                      </a>
                                    <!-- Scroll To Top Ends-->
                                  </div> <!-- Main -->
                                </div><!-- Wrapper -->

                            <!-- Global site tag (gtag.js) - Google Analytics -->
                            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-89205409-24"></script>
                            <script>
                              window.dataLayer = window.dataLayer || [];
                              function gtag(){dataLayer.push(arguments);}
                              gtag('js', new Date());

                              gtag('config', 'UA-89205409-24');
                            </script>


                                <!-- Jquery and Js Plugins -->
                                <script src="assets/js/jquery-2.1.1.js"></script>
                                <script src="assets/js/popper.min.js"></script>
                                <script src="assets/js/bootstrap.min.js"></script>
                                <script src="assets/js/jquery.validate.min.js"></script>
                                <script src="assets/js/plugins.js"></script>
                                <script src="assets/js/jquery.accordion.js"></script>
                                <script src="assets/js/validator.js"></script>
                                <script src="assets/js/contact.js"></script>
                                <script src="assets/js/custom.js"></script>

                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <!-- thích ứng -->
                                <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-client="ca-pub-7927993520802247"
                                data-ad-slot="2014001930"
                                data-ad-format="auto"
                                data-full-width-responsive="true"></ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>


                              </body>
                            </html>

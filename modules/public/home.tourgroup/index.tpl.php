<link href="css/rateit.css" rel="stylesheet">
<link href="css/tourgroup.css" rel="stylesheet">
<script src="js/jquery.rateit.js"></script>

<div id="breadcrumb">
    <div class="container">
        <div class="row breadcrumb">
            <span><a href="{@www}"><span>Du lịch ></span></a></span>
            <span><a href="{@www}/nhom-tour"><span>Du lịch trong nước ></span></a></span>
            <span><a href="{@www}/nhom-tour"><span>Tour Miền Bắc ></span></a></span>
            <span><a href="{@www}/nhom-tour"><span>Du lịch Hạ Long </span></a></span>
        </div>
    </div>
</div>


<div id="list-tour" class="listtour list-tour-search">
    <div class="container" style="margin-bottom: 60px;margin-top:30px;">
        <div class="row">
            <div class="col-md-3 col-sm-4 hidden-xs">
                <div style="font-weight: bold; font-size: 16px; text-transform: uppercase; margin-bottom: 15px;">Bộ lọc tìm kiếm</div>
                <div style="padding: 15px; background: #f4f4f4">
                    <div class="noikhoihanh" style="margin: 10px 0 30px 0">
                        <p style="font-weight: bold; text-transform: uppercase; margin-bottom: 10px;">Nơi khởi hành</p>
                        <div>

                            <select class="form-control input-md" id="departureIDFilter">
                                <option value="0" selected="">Nơi khởi hành</option>
                                <option value="1"> Hồ Chí Minh</option>
                                <option value="3">Hà Nội</option>
                                <option value="4">Đà Nẵng</option>
                                <option value="5">Cần Thơ</option>
                                <option value="6">Hải Phòng</option>
                                <option value="7">Bình Dương</option>
                                <option value="8">Nha Trang</option>
                                <option value="10">Huế</option>
                                <option value="11">Quy Nhơn</option>
                                <option value="12">Đồng Nai</option>
                                <option value="13">Phú Quốc</option>
                                <option value="14">Long Xuyên</option>
                                <option value="15">Quảng Ngãi</option>
                                <option value="16">Vũng Tàu</option>
                                <option value="17">Quảng Ninh</option>
                                <option value="18">Buôn Ma Thuột</option>
                                <option value="19">Vinh</option>
                                <option value="20">Cà Mau</option>
                                <option value="22">Rạch Giá</option>
                                <option value="24">Đà Lạt</option>
                                <option value="29">Thanh Hóa</option>
                                <option value="30">Quảng Bình</option>
                                <option value="31">Hồ Chí Minh - VSCC</option>
                                <option value="32">Bạc Liêu</option>
                                <option value="33">Bảo Lộc</option>
                                <option value="34">Đồng Tháp</option>
                                <option value="35">Sóc Trăng</option>
                                <option value="38">TripU</option>
                                <option value="39">Long An</option>
                                <option value="40">Thái Nguyên</option>
                            </select>
                        </div>
                    </div>
                    <div class="thoigiankhoihanh" style="margin: 10px 0 10px 0; border-bottom: 1px solid #ccc; padding-bottom: 30px">
                        <p style="font-weight: bold; text-transform: uppercase; margin-bottom: 10px;">Ngày khởi hành</p>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 mg-bot10">
                                <input class="form-control" id="departureDateFilter" type="text" placeholder="Ngày khởi hành">
                                <div style="position: absolute; top: 8px; left: 25px;">
                                    <span class="i-calendar"><i class="fa fa-calendar" style="font-size: 18px"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="giatien" style="margin: 10px 0 30px 0">
                        <p style="font-weight: bold; text-transform: uppercase; margin-bottom: 10px;">Theo giá</p>
                        <div style="margin-bottom: 5px">
                            <input type="text" id="amount1" readonly="" style="border: 0; color: #ed3241; font-weight: bold; background: initial !important;">
                        </div>
                        <div id="slider-range1" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" aria-disabled="false">
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                            <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                            <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                        </div>
                    </div>
                    <div class="dodaitour" style="margin: 10px 0 30px 0">
                        <p style="font-weight: bold; text-transform: uppercase; margin-bottom: 10px;">Số ngày</p>
                        <div style="margin-bottom: 5px">
                            <input type="text" id="amount2" readonly="" style="border: 0; color: #ed3241; font-weight: bold; background: initial !important;">
                        </div>
                        <div id="slider-range2" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" aria-disabled="false">
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%; display: none;"></span>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                            <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 0%;"></div>
                            <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 30px; margin-bottom: 30px; border-bottom: 1px solid #ccc; padding-bottom: 25px">
                    <p style="font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">Thông tin vận chuyển</p>
                    <div style="height: 65px; padding: 10px;">
                        <div class="f-left" style="width: 100%">
                            <div class="f-left mg-bot10" style="width: 25px">
                                <input type="checkbox" class="tranType" value="2" data-url="tranType">
                            </div>
                            <div class="f-left" style="padding-top: 1px">
                                Máy bay
                            </div>
                        </div>
                        <div class="f-left mg-bot10" style="width: 100%">
                            <div class="f-left" style="width: 25px">
                                <input type="checkbox" class="tranType" value="1" data-url="tranType">
                            </div>
                            <div class="f-left" style="padding-top: 1px">
                                Ô tô
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 30px;">
                    <p style="font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">TÌNH TRẠNG</p>
                    <div style="height: 65px; padding: 10px;">
                        <div class="f-left mg-bot10" style="width: 100%">
                            <div class="f-left" style="width: 25px">
                                <input class="statusSeat" type="checkbox" value="1" data-url="statusSeat">
                            </div>
                            <div class="f-left" style="padding-top: 1px">
                                Còn chỗ
                            </div>
                        </div>
                        <div class="f-left mg-bot10" style="width: 100%">
                            <div class="f-left" style="width: 25px">
                                <input class="statusSeat" type="checkbox" value="0" data-url="statusSeat">
                            </div>
                            <div class="f-left" style="padding-top: 1px">
                                Hết chỗ
                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 30px; margin-bottom: 30px; padding-bottom: 25px">
                    <p style="font-weight: bold; text-transform: uppercase; margin-bottom: 20px;">Tour đã xem</p>
                    <div class="item-tourdaxem">
                        <h4 class="catchu title-tourdaxem" style="overflow-wrap: break-word;"><a href="/tourNNSGN100-079-160719XE-D-O/siem-reap-phnom-penh-khach-san-4sao,-tour-tieu-chuan.aspx" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">Siem
                                Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)</a></h4>
                        <div class="f-left mg-bot10">
                            <div class="f-left" style="width: 17px">
                                <i class="fa fa-barcode" style="color: #777"></i>
                            </div>
                            <div class="f-left" style="font-size: 13px">
                                <span>&nbsp;NNSGN100-079-160719XE-D-O</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="f-left mg-bot10">
                            <div class="f-left" style="width: 17px">
                                <i class="fa fa-calendar" style="color: #777"></i>
                            </div>
                            <div class="f-left" style="font-size: 13px">
                                Ngày đi:<span>&nbsp;16/07/2019</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="f-left mg-bot10">
                            <div class="f-left" style="width: 17px">
                                <i class="fa fa-clock-o" style="color: #777"></i>
                            </div>
                            <div class="f-left" style="font-size: 13px">
                                Số ngày:<span>&nbsp;4</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="f-left mg-bot10">
                            <div class="f-left" style="width: 17px">
                                <i class="fa fa-user" style="color: #777"></i>
                            </div>
                            <div class="f-left" style="font-size: 13px">
                                Số chỗ còn nhận:<span style="font-weight: bold; color: #ed3241;">&nbsp;4</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="mg-bot10">
                        </div>
                        <div style="padding-top: 15px; padding-bottom: 25px; padding-left:10px;padding-right:10px;" class="item-listtoursearch">
                            <div style="float: left">
                                <div class="gia-tourdaxem">5,490,000 đ</div>
                            </div>
                            <div style="float: right">
                                <a style="margin-top:-8px;" class="btn btn-xs btn-chitiet" href="/tourNNSGN100-079-160719XE-D-O/siem-reap-phnom-penh-khach-san-4sao,-tour-tieu-chuan.aspx" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">Chi
                                    tiết</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="row mg-bot30">
                    <div class="col-md-4 col-xs-12">
                        <img src="images/tour-tieu-chuan.jpg" alt="Tour tiêu chuẩn">
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="title-dongtour">
                            <h1 class="title">Tour tiêu chuẩn</h1>
                        </div>
                        <div class="mota">
                            Dòng sản phẩm thế mạnh và chủ lực của Nam Thắng. Du Khách sẽ hoàn toàn an tâm với chất lượng dịch vụ chọn lọc, những điểm đến hấp dẫn, trải nghiệm đáng nhớ. Sản phẩm được thiết kế kỹ càng để luôn tạo sự mới lạ và khác
                            biệt trên thị trường và tương xứng với giá trị mà Du Khách đã bỏ ra.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="row group-listtour">
                            <div class="col-md-1 col-xs-12 mg-bot10">
                                <div id="tagMax197" style="background: #ed3241; padding: 5px; color: white" class="">
                                    <div class="hidden-xs hidden-sm" style="text-align: center">
                                        <div style="font-size: 24px; margin-bottom: 5px; border-bottom: 1px solid #fff; padding-bottom: 3px;">
                                            16
                                        </div>
                                        <div class="f-date">07/2019</div>
                                    </div>
                                    <div class="hidden-lg hidden-md" style="text-align: left" id="tagMin197">
                                        <div style="font-size: 12px; padding-left: 15px">16/07/2019</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-11 col-xs-12">
                                <!-- item -->
                                <div class="mg-bot30 item-listtoursearch">
                                    <div class="row" style="padding: 15px;">
                                        <div class="col-xs-12 mg-bot10">
                                            <div class="tour-name">
                                                <a href="{@www}/tour" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)" style="color:#333;">
                                                    Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12 pic">
                                            <div style="position: relative;">
                                                <a href="{@www}/tour" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">
                                                    <img src="images/tf_160107_angkor-wat.jpg" class="img-responsive" alt="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-12 tour-info">
                                            <div class="row">
                                                <div class="col-xs-12 f-left">
                                                    <div class="star-rating mg-bot15 f-left" style="margin-right:15px;">
                                                        <span class="rateit" data-rateit-mode="font" data-rateit-resetable="false"> </span>
                                                        <span class="hreview-aggregate">
                                                            <span class="item">
                                                                <span class="fn">
                                                                    <span class="rating"><span class="average"><strong>4.45</strong></span><strong>/<span class="best">5 </span></strong>trong <span class="votes"><strong>387</strong></span> Đánh giá<span
                                                                            class="summary"></span></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="f-left hidden-md hidden-lg hidden-sm">
                                                    <div class="room-notable">
                                                        <div class="notable-form good">
                                                            <span class="notable-mark tieuchuan"><i class="fa fa-suitcase" aria-hidden="true"></i></span><span class="notable-text tieuchuan">Tiêu chuẩn</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="col-lg-9 col-md-8 col-sm-8 border-right">
                                                <div class="row mg-bot10">
                                                    <div class="col-lg-7 col-md-12 mg-bot10">
                                                        <i class="fa fa-barcode"></i>&nbsp;&nbsp;NNSGN100-079-160719XE-D-O
                                                    </div>
                                                    <div class="col-lg-5 col-md-12 mg-bot10">
                                                        <i class="fas fa-clock"></i>&nbsp;&nbsp;Giờ đi: 04:30
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 mg-bot10">
                                                        <i class="fa fa-calendar"></i>&nbsp;&nbsp;Số ngày: 4
                                                    </div>
                                                    <div class="col-lg-5 col-md-6 mg-bot10"><i class="fa fa-user"></i>&nbsp;&nbsp;
                                                        <span>Số chỗ còn nhận: 4</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 mg-bot10">
                                                        <span class="giamgiathanhtoan"><i class="fa fa-bell" aria-hidden="true"></i>&nbsp;&nbsp;Giảm ngay 500,000 đ khi thanh toán trực tuyến</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4">
                                                <div style="text-align: right">
                                                    <div class="price-new">
                                                        5,490,000 đ
                                                    </div>
                                                    <a class="btn btn-sm btn-chitiet" href="/tourNNSGN100-079-160719XE-D-O/siem-reap-phnom-penh-khach-san-4sao,-tour-tieu-chuan.aspx" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">CHI
                                                        TIẾT</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="frame-dinhchuan hidden-xs">
                                        <div class="corner"></div>
                                        <div class="ribbon ribbon-tc">Tiêu chuẩn</div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!-- item -->
                            </div>
                        </div>
                        <div class="row group-listtour">
                            <div class="col-md-1 col-xs-12 mg-bot10">
                                <div id="tagMax197" style="background: #ed3241; padding: 5px; color: white" class="">
                                    <div class="hidden-xs hidden-sm" style="text-align: center">
                                        <div style="font-size: 24px; margin-bottom: 5px; border-bottom: 1px solid #fff; padding-bottom: 3px;">
                                            16
                                        </div>
                                        <div class="f-date">07/2019</div>
                                    </div>
                                    <div class="hidden-lg hidden-md" style="text-align: left" id="tagMin197">
                                        <div style="font-size: 12px; padding-left: 15px">16/07/2019</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-11 col-xs-12">
                                <!-- item -->
                                <div class="mg-bot30 item-listtoursearch">
                                    <div class="row" style="padding: 15px;">
                                        <div class="col-xs-12 mg-bot10">
                                            <div class="tour-name">
                                                <a href="{@www}/tour" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)" style="color:#333;">
                                                    Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12 pic">
                                            <div style="position: relative;">
                                                <a href="{@www}/tour" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">
                                                    <img src="images/tf_160107_angkor-wat.jpg" class="img-responsive" alt="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-12 tour-info">
                                            <div class="row">
                                                <div class="col-xs-12 f-left">
                                                    <div class="star-rating mg-bot15 f-left" style="margin-right:15px;">
                                                        <span class="rateit" data-rateit-mode="font" data-rateit-resetable="false"> </span>
                                                        <span class="hreview-aggregate">
                                                            <span class="item">
                                                                <span class="fn">
                                                                    <span class="rating"><span class="average"><strong>4.45</strong></span><strong>/<span class="best">5 </span></strong>trong <span class="votes"><strong>387</strong></span> Đánh giá<span
                                                                            class="summary"></span></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="f-left hidden-md hidden-lg hidden-sm">
                                                    <div class="room-notable">
                                                        <div class="notable-form good">
                                                            <span class="notable-mark tieuchuan"><i class="fa fa-suitcase" aria-hidden="true"></i></span><span class="notable-text tieuchuan">Tiêu chuẩn</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="col-lg-9 col-md-8 col-sm-8 border-right">
                                                <div class="row mg-bot10">
                                                    <div class="col-lg-7 col-md-12 mg-bot10">
                                                        <i class="fa fa-barcode"></i>&nbsp;&nbsp;NNSGN100-079-160719XE-D-O
                                                    </div>
                                                    <div class="col-lg-5 col-md-12 mg-bot10">
                                                        <i class="fas fa-clock"></i>&nbsp;&nbsp;Giờ đi: 04:30
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 mg-bot10">
                                                        <i class="fa fa-calendar"></i>&nbsp;&nbsp;Số ngày: 4
                                                    </div>
                                                    <div class="col-lg-5 col-md-6 mg-bot10"><i class="fa fa-user"></i>&nbsp;&nbsp;
                                                        <span>Số chỗ còn nhận: 4</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 mg-bot10">
                                                        <span class="giamgiathanhtoan"><i class="fa fa-bell" aria-hidden="true"></i>&nbsp;&nbsp;Giảm ngay 500,000 đ khi thanh toán trực tuyến</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4">
                                                <div style="text-align: right">
                                                    <div class="price-new">
                                                        5,490,000 đ
                                                    </div>
                                                    <a class="btn btn-sm btn-chitiet" href="/tourNNSGN100-079-160719XE-D-O/siem-reap-phnom-penh-khach-san-4sao,-tour-tieu-chuan.aspx" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">CHI
                                                        TIẾT</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="frame-dinhchuan hidden-xs">
                                        <div class="corner"></div>
                                        <div class="ribbon ribbon-tc">Tiêu chuẩn</div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!-- item -->
                            </div>
                        </div>
                        <div class="row group-listtour">
                            <div class="col-md-1 col-xs-12 mg-bot10">
                                <div id="tagMax197" style="background: #ed3241; padding: 5px; color: white" class="">
                                    <div class="hidden-xs hidden-sm" style="text-align: center">
                                        <div style="font-size: 24px; margin-bottom: 5px; border-bottom: 1px solid #fff; padding-bottom: 3px;">
                                            16
                                        </div>
                                        <div class="f-date">07/2019</div>
                                    </div>
                                    <div class="hidden-lg hidden-md" style="text-align: left" id="tagMin197">
                                        <div style="font-size: 12px; padding-left: 15px">16/07/2019</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-11 col-xs-12">
                                <!-- item -->
                                <div class="mg-bot30 item-listtoursearch">
                                    <div class="row" style="padding: 15px;">
                                        <div class="col-xs-12 mg-bot10">
                                            <div class="tour-name">
                                                <a href="{@www}/tour" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)" style="color:#333;">
                                                    Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12 pic">
                                            <div style="position: relative;">
                                                <a href="{@www}/tour" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">
                                                    <img src="images/tf_160107_angkor-wat.jpg" class="img-responsive" alt="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-12 tour-info">
                                            <div class="row">
                                                <div class="col-xs-12 f-left">
                                                    <div class="star-rating mg-bot15 f-left" style="margin-right:15px;">
                                                        <span class="rateit" data-rateit-mode="font" data-rateit-resetable="false"> </span>
                                                        <span class="hreview-aggregate">
                                                            <span class="item">
                                                                <span class="fn">
                                                                    <span class="rating"><span class="average"><strong>4.45</strong></span><strong>/<span class="best">5 </span></strong>trong <span class="votes"><strong>387</strong></span> Đánh giá<span
                                                                            class="summary"></span></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="f-left hidden-md hidden-lg hidden-sm">
                                                    <div class="room-notable">
                                                        <div class="notable-form good">
                                                            <span class="notable-mark tieuchuan"><i class="fa fa-suitcase" aria-hidden="true"></i></span><span class="notable-text tieuchuan">Tiêu chuẩn</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="col-lg-9 col-md-8 col-sm-8 border-right">
                                                <div class="row mg-bot10">
                                                    <div class="col-lg-7 col-md-12 mg-bot10">
                                                        <i class="fa fa-barcode"></i>&nbsp;&nbsp;NNSGN100-079-160719XE-D-O
                                                    </div>
                                                    <div class="col-lg-5 col-md-12 mg-bot10">
                                                        <i class="fas fa-clock"></i>&nbsp;&nbsp;Giờ đi: 04:30
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 mg-bot10">
                                                        <i class="fa fa-calendar"></i>&nbsp;&nbsp;Số ngày: 4
                                                    </div>
                                                    <div class="col-lg-5 col-md-6 mg-bot10"><i class="fa fa-user"></i>&nbsp;&nbsp;
                                                        <span>Số chỗ còn nhận: 4</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 mg-bot10">
                                                        <span class="giamgiathanhtoan"><i class="fa fa-bell" aria-hidden="true"></i>&nbsp;&nbsp;Giảm ngay 500,000 đ khi thanh toán trực tuyến</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4">
                                                <div style="text-align: right">
                                                    <div class="price-new">
                                                        5,490,000 đ
                                                    </div>
                                                    <a class="btn btn-sm btn-chitiet" href="/tourNNSGN100-079-160719XE-D-O/siem-reap-phnom-penh-khach-san-4sao,-tour-tieu-chuan.aspx" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">CHI
                                                        TIẾT</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="frame-dinhchuan hidden-xs">
                                        <div class="corner"></div>
                                        <div class="ribbon ribbon-tc">Tiêu chuẩn</div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!-- item -->
                            </div>
                        </div>
                        <div class="row group-listtour">
                            <div class="col-md-1 col-xs-12 mg-bot10">
                                <div id="tagMax197" style="background: #ed3241; padding: 5px; color: white" class="">
                                    <div class="hidden-xs hidden-sm" style="text-align: center">
                                        <div style="font-size: 24px; margin-bottom: 5px; border-bottom: 1px solid #fff; padding-bottom: 3px;">
                                            16
                                        </div>
                                        <div class="f-date">07/2019</div>
                                    </div>
                                    <div class="hidden-lg hidden-md" style="text-align: left" id="tagMin197">
                                        <div style="font-size: 12px; padding-left: 15px">16/07/2019</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-11 col-xs-12">
                                <!-- item -->
                                <div class="mg-bot30 item-listtoursearch">
                                    <div class="row" style="padding: 15px;">
                                        <div class="col-xs-12 mg-bot10">
                                            <div class="tour-name">
                                                <a href="{@www}/tour" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)" style="color:#333;">
                                                    Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12 pic">
                                            <div style="position: relative;">
                                                <a href="{@www}/tour" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">
                                                    <img src="images/tf_160107_angkor-wat.jpg" class="img-responsive" alt="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-12 tour-info">
                                            <div class="row">
                                                <div class="col-xs-12 f-left">
                                                    <div class="star-rating mg-bot15 f-left" style="margin-right:15px;">
                                                        <span class="rateit" data-rateit-mode="font" data-rateit-resetable="false"> </span>
                                                        <span class="hreview-aggregate">
                                                            <span class="item">
                                                                <span class="fn">
                                                                    <span class="rating"><span class="average"><strong>4.45</strong></span><strong>/<span class="best">5 </span></strong>trong <span class="votes"><strong>387</strong></span> Đánh giá<span
                                                                            class="summary"></span></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="f-left hidden-md hidden-lg hidden-sm">
                                                    <div class="room-notable">
                                                        <div class="notable-form good">
                                                            <span class="notable-mark tieuchuan"><i class="fa fa-suitcase" aria-hidden="true"></i></span><span class="notable-text tieuchuan">Tiêu chuẩn</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="col-lg-9 col-md-8 col-sm-8 border-right">
                                                <div class="row mg-bot10">
                                                    <div class="col-lg-7 col-md-12 mg-bot10">
                                                        <i class="fa fa-barcode"></i>&nbsp;&nbsp;NNSGN100-079-160719XE-D-O
                                                    </div>
                                                    <div class="col-lg-5 col-md-12 mg-bot10">
                                                        <i class="fas fa-clock"></i>&nbsp;&nbsp;Giờ đi: 04:30
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 mg-bot10">
                                                        <i class="fa fa-calendar"></i>&nbsp;&nbsp;Số ngày: 4
                                                    </div>
                                                    <div class="col-lg-5 col-md-6 mg-bot10"><i class="fa fa-user"></i>&nbsp;&nbsp;
                                                        <span>Số chỗ còn nhận: 4</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 mg-bot10">
                                                        <span class="giamgiathanhtoan"><i class="fa fa-bell" aria-hidden="true"></i>&nbsp;&nbsp;Giảm ngay 500,000 đ khi thanh toán trực tuyến</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4">
                                                <div style="text-align: right">
                                                    <div class="price-new">
                                                        5,490,000 đ
                                                    </div>
                                                    <a class="btn btn-sm btn-chitiet" href="/tourNNSGN100-079-160719XE-D-O/siem-reap-phnom-penh-khach-san-4sao,-tour-tieu-chuan.aspx" title="Siem Reap - Phnom Penh (Khách sạn 4*, Tour Tiêu Chuẩn)">CHI
                                                        TIẾT</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="frame-dinhchuan hidden-xs">
                                        <div class="corner"></div>
                                        <div class="ribbon ribbon-tc">Tiêu chuẩn</div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!-- item -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-right hidden-xs">

                        <div class="pager_simple_orange">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class=""><a href="/dong-tour/tour-tieu-chuan-p1.aspx">«</a></td>
                                        <td class="active"><a href="/dong-tour/tour-tieu-chuan-p1.aspx">1</a></td>
                                        <td><a href="/dong-tour/tour-tieu-chuan-p2.aspx">2</a></td>
                                        <td class=""><a href="/dong-tour/tour-tieu-chuan-p2.aspx">»</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <div class="col-xs-12 hidden-md hidden-lg hidden-sm hidden-sm">
                        <select class="form-control" style="width:105px;float:right" id="ddlPage">
                            <option value="1" selected="selected">Trang 1</option>
                            <option value="2">Trang 2</option>
                            <option value="3">Trang 3</option>
                            <option value="4">Trang 4</option>
                            <option value="5">Trang 5</option>
                            <option value="6">Trang 6</option>
                            <option value="7">Trang 7</option>
                            <option value="8">Trang 8</option>
                            <option value="9">Trang 9</option>
                            <option value="10">Trang 10</option>
                            <option value="11">Trang 11</option>
                            <option value="12">Trang 12</option>
                            <option value="13">Trang 13</option>
                            <option value="14">Trang 14</option>
                            <option value="15">Trang 15</option>
                            <option value="16">Trang 16</option>
                            <option value="17">Trang 17</option>
                            <option value="18">Trang 18</option>
                            <option value="19">Trang 19</option>
                            <option value="20">Trang 20</option>
                            <option value="21">Trang 21</option>
                            <option value="22">Trang 22</option>
                            <option value="23">Trang 23</option>
                            <option value="24">Trang 24</option>
                            <option value="25">Trang 25</option>
                            <option value="26">Trang 26</option>
                            <option value="27">Trang 27</option>
                            <option value="28">Trang 28</option>
                            <option value="29">Trang 29</option>
                            <option value="30">Trang 30</option>
                            <option value="31">Trang 31</option>
                            <option value="32">Trang 32</option>
                            <option value="33">Trang 33</option>
                            <option value="34">Trang 34</option>
                            <option value="35">Trang 35</option>
                            <option value="36">Trang 36</option>
                            <option value="37">Trang 37</option>
                            <option value="38">Trang 38</option>
                            <option value="39">Trang 39</option>
                            <option value="40">Trang 40</option>
                            <option value="41">Trang 41</option>
                            <option value="42">Trang 42</option>
                            <option value="43">Trang 43</option>
                            <option value="44">Trang 44</option>
                            <option value="45">Trang 45</option>
                            <option value="46">Trang 46</option>
                            <option value="47">Trang 47</option>
                            <option value="48">Trang 48</option>
                            <option value="49">Trang 49</option>
                            <option value="50">Trang 50</option>
                            <option value="51">Trang 51</option>
                            <option value="52">Trang 52</option>
                            <option value="53">Trang 53</option>
                            <option value="54">Trang 54</option>
                            <option value="55">Trang 55</option>
                            <option value="56">Trang 56</option>
                            <option value="57">Trang 57</option>
                            <option value="58">Trang 58</option>
                            <option value="59">Trang 59</option>
                            <option value="60">Trang 60</option>
                            <option value="61">Trang 61</option>
                            <option value="62">Trang 62</option>
                            <option value="63">Trang 63</option>
                            <option value="64">Trang 64</option>
                            <option value="65">Trang 65</option>
                            <option value="66">Trang 66</option>
                            <option value="67">Trang 67</option>
                            <option value="68">Trang 68</option>
                            <option value="69">Trang 69</option>
                            <option value="70">Trang 70</option>
                            <option value="71">Trang 71</option>
                            <option value="72">Trang 72</option>
                            <option value="73">Trang 73</option>
                            <option value="74">Trang 74</option>
                            <option value="75">Trang 75</option>
                            <option value="76">Trang 76</option>
                            <option value="77">Trang 77</option>
                            <option value="78">Trang 78</option>
                            <option value="79">Trang 79</option>
                            <option value="80">Trang 80</option>
                            <option value="81">Trang 81</option>
                            <option value="82">Trang 82</option>
                            <option value="83">Trang 83</option>
                            <option value="84">Trang 84</option>
                            <option value="85">Trang 85</option>
                            <option value="86">Trang 86</option>
                            <option value="87">Trang 87</option>
                            <option value="88">Trang 88</option>
                            <option value="89">Trang 89</option>
                            <option value="90">Trang 90</option>
                            <option value="91">Trang 91</option>
                            <option value="92">Trang 92</option>
                            <option value="93">Trang 93</option>
                            <option value="94">Trang 94</option>
                            <option value="95">Trang 95</option>
                            <option value="96">Trang 96</option>
                            <option value="97">Trang 97</option>
                            <option value="98">Trang 98</option>
                            <option value="99">Trang 99</option>
                            <option value="100">Trang 100</option>
                            <option value="101">Trang 101</option>
                            <option value="102">Trang 102</option>
                            <option value="103">Trang 103</option>
                            <option value="104">Trang 104</option>
                            <option value="105">Trang 105</option>
                            <option value="106">Trang 106</option>
                            <option value="107">Trang 107</option>
                            <option value="108">Trang 108</option>
                            <option value="109">Trang 109</option>
                            <option value="110">Trang 110</option>
                            <option value="111">Trang 111</option>
                            <option value="112">Trang 112</option>
                            <option value="113">Trang 113</option>
                            <option value="114">Trang 114</option>
                            <option value="115">Trang 115</option>
                            <option value="116">Trang 116</option>
                            <option value="117">Trang 117</option>
                            <option value="118">Trang 118</option>
                            <option value="119">Trang 119</option>
                            <option value="120">Trang 120</option>
                            <option value="121">Trang 121</option>
                            <option value="122">Trang 122</option>
                            <option value="123">Trang 123</option>
                            <option value="124">Trang 124</option>
                            <option value="125">Trang 125</option>
                            <option value="126">Trang 126</option>
                            <option value="127">Trang 127</option>
                            <option value="128">Trang 128</option>
                            <option value="129">Trang 129</option>
                            <option value="130">Trang 130</option>
                            <option value="131">Trang 131</option>
                            <option value="132">Trang 132</option>
                            <option value="133">Trang 133</option>
                            <option value="134">Trang 134</option>
                            <option value="135">Trang 135</option>
                            <option value="136">Trang 136</option>
                            <option value="137">Trang 137</option>
                            <option value="138">Trang 138</option>
                            <option value="139">Trang 139</option>
                            <option value="140">Trang 140</option>
                            <option value="141">Trang 141</option>
                            <option value="142">Trang 142</option>
                            <option value="143">Trang 143</option>
                            <option value="144">Trang 144</option>
                            <option value="145">Trang 145</option>
                            <option value="146">Trang 146</option>
                            <option value="147">Trang 147</option>
                            <option value="148">Trang 148</option>
                            <option value="149">Trang 149</option>
                            <option value="150">Trang 150</option>
                            <option value="151">Trang 151</option>
                            <option value="152">Trang 152</option>
                            <option value="153">Trang 153</option>
                            <option value="154">Trang 154</option>
                            <option value="155">Trang 155</option>
                            <option value="156">Trang 156</option>
                            <option value="157">Trang 157</option>
                            <option value="158">Trang 158</option>
                            <option value="159">Trang 159</option>
                            <option value="160">Trang 160</option>
                            <option value="161">Trang 161</option>
                            <option value="162">Trang 162</option>
                            <option value="163">Trang 163</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

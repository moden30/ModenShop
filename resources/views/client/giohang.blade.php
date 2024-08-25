@extends('client.layout.master')
@section('conten')

    <!-- Cart Area -->
    <div class="chart-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-title">
                        <h2>Giỏ Hàng</h2>
                    </div>
                </div>
            </div>
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('errors') }}
                    <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('suagiohang') }}" method="POST">
                        @csrf
                        <div class="chart-item table-responsive fix">
                            <table class="col-md-12">
                                <thead>
                                <tr>
                                    <th class="th-delate">Thao Tác</th>
                                    <th class="th-product">Ảnh</th>
                                    <th class="th-details">Tên Sản Phẩm</th>
                                    <th class="th-price">Giá</th>
                                    <th class="th-qty">Số lượng</th>
                                    <th>Tổng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $key => $gh)
                                    <tr>
                                        <td class="th-delate">
                                            <a href="#" data-id="{{ $key }}" class="btn-delete"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                        <td class="th-product">
                                            @if(isset($gh['anh']) && !empty($gh['anh']))
                                                <a href="#">
                                                    <img src="{{ Storage::url($gh['anh']) }}" width="100px"
                                                         height="100px" alt="cart">
                                                </a>
                                                <input type="hidden" name="cart[{{ $key }}][anh]"
                                                       value="{{ $gh['anh'] }}">
                                            @else
                                                <img src="path/to/default-image.jpg" width="100px" height="100px"
                                                     alt="default image">
                                            @endif
                                        </td>
                                        <td class="th-details">
                                            <h2>
                                                @if(isset($gh['ten_san_pham']) && !empty($gh['ten_san_pham']))
                                                    <a href="{{ route('chitiet', $key) }}">{{ $gh['ten_san_pham'] }}</a>
                                                    <input type="hidden" name="cart[{{ $key }}][ten_san_pham]"
                                                           value="{{ $gh['ten_san_pham'] }}">
                                                @else
                                                    <span>Product Name Not Available</span>
                                                @endif
                                            </h2>
                                        </td>
                                        <td class="th-price" data-price="{{ $gh['gia_sp'] ?? 0 }}">
                                            {{ number_format($gh['gia_sp'] ?? 0, 0, ',', '.') }}vnđ
                                            <input type="hidden" name="cart[{{ $key }}][gia_sp]"
                                                   value="{{ $gh['gia_sp'] ?? '' }}">
                                        </td>
                                        <td class="th-qty">
                                            <input type="number" name="cart[{{ $key }}][soluong_sp]" class="input-qty"
                                                   placeholder="1"
                                                   value="{{ $gh['soluong_sp'] ?? 1 }}" min="1">
                                        </td>
                                        <td class="th-total">
                                            {{ number_format(($gh['gia_sp'] ?? 0) * ($gh['soluong_sp'] ?? 0), 0, ',', '.') }}
                                            vnđ
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- End Cart Item -->

                        <div class="shoping-cart-button">
                            <div class="cart-button-left">
                                <button type="button" class="btn custom-button">Continue Shopping</button>
                            </div>
                            <div class="cart-button-right">

                                <!-- Giỏ hàng và các phần khác của form -->
                                <button type="submit" class="btn custom-button">Cập nhật lại giỏ hàng</button>
                                <button type="button" class="btn custom-button">Clear Shopping Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="cart-shopping-area fix">
                <!-- Cart Shoping Area -->
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="calculate-shipping chart-all fix">
                            <h2>Estimate Shipping and Tax</h2>
                            <div class="cart-all-inner">
                                <p>Enter your destination to get a shipping estimate.</p>
                                <h3>Country <sup>*</sup></h3>
                                <select>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="VG">British Virgin Islands</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo - Brazzaville</option>
                                    <option value="CD">Congo - Kinshasa</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Côte d’Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard & McDonald Islands</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong SAR China</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macau SAR China</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar (Burma)</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="KP">North Korea</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestinian Territories</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn Islands</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Réunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russia</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="MF">Saint Martin</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">São Tomé and Príncipe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia & South Sandwich Islands</option>
                                    <option value="KR">South Korea</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="VC">St. Vincent & Grenadines</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option selected="selected" value="US">United States</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UM">U.S. Outlying Islands</option>
                                    <option value="VI">U.S. Virgin Islands</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VA">Vatican City</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                                <h3>State/Province</h3>
                                <select>
                                    <option value="">Please select region, state or province</option>
                                    <option value="1">Alabama</option>
                                    <option value="2">Alaska</option>
                                    <option value="3">American Samoa</option>
                                    <option value="4">Arizona</option>
                                    <option value="5">Arkansas</option>
                                    <option value="6">Armed Forces Africa</option>
                                    <option value="7">Armed Forces Americas</option>
                                    <option value="8">Armed Forces Canada</option>
                                    <option value="9">Armed Forces Europe</option>
                                    <option value="10">Armed Forces Middle East</option>
                                    <option value="11">Armed Forces Pacific</option>
                                    <option value="12">California</option>
                                    <option value="13">Colorado</option>
                                    <option value="14">Connecticut</option>
                                    <option value="15">Delaware</option>
                                    <option value="16">District of Columbia</option>
                                    <option value="17">Federated States Of Micronesia</option>
                                    <option value="18">Florida</option>
                                    <option value="19">Georgia</option>
                                    <option value="20">Guam</option>
                                    <option value="21">Hawaii</option>
                                    <option value="22">Idaho</option>
                                    <option value="23">Illinois</option>
                                    <option value="24">Indiana</option>
                                    <option value="25">Iowa</option>
                                    <option value="26">Kansas</option>
                                    <option value="27">Kentucky</option>
                                    <option value="28">Louisiana</option>
                                    <option value="29">Maine</option>
                                    <option value="30">Marshall Islands</option>
                                    <option value="31">Maryland</option>
                                    <option value="32">Massachusetts</option>
                                    <option value="33">Michigan</option>
                                    <option value="34">Minnesota</option>
                                    <option value="35">Mississippi</option>
                                    <option value="36">Missouri</option>
                                    <option value="37">Montana</option>
                                    <option value="38">Nebraska</option>
                                    <option value="39">Nevada</option>
                                    <option value="40">New Hampshire</option>
                                    <option value="41">New Jersey</option>
                                    <option value="42">New Mexico</option>
                                    <option value="43">New York</option>
                                    <option value="44">North Carolina</option>
                                    <option value="45">North Dakota</option>
                                    <option value="46">Northern Mariana Islands</option>
                                    <option value="47">Ohio</option>
                                    <option value="48">Oklahoma</option>
                                    <option value="49">Oregon</option>
                                    <option value="50">Palau</option>
                                    <option value="51">Pennsylvania</option>
                                    <option value="52">Puerto Rico</option>
                                    <option value="53">Rhode Island</option>
                                    <option value="54">South Carolina</option>
                                    <option value="55">South Dakota</option>
                                    <option value="56">Tennessee</option>
                                    <option value="57">Texas</option>
                                    <option value="58">Utah</option>
                                    <option value="59">Vermont</option>
                                    <option value="60">Virgin Islands</option>
                                    <option value="61">Virginia</option>
                                    <option value="62">Washington</option>
                                    <option value="63">West Virginia</option>
                                    <option value="64">Wisconsin</option>
                                    <option value="65">Wyoming</option>
                                </select>
                                <h3>Zip/Postal Code</h3>
                                <input type="text">
                                <div class="shiping-cart-button">
                                    <button type="button" class="btn custom-button">Get A Quote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="chart-all fix">
                            <h2>Nhập mã giảm giá</h2>
                            <div class="cart-all-inner">
                                <p>Nhập mã của bạn vào đây</p>
                                <input type="text">
                                <div class="shiping-cart-button">
                                    <button class="btn custom-button" type="button">Áp mã</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="shopping-summary chart-all fix">
                            <div class="shopping-cost-area">
                                <div class="shopping-cost">
                                    <div class="shopping-cost-right">
                                        <p class="sub-total">{{ number_format($subTotal, 0, '', '.') }}vnđ</p>
                                        <p class="shipping">{{ number_format($shipping, 0, '', '.') }}vnđ</p>
                                        <p class="total-amount">{{ number_format($total, 0, '', '.') }}vnđ</p>
                                    </div>
                                    <div class="shopping-cost">
                                        <div class="shopping-cost-left">
                                            <p class="cost-subtotal">Tổng</p>
                                            <p class="cost-ship">Ship</p>
                                            <p class="cost-total">Tổng Cộng</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="shiping-cart-button">
                                    <a href="{{ route('create') }}">
                                        <button type="submit" class="btn custom-button">Thanh Toán</button>
                                    </a>

                                </div>
                                <a href="#">Checkout with Multiple Addresses</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Cart Shoping Area -->
            </div>
        </div>
    </div><!-- End Cart Area -->
    <style>
        .input-qty {
            width: 100px; /* Điều chỉnh chiều rộng nếu cần */
            height: 30px;
            text-align: center;
            border: 1px solid #ccc;
            -moz-appearance: textfield; /* Firefox */
            -webkit-appearance: none; /* Chrome, Safari */
        }

        .input-qty::-webkit-inner-spin-button,
        .input-qty::-webkit-outer-spin-button {
            -webkit-appearance: auto; /* Hiển thị mũi tên cho Chrome, Safari */
            margin: 0;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function () {
            // Xử lý xóa sản phẩm
            $('.btn-delete').on('click', function (event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

                if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
                    $(this).closest('tr').remove(); // Xóa hàng hiện tại
                    updateTotal(); // Cập nhật tổng giá giỏ hàng sau khi xóa sản phẩm
                }
            });

            // Xử lý thay đổi số lượng sản phẩm
            $('.input-qty').on('input', function () {
                let quantity = parseInt(this.value);
                if (isNaN(quantity) || quantity < 1) {
                    alert("Số lượng sản phẩm phải lớn hơn hoặc bằng 1");
                    this.value = 1;
                    quantity = 1;
                }

                const row = $(this).closest('tr');
                const price = parseFloat(row.find('.th-price').attr('data-price'));
                const totalCell = row.find('.th-total');

                const totalPrice = quantity * price;
                totalCell.text(`${totalPrice.toLocaleString('vi-VN')}vnđ`);

                updateTotal(); // Cập nhật tổng giá giỏ hàng sau khi thay đổi số lượng
            });

            // Cập nhật tổng giá giỏ hàng
            function updateTotal() {
                let subTotal = 0;
                // Tính tổng tiền
                $(".input-qty").each(function () {
                    const quantity = parseInt($(this).val());
                    const price = parseFloat($(this).closest('tr').find('.th-price').attr('data-price'));
                    subTotal += quantity * price;
                });

                // Cập nhật subtotal
                $('.sub-total').text(`${subTotal.toLocaleString('vi-VN')}vnđ`);

                // Cập nhật giá vận chuyển
                const shipping = parseFloat($('.shipping').text().replace(/\D/g, '')) || 0;

                // Cập nhật tổng cộng
                const totalAmount = subTotal + shipping;
                $('.total-amount').text(`${totalAmount.toLocaleString('vi-VN')}vnđ`);
            }

            updateTotal();
        });



        {{--$(document).ready(function () {--}}
        {{--    // Xử lý thay đổi số lượng sản phẩm--}}
        {{--    $('.input-qty').on('input', function () {--}}
        {{--        let quantity = parseInt(this.value);--}}
        {{--        if (isNaN(quantity) || quantity < 1) {--}}
        {{--            alert("Số lượng sản phẩm phải lớn hơn hoặc bằng 1");--}}
        {{--            this.value = 1;--}}
        {{--            quantity = 1;--}}
        {{--        }--}}

        {{--        const row = $(this).closest('tr');--}}
        {{--        const price = parseFloat(row.find('.th-price').attr('data-price'));--}}
        {{--        const totalCell = row.find('.th-total');--}}

        {{--        const totalPrice = quantity * price;--}}
        {{--        totalCell.text(`${totalPrice.toLocaleString('vi-VN')}vnđ`);--}}

        {{--        updateTotal(); // Cập nhật tổng giá giỏ hàng sau khi thay đổi số lượng--}}
        {{--    });--}}

        {{--    // Xử lý xóa sản phẩm--}}
        {{--    $('.btn-delete').on('click', function (event) {--}}
        {{--        event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết--}}

        {{--        if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {--}}
        {{--            $(this).closest('tr').remove(); // Xóa hàng hiện tại--}}
        {{--            updateTotal(); // Cập nhật tổng giá giỏ hàng sau khi xóa sản phẩm--}}
        {{--        }--}}
        {{--    });--}}

        {{--    // Xử lý nhấn nút cập nhật giỏ hàng--}}
        {{--    $('.btn.custom-button:contains("Cập nhật lại giỏ hàng")').on('click', function () {--}}
        {{--        const cart = [];--}}

        {{--        // Thu thập dữ liệu giỏ hàng--}}
        {{--        $('.chart-item tbody tr').each(function () {--}}
        {{--            const id = $(this).find('.btn-delete').data('id');--}}
        {{--            const quantity = parseInt($(this).find('.input-qty').val());--}}

        {{--            if (id && quantity >= 1) {--}}
        {{--                cart.push({--}}
        {{--                    id: id,--}}
        {{--                    soluong_sp: quantity--}}
        {{--                });--}}
        {{--            }--}}
        {{--        });--}}

        {{--        // Gửi dữ liệu giỏ hàng đã cập nhật đến máy chủ--}}
        {{--        $.ajax({--}}
        {{--            url: '{{ route('suagiohang') }}',--}}
        {{--            method: 'POST',--}}
        {{--            data: {--}}
        {{--                _token: '{{ csrf_token() }}',--}}
        {{--                cart: cart--}}
        {{--            },--}}
        {{--            success: function (response) {--}}
        {{--                alert(response.success);--}}
        {{--                location.reload(); // Tải lại trang để phản ánh thay đổi--}}
        {{--            },--}}
        {{--            error: function (xhr) {--}}
        {{--                // Log chi tiết lỗi trong console--}}
        {{--                console.log('Error:', xhr.responseText);--}}
        {{--                alert('Có lỗi xảy ra: ' + xhr.responseText);--}}
        {{--            }--}}
        {{--        });--}}
        {{--    });--}}

        {{--    // Cập nhật tổng giá giỏ hàng--}}
        {{--    function updateTotal() {--}}
        {{--        let subTotal = 0;--}}
        {{--        // Tính tổng tiền--}}
        {{--        $(".input-qty").each(function () {--}}
        {{--            const quantity = parseInt($(this).val());--}}
        {{--            const price = parseFloat($(this).closest('tr').find('.th-price').attr('data-price'));--}}
        {{--            subTotal += quantity * price;--}}
        {{--        });--}}

        {{--        // Cập nhật subtotal--}}
        {{--        $('.sub-total').text(`${subTotal.toLocaleString('vi-VN')}vnđ`);--}}

        {{--        // Cập nhật giá vận chuyển--}}
        {{--        const shipping = parseFloat($('.shipping').text().replace(/\D/g, '')) || 0;--}}

        {{--        // Cập nhật tổng cộng--}}
        {{--        const totalAmount = subTotal + shipping;--}}
        {{--        $('.total-amount').text(`${totalAmount.toLocaleString('vi-VN')}vnđ`);--}}
        {{--    }--}}

        {{--    updateTotal();--}}
        {{--});--}}


    </script>

@endsection

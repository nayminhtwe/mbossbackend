@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')
@section('title', __('Seller Business Info Register'))
@section('content')
<x-forms.post :action="route('admin.business-info.store')" method="POST" name=confirm-item>
    <x-backend.card>
        <x-slot name="header">
                @lang('Seller Business Info Register for ') <mark><strong>{{$app_user->firstName. ' ' . $app_user->lastName}}</strong></mark>
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.personal-info.app_user')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">

                <div class="card">
                    <strong>
                        <div class="card-header text-center h2">
                            Step 2: Business Information
                        </div>
                        <div class="col-12 text-warning">* refers to required information</div>
                    </strong>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <h4>I: Business Information</h4>
                                <input type="hidden" id="app_user_id" name="app_user_id" value="{{$app_user->id}}" />
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_name">1. Business Name * :</label>
                                    <input type="text" name="business_name" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_email">2. Business Email * :</label>
                                    <input type="email" name="business_email" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="registration_number">3. Registration Number * :</label>
                                    <input type="text" name="registration_number" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="registration_date">4. Registration Date * :</label>
                                    <input type="date" name="registration_date" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="entity_type">5. Entity Type * :</label>
                                    <input type="text" name="entity_type" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="industry">6. Industry * :</label>
                                    <input type="text" name="industry" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>II: Additional Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number_of_employees">1. Number of Employees * :</label>
                                    <input type="text" name="number_of_employees" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="revenue_model">2. Revenue Model:</label>
                                    <input type="text" name="revenue_model" class="form-control" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clients">3. Clients:</label>
                                    <input type="text" name="clients" class="form-control" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ownership">4. Ownership:</label>
                                    <input type="text" name="ownership" class="form-control" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_or_service">5. Product/Service * :</label>
                                    <input type="text" name="product_or_service" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="net_worth_per_annum">6. Net Worth per annum * :</label>
                                    <input type="text" name="net_worth_per_annum" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>III: Business Contact Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_landline">1. Landline 1:</label>
                                    <input type="text" name="business_landline" class="form-control" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_mobile">2. Mobile 1 * :</label>
                                    <input type="text" name="business_mobile" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>IV: Business Address 1</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_address_line_one">1. Address Line 1 * :</label>
                                    <input type="longtext" name="business_address_line_one" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_address_line_two">2. Address Line 2:</label>
                                    <input type="longtext" name="business_address_line_two" class="form-control" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_country">3. Country * :</label>
                                    {{-- <input type="text" name="business_country" class="form-control" value="{{ old('business_country') }}" maxlength="100" required /> --}}
                                    <select id="business_country" name="business_country" class="form-control" required>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Åland Islands">Åland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_township">4. Township * :</label>
                                    <input type="text" name="business_township" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_state_or_division">5. State/Division * :</label>
                                    <input type="text" name="business_state_or_division" class="form-control" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_zip_code">6. Zip Code:</label>
                                    <input type="text" name="business_zip_code" class="form-control" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="effective_date">7. Effective Date:</label>
                                    <input type="text" name="effective_date" class="form-control" maxlength="100" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <strong><div class="card-header h3">I: References (To input all BOD information or minimum 75% of BOD List)</div></strong>

                    <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4>Reference 1</h4>
                                    <div class="form-group">
                                        <label for="reference_one_full_name">1. Full Name * :</label>
                                        <input type="text" name="reference_one_full_name" class="form-control" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_father_name">2. Father's Name * :</label>
                                        <input type="text" name="reference_one_father_name" class="form-control" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_nrc">3. NRC Number * :</label>
                                        <input type="text" name="reference_one_nrc" class="form-control" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_address">4. Address * :</label>
                                        <input type="text" name="reference_one_address" class="form-control" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_mobile">5. Mobile Number * :</label>
                                        <input type="text" name="reference_one_mobile" class="form-control" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_position">6. Position * :</label>
                                        <input type="text" name="reference_one_position" class="form-control" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_email">7. Email * :</label>
                                        <input type="email" name="reference_one_email" class="form-control" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <h4>Reference 2</h4>
                                    <div class="form-group">
                                        <label for="reference_two_full_name">1. Full Name :</label>
                                        <input type="text" name="reference_two_full_name" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_father_name">2. Father's Name :</label>
                                        <input type="text" name="reference_two_father_name" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_nrc">3. NRC Number :</label>
                                        <input type="text" name="reference_two_nrc" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_address">4. Address :</label>
                                        <input type="text" name="reference_two_address" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_mobile">5. Mobile Number :</label>
                                        <input type="text" name="reference_two_mobile" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_position">6. Position :</label>
                                        <input type="text" name="reference_two_position" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_email">7. Email :</label>
                                        <input type="email" name="reference_two_email" class="form-control" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col">
                                    <h4>Reference 3</h4>
                                    <div class="form-group">
                                        <label for="reference_three_full_name">1. Full Name :</label>
                                        <input type="text" name="reference_three_full_name" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_father_name">2. Father's Name :</label>
                                        <input type="text" name="reference_three_father_name" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_nrc">3. NRC Number :</label>
                                        <input type="text" name="reference_three_nrc" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_address">4. Address :</label>
                                        <input type="text" name="reference_three_address" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_mobile">5. Mobile Number :</label>
                                        <input type="text" name="reference_three_mobile" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_position">6. Position :</label>
                                        <input type="text" name="reference_three_position" class="form-control" maxlength="100" />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_email">7. Email :</label>
                                        <input type="email" name="reference_three_email" class="form-control" maxlength="100" />
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            {{-- <div class="row">
                <div class="col-md-6 text-left">
                    <a href="{{ route('admin.kyc.create_step_one') }}" class="btn btn-danger pull-right">Previous</a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div> --}}
            <button class="btn btn-primary float-right" type="submit">@lang('Create')</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection
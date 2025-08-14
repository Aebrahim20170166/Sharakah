@extends('layouts.dashboard-app')

@section('title', 'اضافة مستخدم')

@section('content')
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Add New User</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <div class="profile-img-edit position-relative">
                                            <img src="../../assets/images/avatars/01.png" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100">
                                            <img src="../../assets/images/avatars/avtar_1.png" alt="profile-pic" class="theme-color-purple-img profile-pic rounded avatar-100">
                                            <img src="../../assets/images/avatars/avtar_2.png" alt="profile-pic" class="theme-color-blue-img profile-pic rounded avatar-100">
                                            <img src="../../assets/images/avatars/avtar_4.png" alt="profile-pic" class="theme-color-green-img profile-pic rounded avatar-100">
                                            <img src="../../assets/images/avatars/avtar_5.png" alt="profile-pic" class="theme-color-yellow-img profile-pic rounded avatar-100">
                                            <img src="../../assets/images/avatars/avtar_3.png" alt="profile-pic" class="theme-color-pink-img profile-pic rounded avatar-100">
                                            <div class="upload-icone bg-primary">
                                                <svg class="upload-button" width="14" height="14" viewBox="0 0 24 24">
                                                    <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                </svg>
                                                <input class="file-upload" type="file" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="img-extension mt-3">
                                            <div class="d-inline-block align-items-center">
                                                <span>Only</span>
                                                <a href="javascript:void();">.jpg</a>
                                                <a href="javascript:void();">.png</a>
                                                <a href="javascript:void();">.jpeg</a>
                                                <span>allowed</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">User Role:</label>
                                        <select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>Select</option>
                                            <option>Web Designer</option>
                                            <option>Web Developer</option>
                                            <option>Tester</option>
                                            <option>Php Developer</option>
                                            <option>Ios Developer </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="furl">Facebook Url:</label>
                                        <input type="text" class="form-control" id="furl" placeholder="Facebook Url">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="turl">Twitter Url:</label>
                                        <input type="text" class="form-control" id="turl" placeholder="Twitter Url">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="instaurl">Instagram Url:</label>
                                        <input type="text" class="form-control" id="instaurl" placeholder="Instagram Url">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="form-label" for="lurl">Linkedin Url:</label>
                                        <input type="text" class="form-control" id="lurl" placeholder="Linkedin Url">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">New User Information</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="new-user-info">
                                    <form>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="fname">First Name:</label>
                                                <input type="text" class="form-control" id="fname" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="lname">Last Name:</label>
                                                <input type="text" class="form-control" id="lname" placeholder="Last Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="add1">Street Address 1:</label>
                                                <input type="text" class="form-control" id="add1" placeholder="Street Address 1">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="add2">Street Address 2:</label>
                                                <input type="text" class="form-control" id="add2" placeholder="Street Address 2">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="cname">Company Name:</label>
                                                <input type="text" class="form-control" id="cname" placeholder="Company Name">
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="form-label">Country:</label>
                                                <select name="type" class="selectpicker form-control" data-style="py-0">
                                                    <option>Select Country</option>
                                                    <option>Caneda</option>
                                                    <option>Noida</option>
                                                    <option>USA</option>
                                                    <option>India</option>
                                                    <option>Africa</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="mobno">Mobile Number:</label>
                                                <input type="text" class="form-control" id="mobno" placeholder="Mobile Number">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="altconno">Alternate Contact:</label>
                                                <input type="text" class="form-control" id="altconno" placeholder="Alternate Contact">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="pno">Pin Code:</label>
                                                <input type="text" class="form-control" id="pno" placeholder="Pin Code">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="city">Town/City:</label>
                                                <input type="text" class="form-control" id="city" placeholder="Town/City">
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="mb-3">Security</h5>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="uname">User Name:</label>
                                                <input type="text" class="form-control" id="uname" placeholder="User Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="pass">Password:</label>
                                                <input type="password" class="form-control" id="pass" placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="rpass">Repeat Password:</label>
                                                <input type="password" class="form-control" id="rpass" placeholder="Repeat Password ">
                                            </div>
                                        </div>
                                        <div class="checkbox">
                                            <label class="form-label"><input class="form-check-input me-2" type="checkbox" value="" id="flexCheckChecked">Enable Two-Factor-Authentication</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add New User</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-download">
            <a class="btn btn-danger px-3 py-2" href="https://iqonic.design/product/admin-templates/hope-ui-admin-free-open-source-bootstrap-admin-template/" target="_blank">
                <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M5.91064 20.5886C5.91064 19.7486 6.59064 19.0686 7.43064 19.0686C8.26064 19.0686 8.94064 19.7486 8.94064 20.5886C8.94064 21.4186 8.26064 22.0986 7.43064 22.0986C6.59064 22.0986 5.91064 21.4186 5.91064 20.5886ZM17.1606 20.5886C17.1606 19.7486 17.8406 19.0686 18.6806 19.0686C19.5106 19.0686 20.1906 19.7486 20.1906 20.5886C20.1906 21.4186 19.5106 22.0986 18.6806 22.0986C17.8406 22.0986 17.1606 21.4186 17.1606 20.5886Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1907 6.34909C20.8007 6.34909 21.2007 6.55909 21.6007 7.01909C22.0007 7.47909 22.0707 8.13909 21.9807 8.73809L21.0307 15.2981C20.8507 16.5591 19.7707 17.4881 18.5007 17.4881H7.59074C6.26074 17.4881 5.16074 16.4681 5.05074 15.1491L4.13074 4.24809L2.62074 3.98809C2.22074 3.91809 1.94074 3.52809 2.01074 3.12809C2.08074 2.71809 2.47074 2.44809 2.88074 2.50809L5.26574 2.86809C5.60574 2.92909 5.85574 3.20809 5.88574 3.54809L6.07574 5.78809C6.10574 6.10909 6.36574 6.34909 6.68574 6.34909H20.1907ZM14.1307 11.5481H16.9007C17.3207 11.5481 17.6507 11.2081 17.6507 10.7981C17.6507 10.3781 17.3207 10.0481 16.9007 10.0481H14.1307C13.7107 10.0481 13.3807 10.3781 13.3807 10.7981C13.3807 11.2081 13.7107 11.5481 14.1307 11.5481Z" fill="currentColor"></path>
                </svg>
            </a>
        </div>
@endsection
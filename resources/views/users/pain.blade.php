

@include('users.master')

  <body class="body-background">
    <!-- HEADER SECTION BEGIN -->
    <input type="hidden" id="selected_language" value="<?php echo $selected_language->language ?>" />

    <!-- HEADER SECTION END -->
    <!-- BODY SECTION BEGIN -->
    <section class="body-sec">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-sm-12 col-12">
            <div class="your-pain">
              <h2 class="your-pain-heading">{{trans(''.$selected_language->language.'.statements.pain_located')}}</h2>
              <p class="your-pain-text">{{trans(''.$selected_language->language.'.statements.indicate_location')}}</p>
            </div>

          <form class="form">
              @csrf
            <div id="main">
              <div class="accordion" id="faq">
                <div class="card faq-1">
                  <div class="card-header" id="faqhead1">
                    <a href="#" class="btn btn-header-link link-1" data-toggle="collapse" data-target="#faq1"
                      aria-expanded="true" aria-controls="faq1"><span class="no-item-green">1</span>Neurological, Arthritic & Muscle Pain</a>
                  </div>
                  <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                    <div class="card-body">
                        <div class="body-form-box">
                                <div class="body-flex-content">
                                        <div class="body-flex-inner">
                                            <label class="categort-label-text">{{trans(''.$selected_language->language.'.other_words.category')}}</label>

                                            <select class="category-select-text parent-category" name="pain" >
                                                <option value="0">Select  Pain</option>
                                                @foreach ($categories as $category )

                                                <option value="{{$category->id}}">{{$category->$language}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @if(!($selected_language->language=="english"))
                                    <div class="body-flex-inner">
                                        <label class="categort-label-text">Category </label>
                                        <p class="category-select-text extra-padding" id="category-translate"> &nbsp;</p>
                                    </div>
                                    @endif
                                </div>
                                <div class="body-flex-content">
                                    <div class="body-flex-inner">
                                        <label class="categort-label-text">{{trans(''.$selected_language->language.'.other_words.pain_type')}}</label>
                                        <select class="category-select-text child-category" id="pain-types" name="pain-types">
                                        <option value="0">Select pain type</option>
                                        </select>
                                    </div>
                                    @if(!($selected_language->language=="english"))
                                    <div class="body-flex-inner">
                                        <label class="categort-label-text">Pain Type </label>
                                        <p class="category-select-text extra-padding" id="pain-type-translate"> &nbsp;</p>
                                    </div>
                                    @endif
                                </div>
                                <div class="pagination-box">
                                <h4 class="pagination-heading">{{trans(''.$selected_language->language.'.other_words.select_pain_severity')}}</h4>
                                <div class="pagination-text">
                                    @if(!($selected_language->language=="english"))
                                        <h6 class="pagination-inner-heading">{{trans(''.$selected_language->language.'.other_words.language')}}</h6>
                                        <p class="pagination-inner-text" id="severity-other"></p>
                                    @endif
                                    <h6 class="pagination-inner-heading">English</h6>
                                    <p class="pagination-inner-text" id="severity-english"></p>
                                    <div class="line-break"></div>

                                    <div class="pagination-icons">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                        <li class="page-item"><a class="page-link page-btn" href="#"  id="decrement"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                        <li class="page-item"><a class="page-link page-link-color" href="javascriptvoid:(0)" id="page-number"></a></li>
                                        <li class="page-item"><a class="page-link page-btn" href="#"  id="increment"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </nav>
                                    </div>
                                </div>
                                </div>
                                <a href="" class="pdf-buttn" id="save">{{trans(''.$selected_language->language.'.buttons.save')}}</a>
                        </div>


                  </div>
                    </div>

                </div>
                <div class="card faq-2">
                  <div class="card-header" id="faqhead2">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                      aria-expanded="true" aria-controls="faq2"><span class="no-item-red">2</span>Neurological, Arthritic & Muscle Pain</a>
                  </div>
                  <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                    <div class="card-body">
                      <div class="body-form-box">
                        <div class="body-flex-content">
                          <div class="body-flex-inner">
                            <label class="categort-label-text">Category English</label>
                            <select class="category-select-text">
                              <option>Select  Pain</option>
                              <option>Neurological, Arthritic &amp; Muscle Pain</option>
                              <option>Neurological &amp; Arthritic Pain</option>
                              <option>Muscle &amp; Arthritic Pain</option>
                              <option>Arthritic Pain </option>
                            </select>
                          </div>
                          <div class="body-flex-inner">
                            <label class="categort-label-text">Category Korean</label>
                            <p> &nbsp;</p>
                            <p> &nbsp;</p>
                          </div>
                        </div>
                        <div class="body-flex-content">
                          <div class="body-flex-inner">
                            <label class="categort-label-text">Pain Type</label>
                            <select class="category-select-text">
                              <option>Select pain type</option>

                            </select>
                          </div>
                          <div class="body-flex-inner">
                            <label class="categort-label-text">Pain Type (Korean)</label>
                            <p> &nbsp;</p>
                            <p> &nbsp;</p>
                          </div>
                        </div>
                        <div class="pagination-box">
                          <h4 class="pagination-heading">Pain Severity</h4>
                          <div class="pagination-text">
                            <h6 class="pagination-inner-heading">English</h6>
                            <p class="pagination-inner-text">Faint Pain/very minor annoyance—occasional minor twinges</p>
                            <div class="line-break"></div>
                            <h6 class="pagination-inner-heading">Korean</h6>
                            <p class="pagination-inner-text">아주 적은 통증/ 사소한 신경쓰임</p>
                            <div class="pagination-icons">
                              <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                  <li class="page-item"><a class="page-link" href="javascriptvoid:(0)"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                  <li class="page-item"><a class="page-link page-link-color" href="javascriptvoid:(0)">1</a></li>
                                  <li class="page-item"><a class="page-link" href="javascriptvoid:(0)"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                </ul>
                              </nav>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card faq-3">
                  <div class="card-header" id="faqhead3">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                      aria-expanded="true" aria-controls="faq3"><span class="no-item-blue">3</span>Neurological, Arthritic & Muscle Pain</a>
                  </div>
                  <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                    <div class="card-body">
                      <div class="body-form-box">
                        <div class="body-flex-content">
                          <div class="body-flex-inner">
                            <label class="categort-label-text">Category English</label>
                            <select class="category-select-text">
                              <option>Select  Pain</option>
                              <option>Neurological, Arthritic &amp; Muscle Pain</option>
                              <option>Neurological &amp; Arthritic Pain</option>
                              <option>Muscle &amp; Arthritic Pain</option>
                              <option>Arthritic Pain </option>
                            </select>
                          </div>
                          <div class="body-flex-inner">
                            <label class="categort-label-text">Category Korean</label>
                            <p> &nbsp;</p>
                            <p> &nbsp;</p>
                          </div>
                        </div>
                        <div class="body-flex-content">
                          <div class="body-flex-inner">
                            <label class="categort-label-text">Pain Type (English)</label>
                            <select class="category-select-text">
                              <option>Select pain type</option>
                              <option>Select pain type</option>
                              <option>Select pain type</option>
                            </select>
                          </div>
                          <div class="body-flex-inner">
                            <label class="categort-label-text">Pain Type (Korean)</label>
                            <p> &nbsp;</p>
                            <p> &nbsp;</p>
                          </div>
                        </div>
                        <div class="pagination-box">
                          <h4 class="pagination-heading">Pain Severity</h4>
                          <div class="pagination-text">
                            <h6 class="pagination-inner-heading">English</h6>
                            <p class="pagination-inner-text">Faint Pain/very minor annoyance—occasional minor twinges</p>
                            <div class="line-break"></div>
                            <h6 class="pagination-inner-heading">Korean</h6>
                            <p class="pagination-inner-text">아주 적은 통증/ 사소한 신경쓰임</p>
                            <div class="pagination-icons">
                              <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                  <li class="page-item"><a class="page-link" href="javascriptvoid:(0)"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                  <li class="page-item"><a class="page-link page-link-color" href="javascriptvoid:(0)">1</a></li>
                                  <li class="page-item"><a class="page-link" href="javascriptvoid:(0)"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                </ul>
                              </nav>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </form>
          <div class="download-pdf">
            <a href="javascriptvoid:(0)" class="selet-pain-buttn" id="select-another" data-attr="0">{{trans(''.$selected_language->language.'.buttons.select_another')}}</a>
            <a href="javascriptvoid:(0)" class="pdf-buttn" id="pdf-buttn" data-attr="0"><img src="images/pdf.png" alt="image" class="img-fluid img-space">{{trans(''.$selected_language->language.'.buttons.download_pdf')}} <i class="fa fa-arrow-right pdf-right" aria-hidden="true"></i></a>

          </div>

      </div>
          <div class="col-md-6 col-sm-12 col-12">
            <div id="selectedMaleParts"></div>
            <div class="flip-card-3D-wrapper">
              <div id="flip-card">
                <div class="flip-card-front">
                  <p>
                  <div class="man-front-avatar" id="man-front">
                    <svg id="avatar-body" xmlns="http://www.w3.org/2000/svg" width="248.168" height="767.779" viewBox="0 0 248.168 767.779">
                      <path id="Path_7656" data-name="Path 7656" d="M244.875,244.231c-3.326-18.1-3.2-36.824-4.678-55.251-.436-5.49-.5-11.056-1.549-16.426-3.64-18.382-14.125-30.626-32.792-35.094-12.425-2.978-24.745-6.634-37.307-8.77-19.975-3.385-23.481-23.962-14.259-41.382a168.991,168.991,0,0,0,11.778-27.8c1.79-5.611,1.655-12.29-6.363-15,1.354-13.643-1.459-25.422-11.176-34.387C141.248,3.418,133.035-.3,124.084.018c-8.95-.316-17.163,3.4-24.444,10.108C89.923,19.092,87.11,30.87,88.464,44.514c-8.018,2.708-8.153,9.386-6.363,15a168.99,168.99,0,0,0,11.778,27.8c9.221,17.419,5.716,38-14.26,41.382-12.56,2.136-24.88,5.791-37.305,8.77-18.669,4.468-29.152,16.712-32.794,35.094-1.051,5.37-1.112,10.936-1.549,16.426C6.5,207.407,6.619,226.135,3.293,244.231c-5.6,30.355-4.271,59.718,5.6,88.9,5.445,16.14,9.866,32.642,15.6,48.677,3.851,10.755,4.814,21,2.226,32.281-4.107,17.976.6,33.68,15.208,45.909a11.379,11.379,0,0,1,3.475,6.965c2.181,20.157,8.123,39.11,16.351,57.6,2.963,6.634,4.934,14.441,4.678,21.6-.542,15.719-2.948,31.348-4.317,47.037-2.241,25.858,5.776,50.106,12.365,74.5,5.16,19.164,10.274,38.238,8.83,58.424C82.688,734.7,79.679,741.17,72.1,746.1c-4.588,2.963-8.514,7.732-11.267,12.53-2.918,5.084-.271,8.83,5.746,8.95,11.989.256,24.008.286,36.011-.075,7.672-.241,10.981-4.137,10.6-11.583-.707-13.734-.827-27.543-2.587-41.141-2.617-20.217-.09-39.983,2.873-59.823,3.776-25.166,5.731-49.941-2.858-74.986-5.46-15.9-5.46-32.988-1.369-49.73,1.9-7.777,4.016-15.659,4.513-23.586,1.925-29.994,3.219-60.019,4.723-90.029.165-3.6,0-8,5.114-6.9a1.73,1.73,0,0,1,.481.181,1.73,1.73,0,0,1,.481-.181c5.114-1.1,4.949,3.309,5.114,6.9,1.5,30.01,2.8,60.034,4.723,90.029.5,7.927,2.617,15.81,4.513,23.586,4.092,16.742,4.092,33.83-1.369,49.73-8.589,25.045-6.634,49.82-2.858,74.986,2.963,19.841,5.49,39.607,2.873,59.823-1.76,13.6-1.88,27.407-2.587,41.141-.376,7.446,2.933,11.342,10.6,11.583,12,.361,24.023.331,36.011.075,6.017-.12,8.664-3.866,5.746-8.95-2.753-4.8-6.679-9.567-11.268-12.53-7.58-4.934-10.588-11.4-11.205-19.976-1.444-20.187,3.67-39.26,8.83-58.424,6.589-24.4,14.606-48.647,12.363-74.5-1.367-15.689-3.774-31.318-4.316-47.037-.256-7.16,1.715-14.967,4.678-21.6,8.228-18.487,14.17-37.44,16.35-57.6A11.394,11.394,0,0,1,206.244,460c14.608-12.229,19.316-27.934,15.208-45.909-2.586-11.282-1.623-21.526,2.228-32.281,5.731-16.035,10.154-32.537,15.6-48.677,9.868-29.182,11.191-58.545,5.6-88.9M159.7,51.192l2.873.226q-.429,6.137-.872,12.275l-2.843-.406q.406-6.047.842-12.094m-73.241,12.5q-.451-6.137-.872-12.275l2.873-.226q.429,6.047.842,12.094l-2.843.406m6.152-11.808c0-5.506-.09-11.011.015-16.5C92.947,18.1,106,4.787,122.851,4.456a11.249,11.249,0,0,1,1.233.015,11.249,11.249,0,0,1,1.233-.015c16.847.331,29.9,13.643,30.22,30.927.105,5.49.015,11,.015,16.5,3.084,19.45-2.347,35.274-18.622,47.383-4.663,3.475-8.77,5.415-12.846,5.43-4.076-.015-8.183-1.955-12.846-5.43C94.962,87.159,89.532,71.334,92.616,51.884m31.469,95.684c-11.447-7.942-23.571-36.4-21.029-50.542,6.919,7.672,13.9,11.658,21.029,11.447,7.13.211,14.11-3.776,21.029-11.447,2.542,14.14-9.582,42.6-21.029,50.542M55.536,241.523c1.655,15.794,3.746,31.559,4.844,47.383.993,14.471.662,28.776-5.746,42.585-3.5,7.581-4.468,16.351-7.085,24.564-1.7-38.193-10.891-76.716,7.987-114.532m50.527,521.684c-2.948.181-5.882.376-8.83.557-.331-.572-.647-1.143-.978-1.7,1.474-1.549,2.8-4.152,4.422-4.347,1.956-.256,4.167,1.549,6.258,2.467-.286,1.008-.572,2.016-.872,3.023m44.871.557c-2.948-.18-5.882-.376-8.83-.557-.3-1.008-.587-2.016-.872-3.023,2.091-.918,4.3-2.723,6.256-2.467,1.626.2,2.95,2.8,4.424,4.347-.331.557-.647,1.128-.978,1.7M200.62,356.056c-2.617-8.213-3.58-16.983-7.085-24.564-6.408-13.809-6.739-28.114-5.746-42.585,1.1-15.825,3.189-31.589,4.844-47.383,18.877,37.816,9.687,76.34,7.987,114.532m36.192-28.189c-6.047,18.051-10.981,36.493-17.254,54.468-3.685,10.575-4.71,20.713-2.106,31.649a51.406,51.406,0,0,1,.752,17.885c-1.1,8.98-4.663,17.058-13.147,23.18-.5-2.076-1.024-3.219-.993-4.362q1.9-70.6,3.911-141.218c.48-16.742,1.88-33.3-4.122-49.76-5.235-14.38-7.205-29.513-4.573-45.142,1.564-9.311,1.309-18.953,1.474-28.46.045-2.843-1.235-5.716-1.912-8.574-.69.135-1.382.256-2.074.391a75.629,75.629,0,0,0,.06,9.236c1.971,16.065-5.22,26.4-21.195,28.821-8.364,1.249-16.953,1.068-25.437,1.474-2.256.12-4.513.015-6.754.015.09,1.113.2,2.226.284,3.324,17.736.662,35.742,3.294,52.289-10.74-.421,3.64-.558,5.6-.887,7.521-4.468,25.091-13.252,49.61-11.056,75.588,1.158,13.809-1.218,25.346-13.434,33.921-3.834,2.693-6,7.882-8.663,12.109-.888,1.414-.933,3.369-1.82,6.935,8.364-10,15.4-18.4,22.428-26.805,1.143.331,2.286.677,3.43,1.008,2.753,9.281,6.152,18.442,8.138,27.889,7.07,33.86,6.3,68.292,5.791,102.589-.3,21.36-3.249,42.856-13.192,62.05-9.913,19.179-11.327,38.975-7.371,59.162,5.024,25.542,2.6,50.136-3.836,75.046-5.882,22.729-10.951,45.759-14.576,68.939-2.151,13.7.677,27.212,15.238,34.658,2.211,1.113,3.834,3.369,6.9,6.167-5.626-.271-9.356-.451-14.11-.677-.06.045-1.113,1.053-2.407,2.286-1.279-1.489-2.332-2.738-3.369-3.941-1.805,1.218-3.339,2.256-5.325,3.6-4.287-8.5-12.154-2.467-16.832-4.377,0-12.967-1.143-25.241.239-37.215,2.363-20.458.633-40.539-2.541-60.621-4.016-25.422-6.122-50.392,2.6-75.693,6.032-17.464,5.385-36,.557-54.183a120.581,120.581,0,0,1-3.971-22.142q-2.64-36.35-4.347-72.745c-.481-10.093-.948-19.976,4.137-29.889,3.445-6.724,2.977-15.464,4.257-23.286-1.008-.18-2.031-.361-3.054-.542-.542,2.181-1.218,4.347-1.579,6.558-.737,4.453-1.249,8.935-1.956,13.388-.767,4.919-3.46,7.205-8.694,7.341-.948.03-1.82.045-2.632.045s-1.685-.015-2.632-.045c-5.235-.135-7.927-2.422-8.694-7.341-.707-4.453-1.218-8.935-1.955-13.388-.361-2.211-1.038-4.377-1.579-6.558-1.023.18-2.046.361-3.054.542,1.279,7.822.812,16.562,4.257,23.286,5.084,9.913,4.618,19.8,4.137,29.889q-1.715,36.395-4.347,72.745A120.579,120.579,0,0,1,106.244,526c-4.829,18.186-5.475,36.718.557,54.183,8.725,25.3,6.619,50.272,2.6,75.693-3.174,20.082-4.9,40.163-2.542,60.621,1.384,11.974.241,24.248.241,37.215-4.678,1.91-12.545-4.122-16.832,4.377-1.986-1.339-3.52-2.377-5.325-3.6-1.038,1.2-2.091,2.452-3.369,3.941-1.294-1.233-2.347-2.241-2.407-2.286-4.753.226-8.484.406-14.11.677,3.069-2.8,4.693-5.054,6.9-6.167C86.524,743.216,89.352,729.708,87.2,716c-3.625-23.18-8.694-46.21-14.576-68.939-6.438-24.91-8.86-49.5-3.836-75.046,3.956-20.187,2.542-39.983-7.371-59.162-9.943-19.194-12.891-40.69-13.192-62.05-.511-34.3-1.279-68.728,5.791-102.589C56,338.772,59.4,329.611,62.155,320.33c1.143-.331,2.286-.677,3.43-1.008,7.025,8.409,14.065,16.8,22.428,26.805-.887-3.565-.933-5.521-1.82-6.935-2.662-4.227-4.829-9.417-8.664-12.109C65.314,318.51,62.937,306.972,64.1,293.164c2.2-25.978-6.589-50.5-11.056-75.588-.331-1.925-.466-3.881-.888-7.521,16.547,14.035,34.552,11.4,52.287,10.74.09-1.1.2-2.211.286-3.324-2.241,0-4.5.105-6.754-.015-8.484-.406-17.073-.226-25.437-1.474-15.975-2.422-23.165-12.756-21.195-28.821a75.627,75.627,0,0,0,.06-9.236c-.692-.135-1.384-.256-2.076-.391-.677,2.858-1.956,5.731-1.91,8.574.165,9.507-.09,19.149,1.474,28.46,2.632,15.629.662,30.762-4.573,45.142-6,16.456-4.6,33.018-4.123,49.76q2.033,70.6,3.913,141.218c.03,1.143-.5,2.286-.993,4.362-8.484-6.122-12.049-14.2-13.147-23.18a51.334,51.334,0,0,1,.752-17.885c2.6-10.936,1.578-21.074-2.106-31.649-6.273-17.976-11.207-36.418-17.255-54.468C2.181,300.459,2.6,272.887,7.19,244.7c2.8-17.208,3.082-34.838,4.468-52.287.421-5.49.54-11,1.143-16.456,3.385-30.686,33.078-40.253,53.476-36.448,8.364,1.564,16.517,4.2,24.865,5.9a15.6,15.6,0,0,0,10.3-1.685q-15.411-3.565-30.822-7.16c10.62-5.46,23.571-5.295,29.814-17.645,5.295,9.281,9.913,18.1,15.208,26.475,3.008,4.753,5.716,7.04,8.439,6.844,2.723.2,5.43-2.091,8.439-6.844,5.295-8.379,9.911-17.193,15.208-26.475,6.243,12.35,19.194,12.184,29.814,17.645q-15.411,3.588-30.822,7.16a15.6,15.6,0,0,0,10.3,1.685c8.347-1.7,16.5-4.332,24.865-5.9,20.4-3.806,50.09,5.761,53.474,36.448.6,5.46.724,10.966,1.145,16.456,1.384,17.449,1.67,35.079,4.468,52.287,4.588,28.189,5.009,55.762-4.167,83.169" transform="translate(0 0)" fill="#6f6c6c"/>
                    </svg>
                    <!-- Head Left -->
                    <svg id="maleLeftHead" class="male-body-part" data-name="Left Head" xmlns="http://www.w3.org/2000/svg" width="28.29" height="92.873" viewBox="0 0 28.29 92.873">
                      <path id="Path_7658" data-name="Path 7658" d="M90.973,5.319S63.226,6.24,63.226,32.652c0,0,1.133,14.74,0,17.5S62.105,73.8,69.6,82.71,87.008,96.476,90.973,98.192Z" transform="translate(-62.683 -5.319)" fill="#49ba8d"></path>
                      <path id="Path_7709" data-name="Path 7709" d="M90.973,5.319S63.226,6.24,63.226,32.652c0,0,1.133,14.74,0,17.5S62.105,73.8,69.6,82.71,87.008,96.476,90.973,98.192Z" transform="translate(-62.683 -5.319)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Head Right -->
                    <svg id="maleRightHead" class="male-body-part" data-name="Right Head" xmlns="http://www.w3.org/2000/svg" width="28.29" height="92.873" viewBox="0 0 28.29 92.873">
                      <path id="Path_7659" data-name="Path 7659" d="M83.259,5.319s27.747.921,27.747,27.333c0,0-1.133,14.74,0,17.5S112.127,73.8,104.63,82.71,87.224,96.476,83.259,98.192Z" transform="translate(-83.259 -5.319)" fill="#2f7756"></path>
                      <path id="Path_7710" data-name="Path 7710" d="M83.259,5.319s27.747.921,27.747,27.333c0,0-1.133,14.74,0,17.5S112.127,73.8,104.63,82.71,87.224,96.476,83.259,98.192Z" transform="translate(-83.259 -5.319)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Neck -->
                    <svg id="maleNeck" class="male-body-part" data-name="Neck" xmlns="http://www.w3.org/2000/svg" width="92.089" height="38.877" viewBox="0 0 92.089 38.877">
                      <g id="Group_275" data-name="Group 275" transform="translate(-1968.512 -5358.951)" opacity="0">
                        <g id="Group_274" data-name="Group 274">
                          <path id="Path_7660" data-name="Path 7660" d="M101.487,82.872A27.451,27.451,0,0,1,95.539,95.4l-5.1,6.158s7.1-3.822,20.328-5.308L124,94.764s-18.687-7.008-22.509-11.892" transform="translate(1936.604 5295.42)" fill="#ed6723"></path>
                          <path id="Path_7661" data-name="Path 7661" d="M74.04,82.872A27.438,27.438,0,0,0,79.986,95.4l5.1,6.158s-7.1-3.822-20.328-5.308L51.529,94.764S70.218,87.756,74.04,82.872" transform="translate(1916.983 5295.42)" fill="#ed6723"></path>
                          <path id="Path_7662" data-name="Path 7662" d="M105.268,70.1c-1.415,1.983-17,8.07-17,8.07s-15.585-6.088-17-8.07,3.4,33.057,17.578,38.791c12.885-8.069,17.837-40.774,16.422-38.791" transform="translate(1926.816 5288.937)" fill="#ed6723"></path>
                        </g>
                      </g>
                      <g id="Group_279" data-name="Group 279" transform="translate(-1968.512 -5358.951)">
                        <g id="Group_274-2" data-name="Group 274">
                          <path id="Path_7660-2" data-name="Path 7660" d="M101.487,82.872A27.451,27.451,0,0,1,95.539,95.4l-5.1,6.158s7.1-3.822,20.328-5.308L124,94.764s-18.687-7.008-22.509-11.892" transform="translate(1936.604 5295.42)" fill="#f7f7f7"></path>
                          <path id="Path_7661-2" data-name="Path 7661" d="M74.04,82.872A27.438,27.438,0,0,0,79.986,95.4l5.1,6.158s-7.1-3.822-20.328-5.308L51.529,94.764S70.218,87.756,74.04,82.872" transform="translate(1916.983 5295.42)" fill="#f7f7f7"></path>
                          <path id="Path_7662-2" data-name="Path 7662" d="M105.268,70.1c-1.415,1.983-17,8.07-17,8.07s-15.585-6.088-17-8.07,3.4,33.057,17.578,38.791c12.885-8.069,17.837-40.774,16.422-38.791" transform="translate(1926.816 5288.937)" fill="#f7f7f7"></path>
                        </g>
                      </g>
                    </svg>
                    <!-- Left Shoulder Chest -->
                    <svg id="maleLeftShoulderChest" class="male-body-part"  data-name="Male Left Shoulder Chest" xmlns="http://www.w3.org/2000/svg" width="107.147" height="68.745" viewBox="0 0 107.147 68.745">
                      <path id="Path_7663" data-name="Path 7663" d="M10.259,128.139s23.487,9.086,27.333,16.989c0,0,1.764-16.629,9.544-20.026,0,0-2.554,48.095,70.269,38.147V115.48S78.523,95.86,63.832,95.86c-17.416,0-48,5.623-53.573,32.279" transform="translate(-10.259 -95.86)" fill="#ec186a" opacity="0"></path>
                      <path id="Path_7711" data-name="Path 7711" d="M10.259,128.139s23.487,9.086,27.333,16.989c0,0,1.764-16.629,9.544-20.026,0,0-2.554,48.095,70.269,38.147V115.48S78.523,95.86,63.832,95.86c-17.416,0-48,5.623-53.573,32.279" transform="translate(-10.259 -95.86)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Right Shoulder Chest -->
                    <svg id="maleRightShoulderChest" class="male-body-part" data-name="Male Right Shoulder Chest" xmlns="http://www.w3.org/2000/svg" width="107.147" height="68.745" viewBox="0 0 107.147 68.745">
                      <path id="Path_7664" data-name="Path 7664" d="M190.406,128.139s-23.487,9.086-27.333,16.989c0,0-1.764-16.629-9.544-20.026,0,0,2.554,48.095-70.269,38.147V115.48s38.883-19.62,53.573-19.62c17.416,0,48,5.623,53.573,32.279" transform="translate(-83.259 -95.86)" fill="#c30750" opacity="0"></path>
                      <path id="Path_7712" data-name="Path 7712" d="M190.406,128.139s-23.487,9.086-27.333,16.989c0,0-1.764-16.629-9.544-20.026,0,0,2.554,48.095-70.269,38.147V115.48s38.883-19.62,53.573-19.62c17.416,0,48,5.623,53.573,32.279" transform="translate(-83.259 -95.86)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Left Arm -->
                    <svg id="maleLeftArm" class="male-body-part" data-name="Left Arm" xmlns="http://www.w3.org/2000/svg" width="37.487" height="103.633" viewBox="0 0 37.487 103.633">
                      <path id="Path_7666" data-name="Path 7666" d="M12.54,122.119a156.871,156.871,0,0,1,0,24.633c-1.133,11.468-10.479,53.516-6.231,76.875,0,0,11.467-3.822,25.909,2.124,0,0,4.833-30.58,8.364-39.924s2.681-44.6-2.841-49.692Z" transform="translate(-5.21 -122.119)" fill="#f09f1f" opacity="0"></path>
                      <path id="Path_7713" data-name="Path 7713" d="M12.54,122.119a156.871,156.871,0,0,1,0,24.633c-1.133,11.468-10.479,53.516-6.231,76.875,0,0,11.467-3.822,25.909,2.124,0,0,4.833-30.58,8.364-39.924s2.681-44.6-2.841-49.692Z" transform="translate(-5.21 -122.119)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Left Lower Rib -->
                    <svg id="maleLeftLowerRib" class="male-body-part" data-name="Left Lower Rib" xmlns="http://www.w3.org/2000/svg" width="55.134" height="135.733" viewBox="0 0 65.938 102.34">
                      <path id="Path_7774" data-name="Path 7774" d="M23.02,123.977c23.15,14.355,61.379,55.9,61.379,55.9V77.54H18.461c3.174,25.037,4.559,46.437,4.559,46.437" transform="translate(-18.461 -77.54)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Lower Rib -->
                    <!-- Right Lower Rib -->
                    <svg id="maleRightLowerRib" class="male-body-part" data-name="Right Lower Rib" xmlns="http://www.w3.org/2000/svg" width="55.134" height="102.34" viewBox="0 0 65.938 102.34">
                      <path id="Path_7776" data-name="Path 7776" d="M89.523,77.54V179.88s38.229-41.548,61.379-55.9c0,0,1.385-21.4,4.559-46.44Z" transform="translate(-89.523 -77.54)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Lower Rib -->
                    <!-- Left Upper Rib -->
                    <svg id="maleLeftUpperRib" class="male-body-part" data-name="Left Upper Rib" xmlns="http://www.w3.org/2000/svg" width="65.4" height="73.54" viewBox="0 0 84.4 73.54">
                      <path id="Path_7773" data-name="Path 7773" d="M84.4,3.3C39.276,21.148,0,0,0,0,8.886,11.642,14.839,44.96,18.461,73.54H84.4V3.3Z" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Upper Rib -->
                    <!-- Right Upper Rib -->
                    <svg id="maleRightUpperRib" class="male-body-part" data-name="Right Upper Rib" xmlns="http://www.w3.org/2000/svg" width="65.4" height="73.537" viewBox="0 0 84.4 73.537">
                      <path id="Path_7775" data-name="Path 7775" d="M173.922,0s-39.276,21.148-84.4,3.3h0V73.54h65.938c3.623-28.579,9.576-61.9,18.461-73.537" transform="translate(-89.522 -0.003)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Upper Rib -->
                    <!-- Right Arm -->
                    <svg id="maleRightArm" class="male-body-part" data-name="Right Arm" xmlns="http://www.w3.org/2000/svg" width="37.486" height="103.633" viewBox="0 0 37.486 103.633">
                      <path id="Path_7665" data-name="Path 7665" d="M164.6,122.119a156.869,156.869,0,0,0,0,24.633c1.134,11.468,10.479,53.516,6.231,76.875,0,0-11.467-3.822-25.907,2.124,0,0-4.833-30.58-8.364-39.924s-2.681-44.6,2.841-49.692Z" transform="translate(-134.442 -122.119)" fill="#cb8009" opacity="0"></path>
                      <path id="Path_7714" data-name="Path 7714" d="M164.6,122.119a156.869,156.869,0,0,0,0,24.633c1.134,11.468,10.479,53.516,6.231,76.875,0,0-11.467-3.822-25.907,2.124,0,0-4.833-30.58-8.364-39.924s-2.681-44.6,2.841-49.692Z" transform="translate(-134.442 -122.119)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Left Elbow -->
                    <svg id="maleLeftElbow" class="male-body-part" data-name="Left Elbow" xmlns="http://www.w3.org/2000/svg" width="30.157" height="107.246" viewBox="0 0 30.157 107.246">
                      <path id="Path_7669" data-name="Path 7669" d="M30.728,195.283s-13.308-6.512-24.918-1.7c0,0,.569,27.749,8.212,47.286s13.025,45.02,13.025,45.02S28.6,298.491,32,299.057h3.965s-1.865-97.78-5.239-103.774" transform="translate(-5.81 -191.811)" fill="#994b86" opacity="0"></path>
                      <path id="Path_7717" data-name="Path 7717" d="M30.728,195.283s-13.308-6.512-24.918-1.7c0,0,.569,27.749,8.212,47.286s13.025,45.02,13.025,45.02S28.6,298.491,32,299.057h3.965s-1.865-97.78-5.239-103.774" transform="translate(-5.81 -191.811)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Right Elbow -->
                    <svg id="maleRightElbow" class="male-body-part" data-name="Right Elbow" xmlns="http://www.w3.org/2000/svg" width="30.155" height="107.246" viewBox="0 0 30.155 107.246">
                      <path id="Path_7667" data-name="Path 7667" d="M143.352,195.283s13.308-6.512,24.918-1.7c0,0-.567,27.749-8.212,47.286s-13.025,45.02-13.025,45.02-1.557,12.6-4.955,13.167h-3.964s1.864-97.78,5.238-103.774" transform="translate(-138.114 -191.811)" fill="#8e2976" opacity="0"></path>
                      <path id="Path_7718" data-name="Path 7718" d="M143.352,195.283s13.308-6.512,24.918-1.7c0,0-.567,27.749-8.212,47.286s-13.025,45.02-13.025,45.02-1.557,12.6-4.955,13.167h-3.964s1.864-97.78,5.238-103.774" transform="translate(-138.114 -191.811)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Left Hand -->
                    <svg id="maleLeftHand" class="male-body-part" data-name="Left Hand" xmlns="http://www.w3.org/2000/svg" width="10.373" height="51.676" viewBox="0 0 10.373 51.676">
                      <g id="Component_77_4" data-name="Component 77 – 4" transform="translate(0 0)">
                        <path id="Path_7670" data-name="Path 7670" d="M23.2,265.554s.283,12.6-1.7,17.98S19.544,301.373,23.21,307.6a45.642,45.642,0,0,0,7.348,9.627l-1.133-51.675Z" transform="translate(-20.185 -265.554)" fill="#fad311" opacity="0"></path>
                        <path id="Path_7720" data-name="Path 7720" d="M23.2,265.554s.283,12.6-1.7,17.98S19.544,301.373,23.21,307.6a45.642,45.642,0,0,0,7.348,9.627l-1.133-51.675Z" transform="translate(-20.185 -265.554)" fill="#f7f7f7"></path>
                      </g>
                    </svg>
                    <!-- Right Hand -->
                    <svg id="maleRightHand" class="male-body-part" data-name="Right Hand" xmlns="http://www.w3.org/2000/svg" width="10.373" height="51.676" viewBox="0 0 10.373 51.676">
                      <g id="Component_80_4" data-name="Component 80 – 4" transform="translate(0 0)">
                        <path id="Path_7668" data-name="Path 7668" d="M144.252,265.554s-.283,12.6,1.7,17.98,1.954,17.839-1.712,24.068a45.641,45.641,0,0,1-7.348,9.627l1.133-51.675Z" transform="translate(-136.89 -265.554)" fill="#c9a916" opacity="0"></path>
                        <path id="Path_7721" data-name="Path 7721" d="M144.252,265.554s-.283,12.6,1.7,17.98,1.954,17.839-1.712,24.068a45.641,45.641,0,0,1-7.348,9.627l1.133-51.675Z" transform="translate(-136.89 -265.554)" fill="#f7f7f7"></path>
                      </g>
                    </svg>
                    <!-- Left Thigh -->
                    <svg id="maleLeftThigh" class="male-body-part" data-name="Left Thigh" xmlns="http://www.w3.org/2000/svg" width="58.92" height="183.755" viewBox="0 0 58.92 183.755">
                      <path id="Path_7723" data-name="Path 7723" d="M50.836,218.684s32.279,36.822,34.828,54.938,6.37,23.636,8.07,28.732-.77,79-3.359,88.342-30.613,20.933-43.361,0-12.163-81.548-11.178-101.51.984-52.241,15-70.5" transform="translate(-35.374 -218.684)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Right Thigh -->
                    <svg id="maleRightThigh" class="male-body-part" data-name="Right Thigh" xmlns="http://www.w3.org/2000/svg" width="58.919" height="183.755" viewBox="0 0 58.919 183.755">
                      <path id="Path_7673" data-name="Path 7673" d="M134.8,218.684s-32.279,36.822-34.828,54.938S93.6,297.258,91.9,302.354s.769,79,3.359,88.342,30.613,20.933,43.36,0,12.165-81.548,11.178-101.51-.984-52.241-15-70.5" transform="translate(-91.342 -218.684)" fill="#c667bb" opacity="0"></path>
                      <path id="Path_7722" data-name="Path 7722" d="M134.8,218.684s-32.279,36.822-34.828,54.938S93.6,297.258,91.9,302.354s.769,79,3.359,88.342,30.613,20.933,43.36,0,12.165-81.548,11.178-101.51-.984-52.241-15-70.5" transform="translate(-91.342 -218.684)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Urinal -->
                    <svg id="maleUrinal" class="male-body-part" data-name="Urinal" xmlns="http://www.w3.org/2000/svg" width="69.091" height="65.548" viewBox="0 0 69.091 65.548">
                      <path id="Path_7675" data-name="Path 7675" d="M94.324,250.151,59.779,221.978c7.929,20.307,24.167,41.622,24.451,54.08.253,11.17,10.093,11.468,10.093,11.468s9.841-.3,10.095-11.468c.284-12.458,16.521-33.773,24.451-54.08Z" transform="translate(-59.779 -221.978)" fill="#eb2027" opacity="0"></path>
                      <path id="Path_7719" data-name="Path 7719" d="M94.324,250.151,59.779,221.978c7.929,20.307,24.167,41.622,24.451,54.08.253,11.17,10.093,11.468,10.093,11.468s9.841-.3,10.095-11.468c.284-12.458,16.521-33.773,24.451-54.08Z" transform="translate(-59.779 -221.978)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Left Knee -->
                    <svg id="maleLeftKnee" class="male-body-part" data-name="Left Knee" xmlns="http://www.w3.org/2000/svg" width="42.472" height="54.365" viewBox="0 0 42.472 54.365">
                      <g data-name="Component 85 – 4" transform="translate(0 0)">
                        <path id="Path_7655" data-name="Path 7655" d="M60.538,370.635c-3.994-.468-7.619-4.087-12.071-6.721.617,6.8,4.714,9.869,10.491,10.668,6.148.848,11.414-.93,15.184-8.093-5.471,1.82-9.726,4.6-13.6,4.146" transform="translate(-40.069 -323.696)" opacity="0"></path>
                        <path id="Path_7677" data-name="Path 7677" d="M85.356,337.177s-15.573,20.67-42.472,3.115c0,0,12.605,32.845,8.568,51.249H78.844s-.567-24.351,1.981-32,4.531-22.369,4.531-22.369" transform="translate(-42.884 -337.177)" fill="#381da8" opacity="0"></path>
                        <path id="Path_7724" data-name="Path 7724" d="M85.356,337.177s-15.573,20.67-42.472,3.115c0,0,12.605,32.845,8.568,51.249H78.844s-.567-24.351,1.981-32,4.531-22.369,4.531-22.369" transform="translate(-42.884 -337.177)" fill="#f7f7f7"></path>
                      </g>
                    </svg>
                    <!-- Right Knee -->
                    <svg id="maleRightKnee" class="male-body-part" data-name="Right Knee" xmlns="http://www.w3.org/2000/svg" width="42.472" height="54.365" viewBox="0 0 42.472 54.365">
                      <g data-name="Component 86 – 4" transform="translate(0 0)">
                        <path id="Path_7657" data-name="Path 7657" d="M114.628,374.581c5.776-.8,9.874-3.87,10.491-10.668-4.454,2.635-8.078,6.253-12.071,6.721-3.876.454-8.132-2.326-13.6-4.144,3.77,7.163,9.036,8.94,15.185,8.091" transform="translate(-91.215 -323.696)" opacity="0"></path>
                        <path id="Path_7676" data-name="Path 7676" d="M93.973,337.177s15.573,20.67,42.472,3.115c0,0-12.605,32.845-8.568,51.249H100.485s.567-24.351-1.981-32-4.531-22.369-4.531-22.369" transform="translate(-93.973 -337.177)" fill="#2a118e" opacity="0"></path>
                        <path id="Path_7725" data-name="Path 7725" d="M93.973,337.177s15.573,20.67,42.472,3.115c0,0-12.605,32.845-8.568,51.249H100.485s.567-24.351-1.981-32-4.531-22.369-4.531-22.369" transform="translate(-93.973 -337.177)" fill="#2a118e" opacity="0"></path>
                        <path id="Path_7726" data-name="Path 7726" d="M93.973,337.177s15.573,20.67,42.472,3.115c0,0-12.605,32.845-8.568,51.249H100.485s.567-24.351-1.981-32-4.531-22.369-4.531-22.369" transform="translate(-93.973 -337.177)" fill="#f7f7f7"></path>
                      </g>
                    </svg>
                    <!-- Left Leg -->
                    <svg id="maleLeftLeg" class="male-body-part" data-name="Left Leg" xmlns="http://www.w3.org/2000/svg" width="38.192" height="158.523" viewBox="0 0 38.192 158.523">
                      <path id="Path_7679" data-name="Path 7679" d="M76.8,378.966s-20.778,4.377-28.689,0c0,0-4.322,45.87,4.74,83.246s12.458,50.966,12.458,66.257S76.8,534.981,76.8,534.981s1.057-70.058,6.932-88.059S76.8,378.966,76.8,378.966" transform="translate(-47.085 -378.966)" fill="#f6ab85" opacity="0"></path>
                      <path id="Path_7727" data-name="Path 7727" d="M76.8,378.966s-20.778,4.377-28.689,0c0,0-4.322,45.87,4.74,83.246s12.458,50.966,12.458,66.257S76.8,534.981,76.8,534.981s1.057-70.058,6.932-88.059S76.8,378.966,76.8,378.966" transform="translate(-47.085 -378.966)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Right Leg -->
                    <svg id="maleRightLeg" class="male-body-part" data-name="Right Leg" xmlns="http://www.w3.org/2000/svg" width="38.192" height="158.523" viewBox="0 0 38.192 158.523">
                      <path id="Path_7678" data-name="Path 7678" d="M100.279,378.966s20.78,4.377,28.689,0c0,0,4.322,45.87-4.74,83.246s-12.458,50.966-12.458,66.257-11.491,6.512-11.491,6.512-1.057-70.058-6.932-88.059,6.932-67.955,6.932-67.955" transform="translate(-91.806 -378.966)" fill="#db9673" opacity="0"></path>
                      <path id="Path_7728" data-name="Path 7728" d="M100.279,378.966s20.78,4.377,28.689,0c0,0,4.322,45.87-4.74,83.246s-12.458,50.966-12.458,66.257-11.491,6.512-11.491,6.512-1.057-70.058-6.932-88.059,6.932-67.955,6.932-67.955" transform="translate(-91.806 -378.966)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Left Foot -->
                    <svg id="maleLeftFoot" class="male-body-part" data-name="Left Foot" xmlns="http://www.w3.org/2000/svg" width="33.872" height="22.935" viewBox="0 0 33.872 22.935">
                      <path id="Path_7681" data-name="Path 7681" d="M65.243,487.2s-5.308,12.317-10.83,15.715-7.327,4.46-7.327,4.46,4.355-.638,4.991,0a46.752,46.752,0,0,0,4.089,2.76l4.194-3.186s2.548,1.274,3.186,1.488,10.594-4.46,13.26-3.61a4.127,4.127,0,0,0,4.153-.638L78.409,487.2a11.679,11.679,0,0,1-13.167,0" transform="translate(-47.085 -487.201)" fill="#f7f7f7"></path>
                      <path id="Path_7730" data-name="Path 7730" d="M65.243,487.2s-5.308,12.317-10.83,15.715-7.327,4.46-7.327,4.46,4.355-.638,4.991,0a46.752,46.752,0,0,0,4.089,2.76l4.194-3.186s2.548,1.274,3.186,1.488,10.594-4.46,13.26-3.61a4.127,4.127,0,0,0,4.153-.638L78.409,487.2a11.679,11.679,0,0,1-13.167,0" transform="translate(-47.085 -487.201)" fill="#f7f7f7"></path>
                    </svg>
                    <!-- Right Foot -->
                    <svg id="maleRightFoot" class="male-body-part" data-name="Right Foot" xmlns="http://www.w3.org/2000/svg" width="33.872" height="22.935" viewBox="0 0 33.872 22.935">
                      <path id="Path_7680" data-name="Path 7680" d="M110.394,487.2s5.308,12.317,10.83,15.715,7.327,4.46,7.327,4.46-4.355-.638-4.991,0a46.754,46.754,0,0,1-4.089,2.76l-4.194-3.186s-2.548,1.274-3.186,1.488-10.594-4.46-13.26-3.61a4.127,4.127,0,0,1-4.153-.638L97.227,487.2a11.679,11.679,0,0,0,13.167,0" transform="translate(-94.679 -487.201)" fill="#880808" opacity="0"></path>
                      <path id="Path_7729" data-name="Path 7729" d="M110.394,487.2s5.308,12.317,10.83,15.715,7.327,4.46,7.327,4.46-4.355-.638-4.991,0a46.754,46.754,0,0,1-4.089,2.76l-4.194-3.186s-2.548,1.274-3.186,1.488-10.594-4.46-13.26-3.61a4.127,4.127,0,0,1-4.153-.638L97.227,487.2a11.679,11.679,0,0,0,13.167,0" transform="translate(-94.679 -487.201)" fill="#f7f7f7"></path>
                    </svg>
                  </div>
                  <div class="body-main-link">
                    <a href="javascriptvoid:(0)" id="flip-card-btn-turn-to-back" class="back-body-link">{{trans(''.$selected_language->language.'.other_words.back_body_map')}} <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                  </div>
                  </p>
                </div>
                <div class="flip-card-back">
                  <p>
                  <div class="man-back-avatar" id="man-back-avatar">
                    <svg id="avatar-back-body" xmlns="http://www.w3.org/2000/svg" width="249.961" height="775.376" viewBox="0 0 249.961 775.376">
                      <path id="Male_back_side_body_outline" data-name="Male back side body outline" d="M1212.478,2587.233a307.385,307.385,0,0,1-6.01-69.37,51.723,51.723,0,0,0-2.11-14.94c-4.23-15.59-13.92-26.27-29.74-30.51-13.41-3.6-26.86-7.63-40.56-9.67-20.63-3.08-22.62-27.33-14.34-41.33a127.646,127.646,0,0,0,12.19-28.43c1.16-3.93-2.01-9.15-3.32-13.76-.77-2.79-2.41-5.49-2.55-8.31-1.11-21.43-16.18-37.56-35.61-37.79h-.07a34.088,34.088,0,0,0-24.67,10.95,42.054,42.054,0,0,0-10.93,26.84c-.14,2.82-1.78,5.52-2.55,8.31-1.32,4.6-4.49,9.83-3.32,13.76a127.586,127.586,0,0,0,12.19,28.43c8.28,14,6.28,38.25-14.34,41.33-13.71,2.04-27.15,6.07-40.57,9.67-15.81,4.24-25.51,14.92-29.74,30.51a52.058,52.058,0,0,0-2.1,14.94c.8,23.39-1.56,46.49-6.01,69.37-4.71,24.07-3.79,47.77,3.52,71.2,6.01,19.33,11.37,38.88,18,57.98,4.19,12.05,5.88,23.5,2.76,36.22-4.11,16.8,1.5,31.2,13.95,43.31,2.78,2.69,4.38,7.04,5.52,10.93,4.76,16.43,7.55,33.68,14.16,49.3a88.093,88.093,0,0,1,4.28,12.56,92.294,92.294,0,0,1,2.14,33.96c-.1.9-.2,1.78-.31,2.68-1.82,14.88-4.87,30.039-3.26,44.619,2.41,21.71,8.41,43.121,13.91,64.371,4.62,17.81,7.8,35.64,7.16,54.02-.01.72-.04,1.44-.08,2.16-.59,11.82-3.68,16.889-12.98,19.75-6.21,1.9-11,4.75-9.4,12.17,1.56,7.34,7.99,5.89,12.98,5.969,8.07.161,16.15-.4,24.24-.6,11.38-.28,14.65-3.7,14.89-15.21.17-8.08.7-16.16,1.01-24.24.03-.471.05-.971.07-1.451.2-5.219,1.27-10.7.13-15.639-4.67-20.381-3.6-40.6-.35-61,3.35-21,6.39-42.1-.78-63.06a117.225,117.225,0,0,1-5.4-22.87,105.723,105.723,0,0,1,1.31-35.08q.78-3.84,1.86-7.71a52.6,52.6,0,0,0,2.05-10.4c1.64-25.73,3.15-51.5,4.77-77.25l5.94-33.57,5.26,23.05c1.88,29.26,3.58,58.53,5.44,87.77a51.914,51.914,0,0,0,2.06,10.4c6.17,22.14,5.17,44.02-2.24,65.66-7.17,20.96-4.13,42.06-.78,63.06,3.24,20.4,4.32,40.619-.35,61-1.14,4.94-.07,10.42.13,15.639.02.48.04.98.07,1.451.04,1.01.09,2.029.12,3.029.18,4.04.39,8.08.58,12.121.13,3.03.24,6.06.3,9.09.24,11.51,3.51,14.93,14.9,15.21,8.09.2,16.17.76,24.23.6,5-.079,11.43,1.371,12.99-5.969,1.59-7.42-3.19-10.27-9.4-12.17-9.3-2.861-12.4-7.93-12.99-19.75-.03-.72-.06-1.44-.07-2.16-.65-18.391,2.53-36.21,7.15-54.02,5.5-21.25,11.5-42.661,13.91-64.371,1.72-15.449-1.81-31.559-3.57-47.3-1.78-16.15-.09-31.14,6.43-46.53,6.61-15.62,9.4-32.87,14.16-49.3,1.14-3.88,2.74-8.24,5.52-10.93,12.44-12.1,18.06-26.5,13.94-43.3-3.11-12.73-1.42-24.18,2.77-36.23,6.62-19.1,11.99-38.65,18-57.97C1216.258,2635,1217.188,2611.3,1212.478,2587.233Zm-86.73-202.18,2.63.33-1.29,12.03-2.88-.46Zm-72.97,12.36-1.29-12.03,2.63-.33,1.53,11.9Zm7.23,10.95c-.29-10.44-.64-38.01-.64-38.01s-3.19-28.44,28.85-33.02c0,0,10.58-2.04,23.08,7.92s10.03,27.52,10.03,27.52l-.4,28.13s1.16,17.35-5.75,18.89-16.42-3.75-24.86-2.93-20.99,4.47-23.79,3.2S1060.3,2418.8,1060.008,2408.363Zm-49.88,226.26c-1.58-29.58,10.43-58.28,10.43-58.28,9.17,26.32,6.49,63.4,4.63,77.99s-11.47,36.85-11.47,36.85S1011.708,2664.193,1010.128,2634.623Zm156.95,56.56s-9.62-22.26-11.48-36.85-4.54-51.67,4.63-77.99c0,0,12,28.7,10.43,58.28S1167.078,2691.183,1167.078,2691.183Zm44.92-70.86a.792.792,0,0,1-.03.15v.01c-.01.47-.05.95-.11,1.46-.29,2.26-.2,4.61-.76,6.78-6.33,24.45-11.55,49.27-19.49,73.2-6.41,19.28-11.46,37.55-6.71,58.29,2.84,12.36-3.31,23.84-14.77,33.87,0-6.6-.11-11.31.01-16.02.9-35.13,1.59-70.26,2.86-105.36,1.08-30.23,3.97-60.18-5.49-90.12-2.26-7.11-3.15-14.66-3.64-22.33-.04-.57-.07-1.14-.1-1.71-.05-.75-.09-1.5-.12-2.26-.05-1-.1-2.01-.14-3.01-.14-3.18-.26-6.37-.43-9.54-.084-1.789-.2-3.574-.341-5.35,0-.043-.005-.087-.009-.13-.04-.51-.08-1.01-.12-1.51s-.08-1.01-.13-1.51c0,0-.02-.17-.06-.49a30.225,30.225,0,0,0-3.42-10.14,18.7,18.7,0,0,0-15.85-10.02.439.439,0,0,0-.18.85c4.86,1.89,14.8,7.4,15.85,20.99,0,7.89,1.17,16.08.49,23.83a40.173,40.173,0,0,1-.84,5.49c-5.66,24.53-9.22,49.15-8.74,74.33.04,2.44-.39,4.88-.61,7.79-6.19-.75-11.63-1.42-17.06-2.1v.02l-1.79-.22c-27.29-5.2-39.32-9.33-39.7-8.04-.58,1.97,36.68,9.53,39.27,10.63l.39.15a63.4,63.4,0,0,0,8.37,2.04c.35.04.69.09,1.03.14l.02-.04c.24.05.49.08.74.11,7.42.83,11.92,4.66,13.77,11.94,2.41,9.55,6.63,18.92,7.35,28.58,2.28,31.22,3.91,62.5,4.67,93.8.57,22.7-4.14,44.71-12.88,65.8-3.01,7.32-5.73,14.77-8.49,22.37a.01.01,0,0,1-.01.01h-.01v.02a.109.109,0,0,1-.01.05.188.188,0,0,1-.02.08,70.463,70.463,0,0,0-1.33,22.66c.29,2.07.58,4.16.89,6.22.01.04.01.08.02.12v.03c.11.8.23,1.61.35,2.42,2.06,14.17,4.12,28.44,3.11,42.43-1.47,19.97-6.97,39.73-11.83,59.32-4.95,19.93-9.97,39.63-9.16,60.48.02.5.04,1.01.06,1.52.54,11.3,2.45,21.009,13.44,25.13,0,0,0-.26.04,0,.44.04,4.47.4,7.06,2.43a1.07,1.07,0,0,1,.16.14l.23.19a1.253,1.253,0,0,1,.21.19l.18.19.05.04a5.019,5.019,0,0,1,1.36,3.94,3.443,3.443,0,0,1-1.9,2.89c-1.68.83-5,1.74-11.43,1.54-.01-.02-.01-.02-.02-.02a82.192,82.192,0,0,1-8.29-.74c-1.5-.03-3.22-.01-5.2.02a46.275,46.275,0,0,1-5.15-.161c-.04,0-.07.011-.1.011q-.405.06-.81.09a1.5,1.5,0,0,1-.22.02c-.34.03-.69.04-1.03.04a15.085,15.085,0,0,1-4.48-.681,12.46,12.46,0,0,1-1.35-.5c-.22-.089-.4-.19-.61-.289a7.266,7.266,0,0,1-2.88-2.78c-.08-.15-.17-.32-.25-.48s-.15-.33-.23-.5a6.425,6.425,0,0,1-.22-.661,2.4,2.4,0,0,1-.12-.379,6.877,6.877,0,0,1-.25-1.11c-.04-.21-.07-.44-.11-.66a.576.576,0,0,1-.03-.141l-.07-.649c-.05-.5-.08-1.021-.1-1.55v-.011c-.03-.609-.03-1.23-.03-1.859,0-7.6-.04-15.181-.28-22.76-.01-.31-.02-.611-.05-.93a96.911,96.911,0,0,1-.1-15.89c1.99-21.38,3.1-41.8-.32-62.73-3.58-21.73-5.81-43.36,1.74-65.19,6.96-20.2,7.14-41.13,1.7-62.08a137.646,137.646,0,0,1-4.1-25.41c-1.78-25.71-3-51.48-4.4-77.21-.18-3.64-.02-7.31-.02-11.02,0,0,.06,0,.18.01,3.33.33,52.01,4.86,63.21-3.33,0,0-5.81.44-13.19.91-10.34.64-23.76,1.33-28.63.92a3,3,0,0,0-.43-.03c-.57-.05-1.15-.07-1.75-.1-.5-.02-1.02-.06-1.53-.11-14.17-1.24-24.26-4-24.6-19.4l-.96-22.47,0-.01-.792-18.778-.871,19.123-.013.025v.007l0,0-.9,19.65v.01c.7,17.56-9.68,20.54-24.57,21.84-.51.05-1.02.09-1.53.11h-.08c-.55.05-1.12.08-1.67.1h-.13c-.1.02-.2.02-.3.03-1.84.16-4.91.16-8.57.06-.29-.01-.58-.02-.87-.02-.62-.03-1.25-.04-1.88-.07-.39-.01-.77-.02-1.16-.05-4.36-.16-9.17-.43-13.61-.69-.72-.04-1.43-.09-2.11-.13-.15-.01-.29-.02-.43-.02-7.38-.47-13.19-.91-13.19-.91,11.2,8.19,59.88,3.66,63.21,3.33.12-.01.18-.01.18-.01,0,3.71.16,7.38-.02,11.02-1.39,25.73-2.62,51.5-4.4,77.21a137.51,137.51,0,0,1-4.1,25.41q-.96,3.75-1.7,7.5a107.489,107.489,0,0,0-1.33,34.14,100.024,100.024,0,0,0,4.74,20.43c7.54,21.829,5.31,43.46,1.74,65.19-3.42,20.92-3.16,41.179-.77,62.53a86.506,86.506,0,0,1,.34,16.09c-.03.32-.04.62-.05.93-.24,7.58-.28,15.16-.28,22.76,0,.63,0,1.25-.02,1.86v.009a20.07,20.07,0,0,1-.32,3,7.778,7.778,0,0,1-5.91,6.7,14.92,14.92,0,0,1-6.64.52,46.571,46.571,0,0,1-5.15.16c-1.98-.04-3.7-.05-5.2-.02a82.192,82.192,0,0,1-8.29.74c-.01,0-.01,0-.02.01-6.43.2-9.75-.7-11.43-1.54a3.43,3.43,0,0,1-1.9-2.89,5.014,5.014,0,0,1,1.36-3.931l.23-.23c.1-.1.2-.2.31-.29.09-.079.19-.149.29-.23,2.59-2.029,6.62-2.4,7.06-2.429.04-.26.04,0,.04,0,13.5-4.51,13.11-13.88,13.45-25.13.01-.5.03-1.01.05-1.52.81-20.85-4.21-40.55-9.16-60.49-4.86-19.59-10.37-39.34-11.83-59.31-.96-13.25.83-26.74,2.79-40.17a.529.529,0,0,1,.01-.13c.09-.62.18-1.25.27-1.87.48-3.32.97-6.63,1.41-9.93a73.889,73.889,0,0,0-2.22-23.92.8.8,0,0,0-.05-.15.134.134,0,0,1-.01-.05l-.23-.61-.01-.04-.3-.83c-2.31-6.34-4.62-12.56-7.16-18.71-8.73-21.09-13.44-43.1-12.87-65.8.75-31.3,2.38-62.58,4.67-93.8.71-9.66,4.93-19.03,7.34-28.58,1.77-6.94,5.93-10.74,12.74-11.8.34-.05.68-.1,1.03-.14a65.054,65.054,0,0,0,8.37-2.05l.39-.15c2.59-1.1,39.85-8.66,39.27-10.62-.38-1.29-12.41,2.84-39.7,8.04-3.37.41-6.75.83-10.32,1.26-2.16.28-4.4.54-6.73.83-.23-2.92-.66-5.35-.62-7.79.48-25.18-3.08-49.8-8.74-74.33a39.794,39.794,0,0,1-.84-5.48c-.68-7.75.49-15.94.49-23.83,1.05-13.59,10.99-19.1,15.85-20.99a.439.439,0,0,0-.18-.85c-17.49,1.01-19.33,20.65-19.33,20.65-.09,1-.18,2.01-.25,3.02-.56,7.28-.66,14.7-1.14,22-.49,7.67-1.38,15.21-3.63,22.32-9.47,29.94-6.58,59.89-5.49,90.12,1.26,35.1,1.95,70.23,2.85,105.36.13,4.71.01,9.42.01,16.02-11.46-10.02-17.61-21.51-14.77-33.87,4.75-20.74-.3-39.01-6.71-58.29-7.94-23.93-13.15-48.74-19.49-73.2a57.929,57.929,0,0,1-.76-6.77c-.05-.37-.07-.72-.1-1.06v-.03a10.278,10.278,0,0,1,.52-4.33l1.05-8.87.01-.1c.18-3.82-.01-8.03.67-12.08,4.13-24.98,7.57-49.9,7.01-75.38-.57-26.12,10.84-39.58,36.25-45.76,12.04-2.92,24.17-5.58,36.1-8.87,13.72-3.79,18.44-10.49,18.55-24.82.12-16.37,2.62-18.93,19.1-19.38q1.155-.045,2.31-.03c.79-.01,1.54,0,2.31.03,16.49.45,18.99,3.01,19.1,19.38.12,14.33,4.84,21.03,18.56,24.82,11.93,3.29,24.06,5.94,36.1,8.87,25.41,6.18,36.82,19.64,36.25,45.76-.57,25.48,2.88,50.4,7,75.38.69,4.05.5,8.25.67,12.08C1210.378,2607.553,1212.238,2617.533,1212,2620.323Z" transform="translate(-965.416 -2333.123)" fill="#777"/>
                    </svg>
                    <!-- Arm Left 1 -->
                    <svg id="armbackleft" class="male-body-part" data-name="arm back left" xmlns="http://www.w3.org/2000/svg" width="109.031" height="70.369" viewBox="0 0 109.031 70.369">
                      <path id="arm_left_1" data-name="arm left 1" d="M992.712,2540.8c1.729-.707,3.547-1.527,5.428-2.5.189-.088.366-.176.555-.278l.151-.076a83.956,83.956,0,0,0,24.273-19.148c15.6-17.734,54.591,7.7,65.307,13.653v-58.2h-57.1s-27.125.215-41.578,17.76c0,0-10.552,12.218-10.35,52.609,0,0,1.022-.139,2.739-.5A53.588,53.588,0,0,0,992.712,2540.8Z" transform="translate(-979.395 -2474.25)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Arm Left 1 -->
                    <!-- Arm Left 2 -->
                    <svg id="armbackcenterleft" class="male-body-part" data-name="arm back center left" xmlns="http://www.w3.org/2000/svg" width="45.1" height="83.678" viewBox="0 0 45.1 83.678">
                      <path id="arm_left_2" data-name="arm left 2" d="M972.028,2612.407h33.32s1.636-20.995,6.1-32.558,5.68-51.12,5.68-51.12c-16.228,15.417-37.787,17.852-37.787,17.852C979.082,2562.4,972.028,2612.407,972.028,2612.407Z" transform="translate(-972.028 -2528.729)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Arm Left 2 -->
                    <!-- Arm Left 3 -->
                    <svg id="armbackbottomleft" class="male-body-part" data-name="arm back bottom left" xmlns="http://www.w3.org/2000/svg" width="37.646" height="130.978" viewBox="0 0 37.646 130.978">
                      <path id="arm_left_3" data-name="arm left 3" d="M999.413,2746.191h9.534l-3.62-130.978s-26.473.135-32.414,1.306c-1.181.234-1.6,1.792-1.611,3-.035,3.578.875,14.484,9.041,43.3C991.095,2700.752,1000.427,2724.283,999.413,2746.191Z" transform="translate(-971.301 -2615.213)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Arm Left 3 -->
                    <!-- Hand Left -->
                    <svg id="backarmleft" class="male-body-part" data-name="back arm left" xmlns="http://www.w3.org/2000/svg" width="13.615" height="42.6" viewBox="0 0 13.615 42.6">
                      <path id="hand_left" data-name="hand left" d="M998.531,2748.017c-3.245,14.335-2.435,19.745-2.435,19.745a35.274,35.274,0,0,0,13.525,22.855l-.812-41.518Z" transform="translate(-996.006 -2748.017)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Hand Left -->
                    <!-- Arm Right 1 -->
                    <svg id="backarmright" class="male-body-part" data-name="back arm right" xmlns="http://www.w3.org/2000/svg" width="110.561" height="70.369" viewBox="0 0 110.561 70.369">
                      <path id="arm_right_1" data-name="arm right 1" d="M1091.178,2474.255l.013,58.464c7.851-4.519,50.35-32.639,66.809-13.92a84.113,84.113,0,0,0,24.273,19.148l.151.076c.189.1.379.189.555.278,1.881.972,3.711,1.792,5.428,2.5a53.822,53.822,0,0,0,10.577,3.321c1.729.365,2.752.5,2.752.5.2-40.391-10.35-52.609-10.35-52.609-14.452-17.545-41.578-17.76-41.578-17.76h-58.63Z" transform="translate(-1091.178 -2474.253)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Arm Right 1 -->
                    <!-- Arm Right 2 -->
                    <svg id="backarcenterright" class="male-body-part" data-name="back arm center right" xmlns="http://www.w3.org/2000/svg" width="46.015" height="83.678" viewBox="0 0 46.015 83.678">
                      <path id="arm_right_2" data-name="arm right 2" d="M1209.435,2612.407s-7.567-50-7.825-65.826c0,0-21.961-2.435-38.19-17.852,0,0,1.621,39.557,6.083,51.12s6.109,32.558,6.109,32.558Z" transform="translate(-1163.42 -2528.729)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Arm Right 2 -->
                    <!-- Arm Right 3 -->
                    <svg id="backarmbottomright" class="male-body-part" data-name="back arm bottom right" xmlns="http://www.w3.org/2000/svg" width="37.647" height="130.98" viewBox="0 0 37.647 130.98">
                      <path id="arm_right_3" data-name="arm right 3" d="M1210.193,2619.517c-.011-1.2-.429-2.763-1.611-3-5.941-1.171-32.414-1.306-32.414-1.306l-3.621,130.98h9.535c-1.015-21.91,8.317-45.44,19.068-83.375C1209.317,2634,1210.227,2623.091,1210.193,2619.517Z" transform="translate(-1172.547 -2615.211)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Arm Right 3 -->
                    <!-- Hand Right -->
                    <svg id="backarmrighthand" class="male-body-part" data-name="back arm right" xmlns="http://www.w3.org/2000/svg" width="13.539" height="42.955" viewBox="0 0 13.539 42.955">
                      <path id="hand_right" data-name="hand right" d="M1172.547,2747.663l-1.217,42.955a35.272,35.272,0,0,0,13.523-22.855s.405-5.765-2.84-20.1Z" transform="translate(-1171.33 -2747.663)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Hand Right -->
                    <!-- Chest Upper Left -->
                    <svg id="backchestupperleft" class="male-body-part" data-name="back chest upper left" xmlns="http://www.w3.org/2000/svg" width="65.551" height="77.42" viewBox="0 0 65.551 77.42">
                      <path id="chest_uppar_left" data-name="chest uppar left" d="M1042.153,2518.446c-8.028.442-10.754,3.812-11.676,6.273a23.479,23.479,0,0,1-2.512,5.036c-3.168,4.658-8.268,16.813-2.4,42.865,1.755,7.8,3.092,15.678,4.128,23.226,6.955-.43,37.034-3.018,58.731-16.953l0-42.624S1054.977,2517.74,1042.153,2518.446Z" transform="translate(-1022.875 -2518.426)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Chest Upper Left -->
                    <!-- Chest Lower Left -->
                    <svg id="backchestlowerleft" class="male-body-part" data-name="back chest lower left" xmlns="http://www.w3.org/2000/svg" width="58.4" height="63.705" viewBox="0 0 58.4 63.705">
                      <path id="chest_lower_left" data-name="chest lower left" d="M1032.954,2645.577c35.706-5.681,55.472-9.644,55.472-9.644v-54.061c-21.862,13.38-51.069,16.018-58.4,16.485A367.2,367.2,0,0,1,1032.954,2645.577Z" transform="translate(-1030.026 -2581.872)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Chest Lower Left -->
                    <!-- Chest Upper Right -->
                    <svg id="backchestupperright" class="male-body-part" data-name="back chest upper right" xmlns="http://www.w3.org/2000/svg" width="65.545" height="80.793" viewBox="0 0 65.545 80.793">
                      <path id="chest_uppar_right_" data-name="chest uppar right " d="M1153.658,2572.621c5.857-26.052.77-38.208-2.4-42.865a24.17,24.17,0,0,1-2.524-5.036c-.909-2.461-3.648-5.831-11.663-6.273-12.824-.707-46.273,17.823-46.273,17.823v42.2c3.471,1.8,38.043,19.475,58.289,20.75C1150.161,2590.658,1151.638,2581.584,1153.658,2572.621Z" transform="translate(-1090.798 -2518.427)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Chest Upper Right -->
                    <!-- Chest Lower Right -->
                    <svg id="backchestlowerright" class="male-body-part" data-name="back chest lower right" xmlns="http://www.w3.org/2000/svg" width="57.999" height="64.259" viewBox="0 0 57.999 64.259">
                      <path id="chest_lower_right" data-name="chest lower right" d="M1146.274,2645.576a363.434,363.434,0,0,1,2.524-43.862c-19.6-1.287-50.83-16.737-58-20.4v54.616S1110.565,2639.9,1146.274,2645.576Z" transform="translate(-1090.799 -2581.317)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Chest Lower Right -->
                    <!-- Back Head Left -->
                    <svg id="backheadleft" class="male-body-part" data-name="back head left" xmlns="http://www.w3.org/2000/svg" width="24.667" height="72.389" viewBox="0 0 24.667 72.389">
                      <path id="Head_left_part" data-name="Head left part" d="M1088.426,2408.683v-65.105c-20.587-1.628-23.5,17.1-23.5,17.1s-2.625,51.8,0,54.654S1088.426,2408.683,1088.426,2408.683Z" transform="translate(-1063.759 -2343.478)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Head Left -->
                    <!-- Back Head Right -->
                    <svg id="backheadright" class="male-body-part" data-name="back head right" xmlns="http://www.w3.org/2000/svg" width="24.667" height="72.388" viewBox="0 0 24.667 72.388">
                      <path id="Head_right_part" data-name="Head right part" d="M1115.16,2415.339c2.625-2.853,0-54.654,0-54.654s-2.916-18.731-23.5-17.1v65.1S1112.547,2418.188,1115.16,2415.339Z" transform="translate(-1091.66 -2343.484)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Head Right -->
                    <!-- Back Neck -->
                    <svg id="backneck" class="male-body-part" data-name="back neck" xmlns="http://www.w3.org/2000/svg" width="98.261" height="46.486" viewBox="0 0 98.261 46.486">
                      <path id="Neck" d="M1091,2470.854h48.829c-19.958-4.99-28.511-12.592-30.887-16.868s-1.426-21.383-2.98-26.611c-1.42-4.776-15.263-2.432-15.263-2.432s-13.844-2.344-15.264,2.432c-1.554,5.228-.6,22.334-2.98,26.611s-10.928,11.879-30.887,16.868H1091Z" transform="translate(-1041.565 -2424.368)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Neck -->
                    <!-- Back Leg Upper Right -->
                    <svg id="backlegupperright" class="male-body-part" data-name="back leg upper right" xmlns="http://www.w3.org/2000/svg" width="60.309" height="120.591" viewBox="0 0 60.309 120.591">
                      <path id="leg_uppar_right" data-name="leg uppar right" d="M1102.4,2751.8s1.628,42.2,2.7,67.882c.745,17.772,4.607,39.167,6.9,50.667,11.6,1.324,23.629.39,31.821-.631,3.193-10,8.217-25.825,12.938-40.972,7.712-24.741,5.718-78.335,5.718-78.335C1125.465,2760.4,1102.4,2751.8,1102.4,2751.8Z" transform="translate(-1102.404 -2750.416)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Upper Right -->
                    <!-- Back Leg Middle Right -->
                    <svg id="backlegmiddleright" class="male-body-part" data-name="back leg middle right" xmlns="http://www.w3.org/2000/svg" width="30.977" height="31.429" viewBox="0 0 30.977 31.429">
                      <path id="leg_middle_right" data-name="leg middle right" d="M1143.35,2871.234c-8.192,1.021-19.378,2.225-30.977.9,1.035,5.137,1.392,6.525,1.392,6.525a80.685,80.685,0,0,1-.2,23.337,231.452,231.452,0,0,1,27.649.667c-1.18-9.539-.391-15.63-.289-19.662a16.3,16.3,0,0,1,.5-4.682C1141.877,2876.9,1142.379,2874.286,1143.35,2871.234Z" transform="translate(-1112.373 -2871.234)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Middle Right -->
                    <!-- Back Leg Lower Right -->
                    <svg id="backleglowerright" class="male-body-part" data-name="back leg lower right" xmlns="http://www.w3.org/2000/svg" width="42.395" height="183.476" viewBox="0 0 42.395 183.476">
                      <path id="leg_lower_right" data-name="leg lower right" d="M1107.276,3086.18a30.645,30.645,0,0,0,7.422,1.111,23.521,23.521,0,0,0,3.118-.038,31.634,31.634,0,0,0,9.34-1.931c-1.628-6.223-5.554-42.751,5-72.78s16.055-77.059,11.638-95.209a112.972,112.972,0,0,1-2.3-12.749,237.976,237.976,0,0,0-28.211-.543c-2.827,19.351-10.148,34.8-10.338,46.563-.278,16.51,4.6,52.47,5.137,58.96a181.049,181.049,0,0,1-.808,35.428,149.763,149.763,0,0,0-.316,36.277c.013.177.025.366.025.543Z" transform="translate(-1102.934 -2903.85)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Lower Right -->
                    <!-- Back Leg Upper Left -->
                    <svg id="backlegupperleft" class="male-body-part" data-name="back leg upper left" xmlns="http://www.w3.org/2000/svg" width="60.309" height="120.591" viewBox="0 0 60.309 120.591">
                      <path id="leg_left_part_1" data-name="leg left part 1" d="M1018.512,2750.417s-1.994,53.594,5.718,78.335c4.721,15.146,9.744,30.974,12.938,40.972,8.192,1.021,20.221,1.955,31.821.631,2.3-11.5,6.16-32.9,6.9-50.667,1.073-25.686,2.7-67.882,2.7-67.882S1055.533,2760.4,1018.512,2750.417Z" transform="translate(-1018.28 -2750.417)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Upper Left -->
                    <!-- Back Leg Middle Left -->
                    <svg id="backlegmiddleleft" class="male-body-part" data-name="back leg middle left" xmlns="http://www.w3.org/2000/svg" width="30.977" height="31.429" viewBox="0 0 30.977 31.429">
                      <path id="leg_middle_part_left" data-name="leg middle part left" d="M1068.625,2872.134c-11.6,1.325-22.786.121-30.977-.9.971,3.052,1.473,5.665,1.929,7.085a16.225,16.225,0,0,1,.491,4.682c.1,4.031.892,10.123-.288,19.662a231.246,231.246,0,0,1,27.649-.667,80.724,80.724,0,0,1-.2-23.337S1067.59,2877.271,1068.625,2872.134Z" transform="translate(-1037.648 -2871.234)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Middle Left -->
                    <!-- Back Leg Lower Left -->
                    <svg id="backleglowerleft" class="male-body-part" data-name="back leg lower left" xmlns="http://www.w3.org/2000/svg" width="42.395" height="183.476" viewBox="0 0 42.395 183.476">
                      <path id="leg_lower_left" data-name="leg lower left" d="M1078.05,2950.6c-.189-11.764-7.51-27.212-10.338-46.563a237.976,237.976,0,0,0-28.211.543,112.935,112.935,0,0,1-2.3,12.749c-4.418,18.151,1.086,65.181,11.638,95.209s6.627,66.557,5,72.78a31.634,31.634,0,0,0,9.34,1.931,23.521,23.521,0,0,0,3.118.038,30.645,30.645,0,0,0,7.422-1.111l.29-4.367c0-.177.013-.366.025-.543a149.76,149.76,0,0,0-.316-36.276,181.064,181.064,0,0,1-.808-35.429C1073.457,3003.075,1078.328,2967.115,1078.05,2950.6Z" transform="translate(-1035.667 -2903.851)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Lower Left -->
                    <!-- Back foot Left -->
                    <svg id="backfootleft" class="male-body-part" data-name="back foot left" xmlns="http://www.w3.org/2000/svg" width="41.861" height="17.617" viewBox="0 0 41.861 17.617">
                      <path id="foot_left" data-name="foot left" d="M1052.829,3086.687a20.189,20.189,0,0,1-13.287,7.608c-7.3,1.115-8.358,6.352-6.693,7.811,5.015,4.393,21.5.913,32.558.507s8.317-14.707,8.317-14.707C1066.624,3089.629,1052.829,3086.687,1052.829,3086.687Z" transform="translate(-1032.164 -3086.687)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back foot Left -->
                    <!-- Back foot Right -->
                    <svg id="backfootright" class="male-body-part" data-name="back foot right" xmlns="http://www.w3.org/2000/svg" width="41.861" height="17.616" viewBox="0 0 41.861 17.616">
                      <path id="foot_right" data-name="foot right" d="M1141.455,3094.294a20.181,20.181,0,0,1-13.287-7.608s-13.795,2.942-20.9,1.218c0,0-2.738,14.3,8.318,14.707s27.543,3.885,32.558-.507C1149.813,3100.646,1148.757,3095.409,1141.455,3094.294Z" transform="translate(-1106.973 -3086.686)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back foot Right -->
                    <!-- Hip Left -->
                    <svg id="backhipleft" class="male-body-part" data-name="back hip left" xmlns="http://www.w3.org/2000/svg" width="68.733" height="97.74" viewBox="0 0 68.733 97.74">
                      <path id="hip_left_part" data-name="hip left part" d="M1039.643,2652.674c-13.117,2.84-16.364,25.155-18.662,35.3s-2.466,52.607-2.466,52.607c1.457,2.435,23.022,4.328,41.008,4.939s26.507-9.266,27.048-13.189.677-46.387.677-46.387l-23.831-38.137S1052.762,2649.834,1039.643,2652.674Z" transform="translate(-1018.515 -2647.807)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Hip Left -->
                    <!-- Hip Right -->
                    <svg id="backhipright" class="male-body-part" data-name="back hip right" xmlns="http://www.w3.org/2000/svg" width="68.733" height="97.739" viewBox="0 0 68.733 97.739">
                      <path id="hip_right_part" data-name="hip right part" d="M1121.266,2745.516c17.986-.611,39.551-2.5,41.008-4.937,0,0-.167-42.465-2.466-52.608s-5.544-32.458-18.662-35.3-23.774-4.868-23.774-4.868l-23.831,38.136s.136,42.466.677,46.387S1103.28,2746.127,1121.266,2745.516Z" transform="translate(-1093.541 -2647.804)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Hip Right -->
                    <!-- Hip Middle -->
                    <svg id="backhipmiddle" class="male-body-part" data-name="back hip middle" xmlns="http://www.w3.org/2000/svg" width="49.33" height="43.895" viewBox="0 0 49.33 43.895">
                      <path id="hip_middle_part" data-name="hip middle part" d="M1089.22,2640.572l-23.847,6.4,23.986,36.45.958,1.045.4-.522,23.986-36.814Z" transform="translate(-1065.373 -2640.572)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Hip Middle -->
                  </div>
                  </p>
                  <div class="body-main-link">
                    <a href="javascriptvoid:(0)" id="flip-card-btn-turn-to-front" class="back-body-link"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{trans(''.$selected_language->language.'.other_words.front_body_map')}}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="copy" class="hide-cls"></div>
      <div id="img-div"></div>


    </section>

    <!-- BODY SECTION END -->
    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script>
      document.querySelector('#nav-toggler').addEventListener('click', function(){
      document.querySelector('#nav-toggler').classList.toggle('nav-toggle');
      document.querySelector('.mobnav-bg').classList.toggle('menu-open');
      });
    </script>
    {{-- custom script --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>






{{-- custom scripts --}}
<script type="text/javascript">

    var selected_language = $("#selected_language").val();


    // flip script
        document.addEventListener('DOMContentLoaded', function(event) {

        document.getElementById('flip-card-btn-turn-to-back').style.visibility = 'visible';
        document.getElementById('flip-card-btn-turn-to-front').style.visibility = 'visible';

        document.getElementById('flip-card-btn-turn-to-back').onclick = function() {
        document.getElementById('flip-card').classList.toggle('do-flip');
        };

        document.getElementById('flip-card-btn-turn-to-front').onclick = function() {
        document.getElementById('flip-card').classList.toggle('do-flip');
        };

    });

    // pain css


    var total_pages=10;
    var body_part=null;
    var page_no= null;
    var pain_id=null;
    var pain_type_id=null;
    var severity_id=null;
    var check_var=0;
    var avatar=null;



    var is_saved=0;
    $(document).ready(function () {

        var png='';


        $('.form').addClass("hide-cls");
        $('.faq-2').addClass("hide-cls");
        $('.faq-3').addClass("hide-cls");
        $('#faqhead1').addClass('hide-cls');
        $('#save').addClass("hide-cls");
        $('#select-another').addClass("hide-cls");
        $('#pdf-buttn').addClass('hide-cls');

        $.ajax({

                type:'get',
                url:"{{route('severity')}}",
                data:{page_no:1,selected_language:selected_language},
                success:function(response){
                    console.log(response)
                    if(response.status){

                        severity_id=response.severity['id'];
                        $('#severity-english').html(response.severity['english']);
                        $('#severity-other').html(response.severity[selected_language]);
                        parseInt($('#page-number').text())
                        page_no=$('#page-number').text(response.severity['id']);
                    }else{
                        console.log(page_no)
                    }
                }
        })


        $('#save').on('click',function(e){

            e.preventDefault();


            if(body_part==null || $('.parent-category').val()==0 || $('.child-category').val()==0){
                alert("Please fill the form completely.")
            }


            else if(check_var==0){

                check_var=1;

                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                $.ajax({

                    type:"post",
                    url:"{{route('user-record')}}",
                    data:{pain_id:pain_id,pain_type_id:pain_type_id,severity_id:severity_id,body_part:body_part,avatar:avatar},
                    success:function(response){

                        console.log(response)
                        if(response.status){

                            is_saved=1;
                            $('.pdf-buttn').attr('data-attr',1);
                            $('#select-another').attr('data-attr',1);
                            $('#save').addClass("hide-cls");
                            $('#pdf-buttn').removeClass('hide-cls');
                            alert("Your record has been saved, now you can download");
                        }
                    },
                    complete:function(){
                        check_var=0;
                    }
                })
            }
        })

    });



    $('.parent-category').on('change',function(e){


        e.preventDefault();
        $('#save').removeClass("hide-cls");
        // $('#faqhead1').removeClass('hide-cls');
        var heading= $(".parent-category option:selected").text();
        pain_id=$(this).val();
        $('#faqhead1').children().html('<span class="no-item-green">1</span>'+heading+'')

        if(pain_id==0){

            $('.child-category').html('<option value="">Select pain type</option>');
            $('#category-translate').html('')
            $('#pain-type-translate').html('')
        }
        else{

            $('#category-translate').html('')
            $('#pain-type-translate').html('')

            $.ajax({

                type:'get',
                url:"{{route('get-pain-types')}}",
                data:{pain_id:pain_id,selected_language:selected_language},

                success:function(response){
                    console.log(response.category.english)
                    $('#category-translate').html(response.category.english)

                        $('#pain-types').html('<option value="0">Select pain type</option>')
                    if(response.status){
                        var array=response.pain_types;
                        console.log(array[0][selected_language])
                        for(var i=0;i<array.length;i++){
                            var words=array[i][selected_language];
                            var word= words.charAt(0).toUpperCase() + words.slice(1);

                            $('#pain-types').append('<option value="'+array[i].id+'">'+word+'</option>')

                        }
                    }
                }
            });
        }
})

$('.child-category').on('change',function(e){
    e.preventDefault();
      $('#save-buttn').removeClass("hide-cls")

        pain_type_id=$(this).val();


        if(pain_type_id==0){
            $('#pain-type-translate').html('')
        }
        else{

            $('#pain-type-translate').html('')

            $.ajax({
                type:'get',
                url:"{{route('pain-type-translate')}}",
                data:{pain_type_id:pain_type_id,selected_language:selected_language},
                success:function(response){

                    if(response.status){

                        $('#pain-type-translate').html(response.pain_type.english)
                    }

                }
            });
        }

})

$('.male-body-part').on('click',function(e){

    e.preventDefault();
    $('#pdf-buttn').removeClass("hide-cls");
    $("#select-another").removeClass("hide-cls");

  avatar=$(this).parent().prop('className');

    $('.form').removeClass("hide-cls")
    $('.male-body-part').removeClass('active');
    $(this).addClass('active');
    body_part=$(this).attr('data-name');

})

$('#pdf-buttn').on('click',function(e){
    e.preventDefault();

    if(body_part==null || $('.parent-category').val()==0 || $('.child-category').val()==0){
        alert("Please save record first.");
    }
    else if ($('.pdf-buttn').attr('data-attr')==1){
        $('.pdf-buttn').attr('data-attr',0);
        // $('.pdf-buttn').attr('data-attr',0);
        window.location.href = "/generate-pdf";
    }
    else{
        alert('please save record first.');
    }
})
$('#select-another').on('click',function(e){
    e.preventDefault();
    if($(this).attr('data-attr')==1){
        $('#faqhead1').removeClass('hide-cls');
        $('#faq1').removeClass('show');
        // $(".faq-1").click(function(event){event.stopPropagation();});
        // $('#faq1').stopPropagation();
    }
    else{
        alert("please fill the form and save record first");
    }
})

$('.page-btn').on('click',function(e){

    e.preventDefault();
    var val=$(this).attr('id');
    if(val=="increment"){
     page_no=parseInt($('#page-number').text())+1;
     if(page_no<=total_pages){
        $('#save').removeClass("hide-cls");
        $('#page-number').text(page_no);
     }

    }
    else{
         page_no=parseInt($('#page-number').text())-1;
        if(page_no>0){
            $('#save').removeClass("hide-cls");
            $('#page-number').text(page_no);
        }

    }

    $.ajax({
       type:"get",
       url:"{{route('severity')}}",
       data:{page_no:page_no,selected_language:selected_language},
       success:function(response){
        console.log(response)
        if(response.status){
            severity_id=response.severity['id'];
            $('#severity-english').html(response.severity['english']);
            $('#severity-other').html(response.severity[selected_language]);
        }
       }

    })

})




</script>



  </body>
</html>

@include('users.master')
  <body class="body-background">
    <!-- HEADER SECTION BEGIN -->

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
                  <div class="card">
                    <div class="card-header" id="faqhead1">
                      <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                        aria-expanded="true" aria-controls="faq1"><span class="no-item-green">1</span>Neurological, Arthritic & Muscle Pain</a>
                    </div>
                    <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                      <div class="card-body">
                        <div class="body-form-box">
                          <div class="body-flex-content">
                                  <div class="body-flex-inner">
                                      <label class="categort-label-text">{{trans(''.$selected_language->language.'.other_words.category')}} </label>

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
                              <label class="categort-label-text">Pain Type</label>
                              <p class="category-select-text extra-padding" id="pain-type-translate"> &nbsp;</p>
                            </div>
                            @endif
                          </div>
                          <div class="pagination-box">
                            <h4 class="pagination-heading">Pain Severity (Select pain severity from options)</h4>
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
                              <label class="categort-label-text">Pain Type (English)</label>
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
                <a href="javascriptvoid:(0)" class="selet-pain-buttn" id="select-another">{{trans(''.$selected_language->language.'.buttons.select_another')}}</a>
                <a href="javascriptvoid:(0)" class="pdf-buttn" id="pdf-buttn" data-attr="0"><img src="images/pdf.png" alt="image" class="img-fluid img-space">{{trans(''.$selected_language->language.'.buttons.download_pdf')}}<i class="fa fa-arrow-right pdf-right" aria-hidden="true"></i></a>
                {{-- <a href="" class="pdf-buttn" id="save">Save Your Analysis</a> --}}
              </div>
          </div>
          <div class="col-md-6 col-sm-12 col-12">
            <div id="selectedFemaleParts"></div>
            <div class="flip-card-3D-wrapper">
              <div id="flip-card">
                <div class="flip-card-front">
                  <p>
                  <div class="female-front-avatar">
                    <svg id="avatar-body" xmlns="http://www.w3.org/2000/svg" width="210.245" height="775.382" viewBox="0 0 210.245 775.382">
                      <path id="Path_7785" data-name="Path 7785" d="M206.789,241.92c-3.888-25.659-9.138-51.1-13.929-76.615-3.954-20.967-15.028-34.747-37.635-37.028a127.2,127.2,0,0,1-20.1-3.921c-9.942-2.641-16.865-16.9-12.436-25.79.968-1.952,4.151-3.347,6.562-3.9,6.923-1.559,13.945-2.773,20.983-3.675,5.463-.705,7.694-2.838,6.464-8.646-3.3-15.5-5.742-31.2-9.4-46.609C142.265,14.552,124.53-.033,105.122,0,85.714-.033,67.979,14.552,62.943,35.732c-3.658,15.405-6.1,31.105-9.4,46.609-1.23,5.808,1,7.94,6.464,8.646,7.038.9,14.06,2.116,20.983,3.675,2.412.558,5.594,1.952,6.562,3.9,4.43,8.892-2.494,23.149-12.436,25.79a127.2,127.2,0,0,1-20.1,3.921c-22.607,2.28-33.681,16.061-37.635,37.028-4.79,25.511-10.04,50.956-13.929,76.615-4.052,26.791-5.463,53.532.919,80.585,7.563,32.073,16.094,64.081,13.781,97.811-.87,12.583,6.841,22.46,17.489,29.891a21.022,21.022,0,0,1,7.826,11.418c4.282,18.916,7.366,38.111,11.5,57.059,2.838,12.911,2.773,25.3-1.526,37.914a114.379,114.379,0,0,0-3.232,63.868c4.348,18.637,9.122,37.192,12.649,55.977,3.658,19.539,6.365,39.276,8.843,59.012,1,7.99-2.149,14.749-9.22,19.785a26.147,26.147,0,0,0-7.891,10.122c-2.805,6.087-.492,9.663,6.07,9.86,10.09.279,20.212.148,30.3-.066,7.005-.148,10.828-4.3,10.483-11.025-.771-15.5-2.609-30.958-3.117-46.461-.591-17.439-.673-34.912-.1-52.351.82-25.1,4.561-50.284,3.117-75.2-1.559-27.037-4.577-53.713.738-80.667,2.018-10.254,1.837-20.934,2.658-31.417.115.016.246.049.377.066.131-.016.262-.049.377-.066.82,10.483.64,21.164,2.658,31.417,5.315,26.955,2.3,53.631.738,80.667-1.444,24.92,2.3,50.1,3.117,75.2.574,17.439.492,34.912-.1,52.351-.509,15.5-2.346,30.958-3.117,46.461-.345,6.726,3.478,10.877,10.483,11.025,10.09.213,20.212.345,30.3.066,6.562-.2,8.876-3.773,6.07-9.86a26.147,26.147,0,0,0-7.891-10.122c-7.071-5.036-10.221-11.8-9.22-19.785,2.477-19.736,5.184-39.472,8.843-59.012,3.527-18.785,8.3-37.34,12.649-55.977A114.379,114.379,0,0,0,156.8,556.6c-4.3-12.616-4.364-25-1.526-37.914,4.134-18.949,7.219-38.144,11.5-57.059a21.022,21.022,0,0,1,7.826-11.418c10.647-7.432,18.358-17.308,17.489-29.891-2.313-33.73,6.218-65.738,13.781-97.811,6.382-27.053,4.971-53.795.919-80.585M61.023,86.327c-1.394-.377-2.871-4.462-2.51-6.53C61.04,65.279,63.566,50.743,66.962,36.4,71.293,18.178,88.011,4.3,104.777,4.069h.689c16.767.23,33.484,14.109,37.815,32.336,3.4,14.339,5.923,28.874,8.449,43.393.361,2.067-1.116,6.152-2.51,6.53-6.694,1.854-13.65,2.756-19.884,3.872,1.526-14.142,2.986-26.725,4.2-39.325.607-6.365-2.756-8.6-8.941-8.449-6.48.148-12.977.164-19.474.131-6.5.033-12.993.016-19.474-.131-6.185-.148-9.548,2.084-8.941,8.449,1.214,12.6,2.674,25.183,4.2,39.325-6.234-1.116-13.19-2.018-19.884-3.872M81.137,51.186c.148-1.706,3.921-4.183,6.2-4.43,5.873-.623,11.845-.2,17.784-.2s11.911-.427,17.784.2c2.28.246,6.054,2.723,6.2,4.43,1.329,15.9-.705,31.138-12.452,43.262-3.773,3.888-7.645,5.791-11.533,5.758-3.888.033-7.76-1.87-11.533-5.758C81.842,82.324,79.808,67.083,81.137,51.186M190.4,372.805c-4.118,14.732-1.345,29.317-1.87,43.967-.459,13.076-5.545,23.428-18.112,30.269-.345-1.919-.87-3-.656-3.937,8.925-40.325,6.415-81.537,9.253-122.322.8-11.435,2.707-23.2.935-34.3-4.955-30.991-11.533-61.735-17.587-92.545-.509-2.576-1.936-4.955-2.937-7.432l-2.592.345c-1,6.89-1.969,13.781-3.035,20.655-1.46,9.384-8.482,16.258-17.308,17.062-8.974.82-15.848-3.806-19.474-13.01-.689-1.739-1.772-3.314-3.33-6.185-3.232,18.046,11.008,25.216,36.733,19.949a49.322,49.322,0,0,1-.033,6.431c-1.772,12.993-3.445,26-5.529,38.947-1.444,8.876.18,16.685,5.627,23.936,10.713,14.289,16.652,30.613,20.015,48.02,5.512,28.464,1.854,56.7-2.658,84.736-5.66,35.059-12.583,69.905-18.965,104.849v12.5c7.448,22.246,13.338,44.87,8.3,68.839-2.412,11.5-4.938,22.984-7.35,34.485-4.922,23.51-10.647,46.9-14.4,70.61-2.3,14.519-5.053,30.433,10.713,40.9.952.623.9,2.756,1.312,4.2-1.394.361-2.838,1.165-4.2,1.034-9.565-.9-19.129-1.969-27.693-2.887,0-13.633-1.673-26.873.345-39.522,4.069-25.281.41-50.07-1.28-75.106-1.394-20.638-1.28-41.408-1.116-62.112.131-17.948,3.855-36.257,1.427-53.778-6.169-44.575-5.676-89.379-7.809-134.1-.279-5.873,1.559-9.876,6.989-12.55,3.15-1.559,5.791-4.1,8.662-6.2-.427-.689-.853-1.378-1.3-2.084-5.43,2.641-10.861,7.3-16.307,7.333h-.1c-5.447-.033-10.877-4.692-16.307-7.333-.443.705-.87,1.395-1.3,2.084,2.871,2.1,5.512,4.643,8.662,6.2,5.43,2.674,7.268,6.677,6.989,12.55-2.133,44.722-1.641,89.526-7.809,134.1-2.428,17.521,1.3,35.83,1.427,53.778.164,20.7.279,41.474-1.116,62.112-1.69,25.035-5.348,49.824-1.28,75.106,2.018,12.649.345,25.888.345,39.522-8.564.919-18.128,1.985-27.693,2.887-1.362.131-2.805-.673-4.2-1.034.41-1.444.361-3.576,1.312-4.2,15.766-10.467,13.01-26.38,10.713-40.9-3.757-23.706-9.483-47.1-14.4-70.61-2.412-11.5-4.938-22.984-7.35-34.485-4.891-23.275.522-45.28,7.658-66.9q.32-.967.643-1.934l.08.011c.43-2.9.8-5.964,1.093-8.734a16.243,16.243,0,0,1-1.173-3.778q-.492-2.7-.989-5.394c-6.1-33.136-12.608-66.2-17.976-99.455-4.512-28.038-8.17-56.272-2.658-84.736,3.363-17.407,9.3-33.73,20.015-48.02,5.447-7.251,7.071-15.061,5.627-23.936-2.084-12.944-3.757-25.954-5.529-38.947a49.32,49.32,0,0,1-.033-6.431c25.724,5.266,39.965-1.9,36.733-19.949-1.559,2.871-2.641,4.446-3.33,6.185-3.626,9.2-10.5,13.83-19.474,13.01-8.826-.8-15.848-7.678-17.308-17.062-1.066-6.874-2.034-13.764-3.035-20.655l-2.592-.345c-1,2.477-2.428,4.856-2.937,7.432-6.054,30.81-12.632,61.555-17.587,92.545-1.772,11.107.131,22.87.935,34.3,2.838,40.785.328,82,9.253,122.322.213.935-.312,2.018-.656,3.937C27.26,440.2,22.174,429.848,21.715,416.773c-.525-14.65,2.248-29.235-1.87-43.967-4.61-16.553-6.841-33.763-11.222-50.4-7.054-26.873-4.955-53.778-.9-80.569,3.872-25.642,9.056-51.1,14.093-76.549a58.745,58.745,0,0,1,6.267-16.783c6.333-11.468,13.584-14.5,26.561-12.255C65.4,138.1,76.149,140.04,86.9,141.877c.443.066.968-.394,3.019-1.329-10.155-5.709-20.835-5.217-31.647-8.58,18.637-2.887,37.044-5.119,33.78-29.4H118.2c-3.265,24.281,15.143,26.512,33.78,29.4-10.811,3.363-21.492,2.871-31.647,8.58,2.051.935,2.576,1.394,3.019,1.329,10.746-1.837,21.492-3.773,32.254-5.627,12.977-2.248,20.228.787,26.561,12.255a58.745,58.745,0,0,1,6.267,16.783c5.037,25.445,10.221,50.907,14.093,76.549,4.052,26.791,6.152,53.7-.9,80.569-4.38,16.635-6.612,33.845-11.222,50.4m-16.717-43.311c-6.612-12.206-14.913-26.758-22.345-41.736-2.149-4.315-2.756-9.975-2.362-14.88.869-11.123,2.773-22.181,4.348-33.238,1.739-12.206,3.593-24.379,5.676-38.57,13.748,39.9,18.686,86.984,14.683,128.425m-137.12,0c-4-41.441.935-88.526,14.683-128.425,2.084,14.191,3.937,26.364,5.676,38.57C58.5,250.7,60.4,261.754,61.269,272.878c.394,4.905-.213,10.565-2.362,14.88-7.432,14.978-15.733,29.53-22.345,41.736" transform="translate(0)" fill="#6f6c6c"/>
                    </svg>
                    <!-- Head Left -->
                    <svg id="femaleLeftHead" class="female-body-part" data-name="Left Head" xmlns="http://www.w3.org/2000/svg" width="21.158" height="47.244" viewBox="0 0 21.158 47.244">
                      <path id="Left_1" data-name="Left 1" d="M55.737,30.445c-2,.217-5.317,2.392-5.447,3.891-.876,10.485,4.847,29.781,4.847,29.781a66.79,66.79,0,0,0,6.089,8.215c3.314,3.416,6.715,5.087,10.131,5.058V30.273c-5.217,0-10.462-.376-15.62.172" transform="translate(-50.199 -30.147)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Head Right -->
                    <svg id="femaleRightHead" class="female-body-part" data-name="Left Head" xmlns="http://www.w3.org/2000/svg" width="21.378" height="47.243" viewBox="0 0 21.378 47.243">
                      <path id="Right_1" data-name="Right 1" d="M85.708,34.337c-.13-1.5-3.444-3.675-5.447-3.893-5.158-.545-10.4-.171-15.62-.171V77.39c3.416.028,6.817-1.642,10.131-5.058,10.316-10.647,12.1-24.034,10.936-38" transform="translate(-64.641 -30.147)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Neck -->
                    <svg id="femaleNeck" class="female-body-part" data-name="Neck" xmlns="http://www.w3.org/2000/svg" width="76.218" height="31.036" viewBox="0 0 76.218 31.036">
                      <path id="Neck_" data-name="Neck " d="M94.251,81.4c-4.169-4.169-5.79-16.329-5.79-16.329H69.451S67.83,77.236,63.661,81.4s-22.814,8.917-22.814,8.917,22.947,5.791,38.109,5.791,38.109-5.791,38.109-5.791S98.42,85.573,94.251,81.4" transform="translate(-40.847 -65.076)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Shoulder Chest -->
                    <svg id="femaleLeftShoulderChest" class="female-body-part " data-name="Female Left Shoulder Chest" xmlns="http://www.w3.org/2000/svg" width="81.343" height="78.487" viewBox="0 0 81.343 78.487">
                      <path id="Breast_left" data-name="Breast left" d="M13.633,117.64s14.532,1.388,21,14.514l13.587-10.5s-6.175,26.558,10.191,41.072,36.565-31.069,36.565-31.069V97.567S56.867,89.538,43.9,87.376,18.266,95.4,13.633,117.64" transform="translate(-13.633 -87.092)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Shoulder Chest -->
                    <svg id="femaleRightShoulderChest" class="female-body-part" data-name="Female Right Shoulder Chest" xmlns="http://www.w3.org/2000/svg" width="81.343" height="78.487" viewBox="0 0 81.343 78.487">
                      <path id="Breast_right" data-name="Breast right" d="M145.419,117.64s-14.532,1.388-21,14.514l-13.587-10.5s6.175,26.558-10.191,41.072-36.565-31.069-36.565-31.069V97.567s38.109-8.029,51.079-10.191,25.631,8.029,30.264,30.264" transform="translate(-64.076 -87.092)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Arm 1 -->
                    <svg id="femaleLeftArm1" class="female-body-part" data-name="Left Arm 1" xmlns="http://www.w3.org/2000/svg" width="30.324" height="86.629" viewBox="0 0 30.324 86.629">
                      <path id="Hand_left_1" data-name="Hand left 1" d="M18.072,109.847s3.795-5.391,18.957,9.5c0,0-12.754,54.986-11.8,76.182L6.7,183.654Z" transform="translate(-6.704 -108.896)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Arm 2 -->
                    <svg id="femaleLeftArm2" class="female-body-part" data-name="Left Arm 2" xmlns="http://www.w3.org/2000/svg" width="19.918" height="133.563" viewBox="0 0 19.918 133.563">
                      <path id="Hand_Left_2" data-name="Hand Left 2" d="M23.406,169.762,6.884,157.1s-1.852,37.676,1.854,63.615,8.956,44.471,9.573,53.736,8.029,16.212,8.029,16.212-6.485-102.372-2.933-120.9" transform="translate(-6.421 -157.1)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Arm 3 -->
                    <svg id="femaleLeftArm3" class="female-body-part" data-name="Left Arm 3" xmlns="http://www.w3.org/2000/svg" width="13.51" height="42.922" viewBox="0 0 13.51 42.922">
                      <path id="Hand_left_3" data-name="Hand left 3" d="M16.033,243.432s-2.779,17.37,0,24.551,12.275,18.064,12.275,18.064l-1.621-15.981-2.779-22.929s-4.512-5.327-7.875-3.706" transform="translate(-14.798 -243.125)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Lower Rib -->
                    <svg id="femaleLeftLowerRib" class="female-body-part" data-name="Left Lower Rib" xmlns="http://www.w3.org/2000/svg" width="46.841" height="82.737" viewBox="0 0 46.841 82.737">
                      <path id="Chest_lower_left" data-name="Chest lower left" d="M13.167,93.374C8.49,104.323-3.707,117.433,1.1,131.023c5.467,15.442,45.738,45.088,45.738,45.088V96.645a160.06,160.06,0,0,1-33.675-3.271" transform="translate(0 -93.374)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Lower Rib -->
                    <!-- Right Lower Rib -->
                    <svg id="femaleRightLowerRib" class="female-body-part" data-name="Right Lower Rib" xmlns="http://www.w3.org/2000/svg" width="46.841" height="85.187" viewBox="0 0 46.841 85.187">
                      <path id="Chest_lower_right" data-name="Chest lower right" d="M95.225,90.231a109.764,109.764,0,0,1-32.756,5.68v79.507s40.272-29.647,45.738-45.088c5.175-14.62-9.328-28.683-12.982-40.1" transform="translate(-62.469 -90.231)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Lower Rib -->
                    <!-- Left Upper Rib -->
                    <svg id="femaleLeftUpperRib" class="female-body-part" data-name="Left Upper Rib" xmlns="http://www.w3.org/2000/svg" width="40.54" height="73.722" viewBox="0 0 40.54 73.722">
                      <path id="Chest_uppar_left" data-name="Chest uppar left" d="M8.085,20.614s10.769,33.737,8.3,45.472a23.568,23.568,0,0,1-1.434,4.35,160.053,160.053,0,0,0,33.675,3.271V0s-7.3,27.33-40.54,20.614" transform="translate(-8.085)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Upper Rib -->
                    <!-- Right Upper Rib -->
                    <svg id="femaleRightUpperRib" class="female-body-part" data-name="Right Upper Rib" xmlns="http://www.w3.org/2000/svg" width="40.54" height="73.666" viewBox="0 0 40.54 73.666">
                      <path id="Chest_uppar_right" data-name="Chest uppar right" d="M94.71,66.086c-2.469-11.735,8.3-45.472,8.3-45.472C69.773,27.33,62.469,0,62.469,0V73.666a109.764,109.764,0,0,0,32.756-5.68,19.52,19.52,0,0,1-.515-1.9" transform="translate(-62.469)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Upper Rib -->
                    <!-- Right Arm 1 -->
                    <svg id="femaleRightArm1" class="female-body-part" data-name="Right Arm 1" xmlns="http://www.w3.org/2000/svg" width="33.043" height="87.993" viewBox="0 0 33.043 87.993">
                      <path id="Hand_right_1" data-name="Hand right 1" d="M121.5,108.065s-9.65.7-20.072,13.2c0,0,15.471,53.594,14.514,74.791l18.529-11.87s-3.1-50.226-12.97-76.123" transform="translate(-101.423 -108.065)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Arm 1 -->
                    <!-- Right Arm 2 -->
                    <svg id="femaleRightArm2" class="female-body-part" data-name="Right Arm 2" xmlns="http://www.w3.org/2000/svg" width="19.918" height="133.563" viewBox="0 0 19.918 133.563">
                      <path id="Hand_right_2" data-name="Hand right 2" d="M112.638,169.762,129.161,157.1s1.852,37.676-1.854,63.615-8.956,44.471-9.573,53.736-8.029,16.212-8.029,16.212,6.485-102.372,2.933-120.9" transform="translate(-109.705 -157.1)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Arm 2 -->
                    <!-- Right Arm 3 -->
                    <svg id="femaleRightArm3" class="female-body-part" data-name="Right Arm 3" xmlns="http://www.w3.org/2000/svg" width="13.51" height="42.922" viewBox="0 0 13.51 42.922">
                      <path id="Hand_wright_3" data-name="Hand wright 3" d="M117.51,243.432s2.779,17.37,0,24.551-12.275,18.064-12.275,18.064l1.621-15.981,2.779-22.929s4.512-5.327,7.875-3.706" transform="translate(-105.235 -243.125)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Arm 3 -->
                    <!-- Left Thigh -->
                    <svg id="femaleLeftThigh" class="female-body-part" data-name="Left Thigh" xmlns="http://www.w3.org/2000/svg" width="52.74" height="183.438" viewBox="0 0 52.74 183.438">
                      <path id="Leg_uppar_left" data-name="Leg uppar left" d="M37.771,200.84s-26.686,9.2,7.1,172.513c0,0,16.2,19.41,29.122,6.484,0,0,11.735-112.1,3.7-117.195s-40.613-38.606-39.922-61.8" transform="translate(-27.763 -200.84)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Thigh -->
                    <svg id="femaleRightThigh" class="female-body-part" data-name="Right Thigh" xmlns="http://www.w3.org/2000/svg" width="52.74" height="183.438" viewBox="0 0 52.74 183.438">
                      <path id="Leg_uppar_right" data-name="Leg uppar right" d="M109.878,200.84s26.686,9.2-7.1,172.513c0,0-16.2,19.41-29.122,6.484,0,0-11.735-112.1-3.7-117.195s40.613-38.606,39.922-61.8" transform="translate(-67.146 -200.84)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Urinal -->
                    <svg id="femaleUrinal" class="female-body-part" data-name="Urinal" xmlns="http://www.w3.org/2000/svg" width="57.653" height="24.782" viewBox="0 0 57.653 24.782">
                      <path id="vagina" d="M93.736,217.053l-18.4,11.581-18.4-11.581-10.423,7.256c9.033,12.585,28.827,17.526,28.827,17.526s19.794-4.941,28.827-17.526Z" transform="translate(-46.505 -217.053)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Knee -->
                    <svg id="femaleLeftKnee" class="female-body-part" data-name="Left Knee" xmlns="http://www.w3.org/2000/svg" width="31.152" height="38.911" viewBox="0 0 31.152 38.911">
                      <path id="Knee_left" data-name="Knee left" d="M38.743,309.8s8.8,10.191,16.212,11.117,13.666-6.446,13.666-6.446-4.116,28.218-1.39,34.241c0,0-16.908-7.181-26.636,0,0,0-5.558-26.868-1.852-38.911" transform="translate(-37.469 -309.805)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Knee -->
                    <svg id="femaleRightKnee" class="female-body-part" data-name="Right Knee" xmlns="http://www.w3.org/2000/svg" width="31.152" height="38.911" viewBox="0 0 31.152 38.911">
                      <path id="Knee_right" data-name="Knee right" d="M101.089,309.8S92.288,320,84.877,320.922s-13.666-6.446-13.666-6.446,4.116,28.218,1.39,34.241c0,0,16.908-7.181,26.636,0,0,0,5.558-26.868,1.852-38.911" transform="translate(-71.211 -309.805)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Leg -->
                    <svg id="femaleLeftLeg" class="female-body-part" data-name="Left Leg" xmlns="http://www.w3.org/2000/svg" width="31.84" height="181.56" viewBox="0 0 31.84 181.56">
                      <path id="leg_lower_left" data-name="leg lower left" d="M67.455,341.647s-12.352-12.97-25.322-2.162-4.505,82.762,7.32,129.7l7.5,47.557h10.5s-10.5-157.5,0-175.1" transform="translate(-35.615 -335.184)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Leg -->
                    <svg id="femaleRightLeg" class="female-body-part" data-name="Right Leg" xmlns="http://www.w3.org/2000/svg" width="31.84" height="181.56" viewBox="0 0 31.84 181.56">
                      <path id="Leg_lower_right" data-name="Leg lower right" d="M72.246,341.647s12.352-12.97,25.322-2.162,4.505,82.762-7.32,129.7l-7.5,47.557h-10.5s10.5-157.5,0-175.1" transform="translate(-72.246 -335.184)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Left Foot -->
                    <svg id="femaleLeftFoot" class="female-body-part" data-name="Left Foot" xmlns="http://www.w3.org/2000/svg" width="25.014" height="26.093" viewBox="0 0 25.014 26.093">
                      <path id="Foot_left" data-name="Foot left" d="M55.371,449.011S49.5,467.54,45.026,470.319s-5.25,4.169-5.25,4.169l25.014-1.235V448.394Z" transform="translate(-39.776 -448.394)" fill="#f7f7f7"/>
                    </svg>
                    <!-- Right Foot -->
                    <svg id="femaleRightFoot" class="female-body-part" data-name="Right Foot" xmlns="http://www.w3.org/2000/svg" width="25.014" height="26.093" viewBox="0 0 25.014 26.093">
                      <path id="Foot_right" data-name="Foot right" d="M81.666,449.011s5.867,18.529,10.345,21.308,5.25,4.169,5.25,4.169l-25.014-1.235V448.394Z" transform="translate(-72.247 -448.394)" fill="#f7f7f7"/>
                    </svg>
                  </div>
                  <div class="body-main-link">
                    <a href="javascriptvoid:(0)" id="flip-card-btn-turn-to-back" class="back-body-link">{{trans(''.$selected_language->language.'.other_words.back_body_map')}} <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                  </div>
                  </p>
                </div>
                <div class="flip-card-back">
                  <p>
                  <div class="female-back-avatar">
                    <svg id="avatar-female-back-body" xmlns="http://www.w3.org/2000/svg" width="209.131" height="775.376" viewBox="0 0 209.131 775.376">
                      <path id="Female_back_outline" data-name="Female back outline" d="M471.958,1022.457c-4.393-31.049-9.87-61.948-14.932-92.911-.669-4.039-1.59-8.028-2.524-12.016-4.355-18.491-14.44-30.848-34.5-33.209-7.3-.846-14.5-2.676-21.685-4.329-10.956-2.524-17.8-17.974-12.13-27.642.871-1.477,3.458-2.385,5.39-2.726,6.7-1.212,13.455-2.247,20.246-3.017,6.147-.707,8.507-3.181,7.031-9.769-3.269-14.654-5.768-29.473-8.785-44.165-4.228-20.625-21.016-35.872-40.567-37.084-.353-.013-.694-.025-1.035-.05h-.038c-.341.025-.682.038-1.035.05-19.552,1.212-36.339,16.459-40.567,37.084-3.017,14.692-5.516,29.51-8.785,44.165-1.477,6.589.884,9.063,7.031,9.769,6.791.77,13.543,1.8,20.246,3.017,1.931.341,4.531,1.25,5.39,2.726,5.68,9.669-1.174,25.118-12.13,27.642-7.169,1.654-14.389,3.484-21.685,4.329-20.056,2.36-30.141,14.717-34.5,33.209-.934,3.989-1.855,7.977-2.524,12.016-5.061,30.963-10.539,61.862-14.932,92.911-3.963,28.21,4.077,55.285,9.757,82.536,4.254,20.5,9.631,40.58,7.03,62.252-1.893,15.752,4.733,29.876,19.4,39.015,2.954,1.843,5.44,5.97,6.235,9.492,4.355,19.16,7.914,38.522,12.142,57.721,2.9,13.127,2.764,25.812-1.755,38.661-7.371,20.877-7.838,42.309-3.055,63.8,5.705,25.585,12.95,50.917,17.116,76.73,3.522,21.786,12.193,45.389-9.77,63.981-1.893,1.616-1.8,7.726-.3,10.514,1.186,2.221,5.831,3.37,9.037,3.622,5.415.429,10.893-.341,16.346-.429,12.8-.177,17.128-4.834,16.6-17.632-.3-7.3-.252-14.6-.328-21.913-.038-5.415.959-11.019-.2-16.169-4.392-19.286-3.206-38.5-.4-57.8,3.9-27.024,6.677-53.947,2.764-81.45-2.411-16.838-2.461-34.218-1.679-51.258.606-13.24,2.562-26.418,4.3-39.026a.274.274,0,0,1,.543,0c1.742,12.608,3.7,25.786,4.3,39.026.783,17.04.745,34.42-1.666,51.258-3.925,27.5-1.149,54.426,2.752,81.45,2.8,19.3,4,38.51-.391,57.8-1.174,5.15-.164,10.754-.215,16.169-.063,7.308-.025,14.616-.328,21.913-.53,12.8,3.8,17.455,16.6,17.632,5.465.088,10.931.858,16.346.429,3.206-.252,7.851-1.4,9.05-3.622,1.489-2.788,1.59-8.9-.316-10.514-21.962-18.592-13.291-42.2-9.769-63.981,4.165-25.812,11.41-51.145,17.116-76.73,4.784-21.5,4.329-42.928-3.055-63.8-4.519-12.849-4.658-25.535-1.755-38.661,4.228-19.2,7.788-38.561,12.155-57.721.783-3.521,3.269-7.649,6.223-9.492,14.667-9.139,21.293-23.263,19.413-39.015-2.613-21.672,2.764-41.754,7.031-62.252C467.881,1077.742,475.922,1050.667,471.958,1022.457ZM320.733,842.832a.285.285,0,0,1-.252-.341c5.263-21.609,9.164-41.476,15.172-60.687,2.928-9.366,11.2-15.967,20.965-19.489a32.285,32.285,0,0,1,23.666,0c9.769,3.522,18.037,10.123,20.965,19.489,6.008,19.211,9.908,39.078,15.172,60.687a.285.285,0,0,1-.252.341c-16.5,1.123-30.709,2.878-44.922,2.84-.934,0-1.855-.013-2.777-.013h-.038c-.921,0-1.843.013-2.764.013C351.443,845.71,337.23,843.956,320.733,842.832Zm129.742,332.227a14.1,14.1,0,0,1-.606,4.846c-2.575,9.555-7.485,17.243-17.532,22.4a.282.282,0,0,1-.4-.291c.278-2.549.454-4.026.581-5.5,2.373-25.788,4.973-51.55,6.993-77.387,1.035-13.253.985-26.62,1.439-39.936.467-13.619,2.954-27.554.972-40.795-4.481-29.674-11.145-59-17.015-88.43a52.413,52.413,0,0,0-2.7-7.725.214.214,0,0,0-.114-.139,24.132,24.132,0,0,0-4.064-3.875.236.236,0,0,0-.353.278,14.818,14.818,0,0,1,.934,7.283c-4.292,30.053-8.583,60.094-12.9,90.437l-.139.139c-1.161-.076-2.272-.125-3.357-.189l-4.96-.265-3.345-.189-14.894-.82a124.4,124.4,0,0,1,13.556,2.726,1.369,1.369,0,0,1,.215.063c8.066,2.12,17.052,5.579,19.009,10.628.038.076.114.076.139.151a47.767,47.767,0,0,1,3.092,4.154c14.528,21.633,20.46,45.956,20.422,71.44-.05,38.674-7.4,76.54-15.172,114.28-3.572,17.242-6.829,34.56-10.338,52.432,0,0-.265,3.509,1.565,10.6,1.048,3.118,2.07,6.248,3.042,9.392v.011c.3.972.606,1.944.884,2.928,4.948,16.661,8.066,33.664,4.317,51.359-5.718,26.986-13.026,53.669-17.532,80.832-4.09,24.651-15.639,51.069,8.911,72.64,1.136.984,1.363,4.8.4,5.844a5.308,5.308,0,0,1-3.269,1.262,50.044,50.044,0,0,1-21.521.707.017.017,0,0,0-.025,0c-.164-.038-.316-.062-.467-.087a15.563,15.563,0,0,1-1.717-.405,4.411,4.411,0,0,1-.442-.114c-.227-.063-.353-.1-.353-.1-7.434-2.31-6.362-8.457-6.311-14.211.063-8.13-.1-16.233-.063-24.362.038-4.089-.278-8.305.568-12.231,4.329-20.132,3.13-40.163.038-60.27-3.913-25.459-5.276-50.892-2.575-76.69,1.956-18.592,1.982-37.476,1.489-56.195-.4-15.209-3.421-30.343-4.3-45.578-1.464-25.332-2.2-50.728-3.118-76.086-.227-5.92-.063-11.865-.05-18.453a.266.266,0,0,1,.391-.24,62.481,62.481,0,0,0,24.966,6.765l.618.038c.215,0,.442.013.682.025a100.69,100.69,0,0,0,35.872-4.355s-8.52.517-18.075.694c-7.548.139-15.74.076-20.864-.618h-.013c-.53,0-1.06,0-1.6-.013a43.6,43.6,0,0,1-6.059-.492h-.013c-11.5-1.792-15.929-8.558-16.068-22.341-.025-3.471-.492-6.955-.77-10.426v-.316a.778.778,0,0,0-.013.164c-.013-.051-.013-.1-.025-.164v.316c-.278,3.471-.732,6.955-.77,10.426-.139,13.758-4.557,20.523-16,22.328a42.756,42.756,0,0,1-6.134.5c-.353.013-.707.013-1.06.013h-.038c-5.238.707-13.695.757-21.382.606-9.34-.189-17.557-.682-17.557-.682a100.815,100.815,0,0,0,37.071,4.279,3.088,3.088,0,0,0,.353-.025c.417-.038.846-.063,1.262-.1l.732-.076c.316-.025.631-.063.934-.1a1.109,1.109,0,0,0,.2-.025c.177-.013.353-.038.518-.063.215-.025.379-.051.518-.062.088-.014.189-.025.278-.039a.2.2,0,0,1,.05-.013l.038-.012a61.941,61.941,0,0,0,19.665-6.235.266.266,0,0,1,.391.24c.013,6.589.177,12.534-.05,18.453-.921,25.358-1.654,50.753-3.118,76.086-.884,15.235-3.9,30.369-4.3,45.578-.492,18.719-.454,37.6,1.489,56.195,2.7,25.8,1.351,51.232-2.575,76.69-3.092,20.107-4.292,40.138.038,60.27.846,3.925.543,8.141.568,12.231.038,8.129-.126,16.232-.063,24.362.05,5.754,1.136,11.9-6.311,14.211-5.945,2.259-19.854.694-21.117.543a.525.525,0,0,0-.088-.013c-2.752-.581-5.44-.492-6.589-1.792-.959-1.048-.719-4.859.4-5.844,24.563-21.571,13-47.989,8.924-72.64-4.506-27.163-11.827-53.846-17.545-80.832-3.686-17.469-.707-34.269,4.127-50.716.126-.428.252-.871.391-1.325a3.479,3.479,0,0,0,.1-.341c.177-.606.366-1.212.555-1.818.013-.063.038-.125.05-.189,4.582-15.8,3.6-24.6,3.433-25.774-.013-.088-.025-.139-.025-.139v-.013c-3.067-15.752-6-31.114-9.151-46.411-7.788-37.74-15.134-75.606-15.184-114.28-.025-25.484,5.907-49.807,20.422-71.44a47.387,47.387,0,0,1,3.017-4.053v-.013c.985-2.865,4.228-5.226,8.318-7.131.088-.051.177-.088.278-.138.278-.127.568-.241.846-.367.2-.088.391-.177.593-.264s.379-.14.555-.216c.316-.125.631-.252.947-.379.063-.025.139-.05.2-.076,2.474-.921,5.074-1.7,7.586-2.36a124.4,124.4,0,0,1,13.556-2.726l-18.239,1.01-8.065.442a.285.285,0,0,1-.29-.24c-4.493-31.53-8.949-62.732-13.392-93.959v-.025l-.215-3.042a.28.28,0,0,0-.5-.139l-2.272,3.08a.271.271,0,0,0-.038.063c-.959,2.625-2.221,5.164-2.764,7.876-5.869,29.435-12.534,58.756-17.015,88.43-1.982,13.241.518,27.175.972,40.795.454,13.316.4,26.683,1.439,39.936,2.02,25.837,4.62,51.6,7.005,77.387.114,1.475.3,2.952.581,5.5a.293.293,0,0,1-.417.291c-10.035-5.161-14.957-12.849-17.532-22.4a14.412,14.412,0,0,1-.606-4.846,148.49,148.49,0,0,0,.189-25.17c-2.045-27.843-10.615-54.742-15.424-82.17-.48-2.714-.934-5.39-1.452-8.065-.3-1.54-.618-3.08-.871-4.594-.063-.328-.114-.682-.164-1.06a25.744,25.744,0,0,1-.328-3.874c0-.077-.013-.14-.013-.216-.252-5.453,0-11.877,0-11.877.656-9.833.518-19.047,2.007-27.982q7.687-46.028,16.383-91.877c3.231-17.015,12.988-27.819,31.214-29.75,6.753-.719,13.392-2.55,20.056-4.052,12.572-2.853,17.444-8.57,18.441-21.483.29-3.673.391-7.333.593-11.36a.278.278,0,0,1,.278-.265h22.227a.278.278,0,0,1,.278.265c.2,4.026.3,7.687.593,11.36,1,12.912,5.869,18.63,18.441,21.483,6.664,1.5,13.3,3.332,20.056,4.052,18.226,1.931,27.983,12.736,31.214,29.75q8.747,45.837,16.383,91.877c1.452,8.594,1.363,17.455,1.931,26.884.013.265.038.53.05.808a.228.228,0,0,1-.025.126c.063,2.411.215,8.9.05,11.638a.215.215,0,0,1-.013.088,48.89,48.89,0,0,1-1.363,10.06c-.517,2.676-.972,5.352-1.451,8.065C459.475,1103.314,446.878,1138.037,450.476,1175.059Zm-15.21-90.577a.288.288,0,0,1-.543.051c-3.509-8.495-5.794-19.11-11.966-26.443-12.206-14.515-12.963-29.611-9.479-46.942,3.408-16.787,5.074-33.939,7.434-50.93a.277.277,0,0,1,.543-.038C432.275,1001.555,444.076,1042.513,435.266,1084.482ZM315.647,960.18a.277.277,0,0,1,.543.038c2.36,16.99,4.026,34.143,7.434,50.93,3.484,17.33,2.739,32.426-9.479,46.942-6.172,7.333-8.457,17.949-11.966,26.443a.288.288,0,0,1-.543-.051C292.826,1042.513,304.628,1001.555,315.647,960.18Z" transform="translate(-263.886 -755.538)" fill="#474747"/>
                    </svg>
                    <!-- Back Arm Left Upper -->
                    <svg id="femalebackarmleftupper" class="female-body-part" data-name="female back arm left upper" xmlns="http://www.w3.org/2000/svg" width="82.85" height="53.196" viewBox="0 0 82.85 53.196">
                      <path id="Arm_left_uppar" data-name="Arm left uppar" d="M363.941,867.36h-54.18s-26.506-3.881-28.67,53.14c0,0,14.171-4.106,39.219-17.378,19.27-10.21,43.631,12.442,43.631,12.442Z" transform="translate(-281.091 -867.304)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Arm Left Upper -->
                    <!-- Back Arm Lower Right -->
                    <svg id="femalebackarmlowerright" class="female-body-part" data-name="female back arm lower right" xmlns="http://www.w3.org/2000/svg" width="29.031" height="109.042" viewBox="0 0 29.031 109.042">
                      <path id="arm_lower_right" data-name="arm lower right" d="M402.016,1087.094l11.3,1.616a369.841,369.841,0,0,1,5.958-40.869c3-15.337,9.744-35.431,11.524-49.757.1-.808.189-1.6.252-2.373V979.668L420.015,980l-12.635.365.669,6.627c0,7.84-1.893,48.822-1.893,50.715C406.156,1039.37,404.073,1063.491,402.016,1087.094Z" transform="translate(-402.016 -979.668)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Arm Lower Right -->
                    <!-- Back Arm Lower Left -->
                    <svg id="femalebackarmlowerleft" class="female-body-part" data-name="female back arm lower left" xmlns="http://www.w3.org/2000/svg" width="29.031" height="109.042" viewBox="0 0 29.031 109.042">
                      <path id="Arm_lower_uppar" data-name="Arm lower uppar" d="M297.475,1087.094l-11.3,1.616a369.841,369.841,0,0,0-5.958-40.869c-3-15.337-9.744-35.431-11.524-49.757-.1-.808-.189-1.6-.252-2.373V979.668l11.032.329,12.635.365-.669,6.627c0,7.84,1.893,48.822,1.893,50.715C293.335,1039.37,295.417,1063.491,297.475,1087.094Z" transform="translate(-268.444 -979.668)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Arm Lower Left -->
                    <!-- Back Arm Middle Left -->
                    <svg id="femalebackarmmiddleleft" class="female-body-part" data-name="female back arm middle left" xmlns="http://www.w3.org/2000/svg" width="41.54" height="94.227" viewBox="0 0 41.54 94.227">
                      <path id="Arm_middle_left" data-name="Arm middle left" d="M283.088,915.974,310.63,903.9S292.3,981.276,292.622,998.13l-23.531-1.42Z" transform="translate(-269.091 -903.904)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Arm Middle Left -->
                    <!-- Back Arm Middle Right -->
                    <svg id="femalebackarmmiddleright" class="female-body-part" data-name="female back arm middle right" xmlns="http://www.w3.org/2000/svg" width="41.538" height="94.227" viewBox="0 0 41.538 94.227">
                      <path id="arm_midle_right" data-name="arm midle right" d="M419,915.974,391.46,903.9s18.333,77.372,18.007,94.226L433,996.71Z" transform="translate(-391.46 -903.904)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Arm Middle Right -->
                    <!-- Back Arm Right Upper -->
                    <svg id="femalebackarmrightupper" class="female-body-part" data-name="female back arm right upper" xmlns="http://www.w3.org/2000/svg" width="82.852" height="53.195" viewBox="0 0 82.852 53.195">
                      <path id="Arm_right_uppar" data-name="Arm right uppar" d="M400.908,867.36H346.734v48.2s24.361-22.657,43.622-12.444C415.411,916.4,429.585,920.5,429.585,920.5,427.414,863.472,400.908,867.36,400.908,867.36Z" transform="translate(-346.734 -867.304)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Arm Right Upper -->
                    <!-- Back Chest Left Upper -->
                    <svg id="femalebackchestleftupper" class="female-body-part" data-name="female back chest left upper" xmlns="http://www.w3.org/2000/svg" width="47.438" height="70.25" viewBox="0 0 47.438 70.25">
                      <path id="Chest_ledt_uppar" data-name="Chest ledt uppar" d="M355.436,910.725s-17.446-15.62-33.268-14.6S308.982,915.8,308.982,915.8L314.1,942.94c.44,2.8.968,5.521,1.6,8.042,1.242,5,1.949,10.5,2.724,15.341,4.472-.376,24.072-2.923,37.841-12.209Z" transform="translate(-308.817 -896.072)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Chest Left Upper -->
                    <!-- Back Chest Left Lower -->
                    <svg id="femalebackchestleftlower" class="female-body-part" data-name="female back chest left lower" xmlns="http://www.w3.org/2000/svg" width="38.201" height="41.819" viewBox="0 0 38.201 41.819">
                      <path id="Chest_left_lower" data-name="Chest left lower" d="M354.622,981.339l-.317-37.763c-13.883,8.93-33.168,11.188-37.884,11.595,2.5,16.6,3.084,30.225,3.084,30.225C344,983.367,354.622,981.339,354.622,981.339Z" transform="translate(-316.421 -943.576)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Chest Left Lower -->
                    <!-- Back Chest Right Lower -->
                    <svg id="femalebackchestrightlower" class="female-body-part" data-name="female back chest right lower" xmlns="http://www.w3.org/2000/svg" width="37.64" height="41.502" viewBox="0 0 37.64 41.502">
                      <path id="chest_lower_right" data-name="chest lower right" d="M347.639,943.265l.559,38.357s10.5,0,33.572,3.146c0,0,2.014-13.511,3.509-29.2C372.638,955.016,352.309,945.519,347.639,943.265Z" transform="translate(-347.639 -943.265)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Chest Right Lower -->
                    <!-- Back Chest Right Upper -->
                    <svg id="femalebackchestrightupper" class="female-body-part" data-name="female back chest right upper" xmlns="http://www.w3.org/2000/svg" width="46.866" height="70.179" viewBox="0 0 46.866 70.179">
                      <path id="chest_uppar_right" data-name="chest uppar right" d="M381.269,896.128c-9.82.355-22.884,7.409-29.674,11.5-2.411,1.805-3.837,3.081-3.837,3.081l-.4,21.2.316,21.874c2.221,1.086,23.969,11.6,37.122,12.483l.719.038c.555-5.528,1.376-11.385,2.55-17.191,1.426-7.106,3.029-15.6,4.254-23.261a160.449,160.449,0,0,0,1.906-15.943C393.627,904.383,391.014,896.873,381.269,896.128Z" transform="translate(-347.354 -896.128)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Chest Right Upper -->
                    <!-- Back Foot Left -->
                    <svg id="femalebackfootleft" class="female-body-part" data-name="female back foot left" xmlns="http://www.w3.org/2000/svg" width="31.218" height="28.76" viewBox="0 0 31.218 28.76">
                      <path id="foot_left" data-name="foot left" d="M314.673,1366.105c9.738-5.68,14.335-23.531,14.335-23.531h14.809c.2,9.483,1.149,17.986-.745,24.613S304.937,1371.785,314.673,1366.105Z" transform="translate(-313.015 -1342.574)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Foot Left -->
                    <!-- Back Foot Right -->
                    <svg id="femalebackfootright" class="female-body-part" data-name="female back foot right" xmlns="http://www.w3.org/2000/svg" width="31.218" height="28.76" viewBox="0 0 31.218 28.76">
                      <path id="foot_right" data-name="foot right" d="M384.946,1366.105c-9.737-5.68-14.335-23.531-14.335-23.531H355.8c-.2,9.483-1.15,17.986.743,24.613S394.683,1371.785,384.946,1366.105Z" transform="translate(-355.386 -1342.574)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Foot Right -->
                    <!-- Back Hand Right -->
                    <svg id="femalebackhandright" class="female-body-part" data-name="female back hand right" xmlns="http://www.w3.org/2000/svg" width="16.03" height="51.776" viewBox="0 0 16.03 51.776">
                      <path id="hand_right_" data-name="hand right " d="M398.116,1119c12.71-9.328,14.743-15.4,15.285-36.376.126-5,.379-9.834.745-14.541l-11.373-.86c-.2,2.272-.4,4.531-.593,6.753C399.883,1100.209,398.116,1119,398.116,1119Z" transform="translate(-398.116 -1067.228)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Hand Right -->
                    <!-- Back Hand Left -->
                    <svg id="femalebackhandleft" class="female-body-part" data-name="female back hand left" xmlns="http://www.w3.org/2000/svg" width="16.03" height="51.776" viewBox="0 0 16.03 51.776">
                      <path id="hand" d="M298.674,1119c-12.71-9.328-14.743-15.4-15.285-36.376-.126-5-.379-9.834-.745-14.541l11.372-.86c.2,2.272.4,4.531.593,6.753C296.907,1100.209,298.674,1119,298.674,1119Z" transform="translate(-282.644 -1067.228)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Hand Left -->
                    <!-- Back Head Left -->
                    <svg id="femalebackheadleft" class="female-body-part" data-name="back head left" xmlns="http://www.w3.org/2000/svg" width="38.333" height="72.803" viewBox="0 0 38.333 72.803">
                      <path id="Head_left" data-name="Head left" d="M352.557,765.488V838.1a285.775,285.775,0,0,1-38.333-1.111s.063-.884.215-2.449c.9-10.161,4.96-49.1,14.768-59.98C333.978,769.3,343.1,766.283,352.557,765.488Z" transform="translate(-314.224 -765.488)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Head Left -->
                    <!-- Back Head Right -->
                    <svg id="femalebackheadright" class="female-body-part" data-name="female back head right" xmlns="http://www.w3.org/2000/svg" width="38.337" height="73.005" viewBox="0 0 38.337 73.005">
                      <path id="head_right" data-name="head right" d="M385.788,837.035a285.756,285.756,0,0,1-38.194,1.111V765.329c11.726-.139,22.556,4.14,25.673,10.6C380.159,790.232,387.013,814.694,385.788,837.035Z" transform="translate(-347.594 -765.326)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Head Right -->
                    <!-- Back Neck -->
                    <svg id="femalebackneck" class="female-body-part" data-name="female back neck" xmlns="http://www.w3.org/2000/svg" width="86.306" height="37.323" viewBox="0 0 86.306 37.323">
                      <path id="Neck" d="M312.163,872.406l86.306-.636s-32.753-2.123-33.158-20.921-.541-15.552-.541-15.552H347.594v8.044a26.384,26.384,0,0,1-15.961,24.382C325.939,870.123,322.629,871.942,312.163,872.406Z" transform="translate(-312.163 -835.083)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Neck -->
                    <!-- Hip Left -->
                    <svg id="femalehipleft" class="female-body-part" data-name="female hip left" xmlns="http://www.w3.org/2000/svg" width="63.086" height="100.442" viewBox="0 0 63.086 100.442">
                      <path id="hip_left" data-name="hip left" d="M320.358,989.038c-4.772,4.56-15.01,20.521-17.7,28.886-7.607,23.226-6.975,59.683-6.975,59.683,2.769,3.854,24.3,3.975,39.891,4.26,25.921.473,22.164-24.727,22.617-28.009s.565-38.827.565-38.827l-20.14-33.6A28.2,28.2,0,0,0,320.358,989.038Z" transform="translate(-295.668 -981.432)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Hip Left -->
                    <!-- Hip Right -->
                    <svg id="femalehipright" class="female-body-part" data-name="female hip right" xmlns="http://www.w3.org/2000/svg" width="63.087" height="100.442" viewBox="0 0 63.087 100.442">
                      <path id="hip_right" data-name="hip right" d="M386.865,989.038c4.772,4.56,15.01,20.521,17.7,28.886,7.607,23.226,6.975,59.683,6.975,59.683-2.769,3.854-24.3,3.975-39.891,4.26-25.921.473-22.164-24.727-22.617-28.009s-.565-38.827-.565-38.827l20.14-33.6A28.2,28.2,0,0,1,386.865,989.038Z" transform="translate(-348.469 -981.432)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Hip Right -->
                    <!-- Hip Middle -->
                    <svg id="femalehipmiddle" class="female-body-part" data-name="female hip middle" xmlns="http://www.w3.org/2000/svg" width="39.974" height="37.708" viewBox="0 0 39.974 37.708">
                      <path id="hip_middle_part" data-name="hip middle part" d="M351.236,1014.416l.334-.437L371.2,983.2l-18.869-6.235a6.161,6.161,0,0,0-3.352-.044l-17.753,5.751,19.21,30.874Z" transform="translate(-331.224 -976.708)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Hip Middle -->
                    <!-- Back Leg Lower Left -->
                    <svg id="femalebackleglowerleft" class="female-body-part" data-name="female back leg lower left" xmlns="http://www.w3.org/2000/svg" width="40.763" height="183.637" viewBox="0 0 40.763 183.637">
                      <path id="leg_lower_left" data-name="leg lower left" d="M345.132,1195.438s1.961,32.358,3.583,44.733-3.65,56.8-5.882,76.273.2,31.848,2.3,42.194a56.918,56.918,0,0,1,.135,20.083l-14.706.355c.557-10.346-3.551-67.7-16.534-106.245s0-77.392,0-77.392Z" transform="translate(-308.258 -1195.438)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Lower Left -->
                    <!-- Back Leg Lower Right -->
                    <svg id="femalebackleglowerright" class="female-body-part" data-name="female back leg lower right" xmlns="http://www.w3.org/2000/svg" width="40.763" height="183.637" viewBox="0 0 40.763 183.637">
                      <path id="leg_lower_right" data-name="leg lower right" d="M356.471,1195.438s-1.961,32.358-3.585,44.733,3.652,56.8,5.883,76.273-.2,31.848-2.3,42.194a56.937,56.937,0,0,0-.136,20.083l14.707.355c-.558-10.346,3.551-67.7,16.532-106.245s0-77.392,0-77.392Z" transform="translate(-352.582 -1195.438)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Lower Right -->
                    <!-- Back Leg Middle Left -->
                    <svg id="femalebacklegmiddleleft" class="female-body-part" data-name="female back leg middle left" xmlns="http://www.w3.org/2000/svg" width="31.104" height="23.531" viewBox="0 0 31.104 23.531">
                      <path id="leg_middle_left" data-name="leg middle left" d="M312.829,1197.355c5.14-8.546,4.328-23.531,4.328-23.531H342.31c-1.622,3.517,1.623,23.531,1.623,23.531Z" transform="translate(-312.829 -1173.824)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Middle Left -->
                    <!-- Back Leg Middle Right -->
                    <svg id="femalebacklegmiddleright" class="female-body-part" data-name="female back leg middle right" xmlns="http://www.w3.org/2000/svg" width="31.103" height="23.531" viewBox="0 0 31.103 23.531">
                      <path id="leg_middle_right" data-name="leg middle right" d="M386.766,1197.355c-5.138-8.546-4.327-23.531-4.327-23.531H357.285c1.623,3.517-1.622,23.531-1.622,23.531Z" transform="translate(-355.663 -1173.824)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Middle Right -->
                    <!-- Back Leg Upper Left -->
                    <svg id="femalebacklegupperleft" class="female-body-part" data-name="female back leg upper left" xmlns="http://www.w3.org/2000/svg" width="59.443" height="132.467" viewBox="0 0 59.443 132.467">
                      <path id="leg_uppar_left" data-name="leg uppar left" d="M321.2,1199.2c-6.022-15.687-25.086-132.467-25.086-132.467,23.517,7.744,58.156.626,58.156.626,5.41,26.656-7.982,131.841-7.982,131.841Z" transform="translate(-296.111 -1066.732)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Upper Left -->
                    <!-- Back Leg Upper Right -->
                    <svg id="femalebacklegupperright" class="female-body-part" data-name="female back leg upper right" xmlns="http://www.w3.org/2000/svg" width="59.444" height="132.467" viewBox="0 0 59.444 132.467">
                      <path id="leg_uppar_right" data-name="leg uppar right" d="M384.285,1199.2c6.023-15.687,25.088-132.467,25.088-132.467-23.517,7.744-58.157.626-58.157.626-5.409,26.656,7.984,131.841,7.984,131.841Z" transform="translate(-349.929 -1066.732)" fill="#f6f6f6"/>
                    </svg>
                    <!-- Back Leg Upper Right -->
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
    <script>
    var selected_language="<?php echo"$selected_language->language"?>";
    var total_pages=10;
    var body_part=null;
    var page_no= null;
    var pain_id=null;
    var pain_type_id=null;
    var severity_id=null;
    var check_var=0;
    var avatar=null;
    $(document).ready(function () {

        $('.form').addClass("hide-cls");
        $('.faq-2').addClass("hide-cls");
        $('.faq-3').addClass("hide-cls");
        $('#pdf-buttn').addClass('hide-cls');
        $('#select-another').addClass('hide-cls');
        // $('#faq1').removeClass('show');
        // $('#faqhead1').removeClass('hide-cls');


        $.ajax({

            type:'get',
            url:"{{route('severity')}}",
            data:{page_no:1,selected_language:selected_language},
            success:function(response){

                if(response.status){
                    severity_id=response.severity['id'];
                    $('#severity-english').html(response.severity['english']);
                    $('#severity-other').html(response.severity[selected_language]);
                    parseInt($('#page-number').text())
                    page_no=$('#page-number').text(response.severity['id']);
                }
            }
        })

        $('#save').on('click',function(e){
            e.preventDefault();



                if(body_part==null || $('.parent-category').val()==0 || $('.child-category').val()==0){
                    alert("Please fill the form completely.")
                }
                else if(check_var==0){
                    check_var==1;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type:"post",
                        url:"{{route('user-record')}}",
                        data:{pain_id:pain_id,pain_type_id:pain_type_id,severity_id:severity_id,body_part:body_part},
                        success:function(response){
                            // console.log(response)
                            if(response.status){
                                $('.pdf-buttn').attr('data-attr',1);
                                $('#select-another').attr('data-attr',1);
                                $('#save').addClass("hide-cls");
                                $('#pdf-buttn').removeClass('hide-cls');

                                alert("Your record has been saved");
                            }
                        },
                        complete:function(){
                            check_var=0;
                        }
                    })
                }
        })
        $('.page-btn').on('click',function(e){
            e.preventDefault();
            var val=$(this).attr('id');
            if(val=="increment"){
              page_no=parseInt($('#page-number').text())+1;
             if(page_no<=total_pages){
                 $('#save').removeClass('hide-cls');
                $('#page-number').text(page_no)
             }

            }
            else{
                 page_no=parseInt($('#page-number').text())-1;
                if(page_no>0){
                    $('#save').removeClass('hide-cls');
                    $('#page-number').text(page_no)
                }

            }

            $.ajax({
               type:"get",
               url:"{{route('severity')}}",
               data:{page_no:page_no,selected_language:selected_language},
               success:function(response){

                if(response.status){
                    severity_id=response.severity['id'];
                    $('#severity-english').html(response.severity['english']);
                    $('#severity-other').html(response.severity[selected_language]);
                }
               }

            })

        })

        $(".female-body-part").on("click", function (e) {
          e.preventDefault();
          $('#pdf-buttn').removeClass("hide-cls");
          $('#select-another').removeClass("hide-cls");
          avatar=$(this).parent().prop('className');
          $('.form').removeClass("hide-cls");

          $('#faqhead1').addClass('hide-cls');

          $(".female-body-part").removeClass("active");
          $(this).addClass("active");
          body_part=$(this).attr('data-name');
        });

      })

        $('#pdf-buttn').on('click',function(e){
          e.preventDefault();
          if(body_part==null || $('.parent-category').val()==0 || $('.child-category').val()==0){
                alert("Please save record first.")
            }
            else if ($('.pdf-buttn').attr('data-attr')==1){
                $('.pdf-buttn').attr('data-attr',0);
                window.location.href = "http://cipdar.test/generate-pdf";
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
            }
            else{
                alert("please save record first");
            }
        })
    </script>
    <script>
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
    </script>

    {{-- custom script --}}
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>


    <script>



        $('.parent-category').on('change',function(e){

            e.preventDefault();
            $('#save').removeClass('hide-cls');
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

                           $('#category-translate').html(response.category.english)

                            $('#pain-types').html('<option value="0">Select Pain Type</option>')
                        if(response.status){

                            var array=response.pain_types;
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
            $('#save').removeClass('hide-cls');

            pain_type_id=$(this).val();
            var selected_language="<?php echo"$selected_language->language"?>";

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

    </script>
  </body>
</html>

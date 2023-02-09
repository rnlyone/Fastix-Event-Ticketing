@include('EO.layouts.app')

                <!-- Container-fluid starts-->
                <div class="container-fluid dashboard-default-sec">
                    <div class="row">
                        <div class="col-xl-12 box-col-12 des-xl-100">
                            <div class="row">
                                <div class="col-xl-12 des-xl-50">
                                    <div class="card profile-greeting">
                                        <div class="card-header">
                                            <div class="header-top">
                                                <div class="setting-list bg-primary position-unset">
                                                    <ul class="list-unstyled setting-option">
                                                        <li>
                                                            <div class="setting-white">
                                                                <i class="icon-settings"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <i class="view-html fa fa-code font-white"></i>
                                                        </li>
                                                        <li>
                                                            <i class="icofont icofont-maximize full-card font-white"></i>
                                                        </li>
                                                        <li>
                                                            <i class="icofont icofont-minus minimize-card font-white"></i>
                                                        </li>
                                                        <li>
                                                            <i class="icofont icofont-refresh reload-card font-white"></i>
                                                        </li>
                                                        <li>
                                                            <i class="icofont icofont-error close-card font-white"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body text-center p-t-0">
                                            <h3 class="font-light">Wellcome Back, {{auth()->user()->username}}!!</h3>
                                            <p>Selamat datang di dashboard FASTIX, solusi mudah dan cepat untuk pembelian tiket online.</p>
                                            <button class="btn btn-light">Lihat Event Saya</button>
                                        </div>
                                        <div class="confetti">
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="confetti-piece"></div>
                                            <div class="code-box-copy">
                                                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#profile-greeting" title="Copy">
                                                    <i class="icofont icofont-copy-alt"></i>
                                                </button>
                                                <pre>
                                                    <code class="language-html" id="profile-greeting">                                     &lt;div class="card profile-greeting"&gt;
                                                      &lt;div class="card-header"&gt;
                                                        &lt;div class="header-top"&gt;
                                                          &lt;div class="setting-list bg-primary"&gt;
                                                            &lt;ul class="list-unstyled setting-option"&gt;
                                                              &lt;li&gt;&lt;div class="setting-white"&gt;&lt;i class="icon-settings"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
                                                              &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                                              &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                                              &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                                              &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                                              &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
                                                            &lt;/ul&gt;
                                                          &lt;/div&gt;
                                                        &lt;/div&gt;
                                                      &lt;/div&gt;
                                                      &lt;div class="card-body text-center"&gt;
                                                        &lt;h3 class="font-light"&gt;Wellcome Back, John!!&lt;/h3&gt;
                                                        &lt;p&gt;Lorem ipsum is simply dummy text of the printing and typesetting industry.Lorem ipsum has been&lt;/p&gt;
                                                        &lt;button class="btn btn-light"&gt;Update &lt;/button&gt;
                                                      &lt;/div&gt;
                                                    &lt;/div&gt;</code>
                                                </pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

@include('EO.layouts.footer')


